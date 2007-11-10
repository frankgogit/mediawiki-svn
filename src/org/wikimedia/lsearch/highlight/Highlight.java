package org.wikimedia.lsearch.highlight;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Set;

import org.apache.log4j.Logger;
import org.apache.lucene.document.Document;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.Term;
import org.apache.lucene.index.TermDocs;
import org.wikimedia.lsearch.analyzers.Alttitles;
import org.wikimedia.lsearch.analyzers.ExtToken;
import org.wikimedia.lsearch.analyzers.FieldNameFactory;
import org.wikimedia.lsearch.analyzers.WikiQueryParser;
import org.wikimedia.lsearch.analyzers.ExtToken.Position;
import org.wikimedia.lsearch.analyzers.ExtToken.Type;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.search.SearcherCache;

public class Highlight {
	protected static SearcherCache cache = null;
	static Logger log = Logger.getLogger(Highlight.class);
	
	public static final int SLOP = WikiQueryParser.MAINPHRASE_SLOP;
	/** maximal length of text that surrounds highlighted words */ 
	public static final int MAX_CONTEXT = 75;
	
	public static final double PHRASE_BOOST = 1;
	
	/** boost (preference) factors for varius parts of the text */
	public static final HashMap<Position,Double> BOOST = new HashMap<Position,Double>(); 
	static {
		BOOST.put(Position.FIRST_SECTION,5.0);
		BOOST.put(Position.HEADING,2.0);
		BOOST.put(Position.NORMAL,1.0);
		BOOST.put(Position.TEMPLATE,0.1);
		BOOST.put(Position.IMAGE_CAT_IW,0.01);
		BOOST.put(Position.EXT_LINK,0.5);
		BOOST.put(Position.REFERENCE,0.5);
	}	
	/**
	 * 
	 * @param hits - keys of articles that need to be higlighted
	 * @param iid - highlight index
	 * @param terms - terms to highlight
	 * @param df - their document frequencies
	 * @param words - in order words (from main phrase)
	 * @param exactCase - if these are results from exactCase search
	 * @throws IOException 
	 * @returns map: key -> what to highlight
	 */
	@SuppressWarnings("unchecked")
	public static HashMap<String,HighlightResult> highlight(ArrayList<String> hits, IndexId iid, Term[] terms, int df[], int maxDoc, ArrayList<String> words, boolean exactCase, HashSet<String> stopWords) throws IOException{
		if(cache == null)
			cache = SearcherCache.getInstance();
		
		System.out.println("Highlighting: "+Arrays.toString(terms));
		
		FieldNameFactory fields = new FieldNameFactory(exactCase);
		
		if(stopWords == null)
			stopWords = new HashSet<String>();
		
		// terms weighted with idf
		HashMap<String,Double> weightTerm = new HashMap<String,Double>();
		for(int i=0;i<terms.length;i++){
			Term t = terms[i];
			if(t.field().equals(fields.contents())){
				double idf = idf(df[i],maxDoc); 
				weightTerm.put(t.text(),idf);
			}
		}
		// position within main phrase
		HashMap<String,Integer> wordIndex = new HashMap<String,Integer>();
		for(int i=0;i<words.size();i++)
			wordIndex.put(words.get(i),i);
		
		// process requested documents
		IndexReader reader = cache.getLocalSearcher(iid.getHighlight()).getIndexReader();
		HashMap<String,HighlightResult> res = new HashMap<String,HighlightResult>();
		for(String key : hits){
			Object[] ret = getTokens(reader,key);
			if(ret == null)
				continue;
			ArrayList<ExtToken> tokens = (ArrayList<ExtToken>) ret[0];
			Alttitles alttitles = (Alttitles) ret[1];
			HashMap<String,Double> notInTitle = getTermsNotInTitle(weightTerm,alttitles);
			
			getBestTextSnippets(tokens, weightTerm, wordIndex, 2);
			getBestAltTitle(alttitles.getRedirects(),weightTerm,notInTitle,stopWords,1);
			getBestAltTitle(alttitles.getSections(),weightTerm,notInTitle,stopWords,0);
			
		}
		return res;
	}
	
	/** Implemented as <code>log(numDocs/(docFreq+1)) + 1</code>. */
	protected static double idf(int docFreq, int numDocs) {
		return Math.log(numDocs/(double)(docFreq+1)) + 1.0;
	}
	
	@SuppressWarnings("unchecked")
	protected static HashMap<String,Double> getTermsNotInTitle(HashMap<String,Double> weightTerm, Alttitles alttitles){
		Alttitles.Info info = alttitles.getTitle();
		ArrayList<ExtToken> tokens = info.getTokens();
		HashMap<String,Double> ret = (HashMap<String, Double>) weightTerm.clone();
		// delete all terms from title
		for(ExtToken t : tokens){
			if(ret.containsKey(t.termText()))
				ret.remove(t.termText());
		}
		return ret;
		
	}
	
	/** Alttitle and sections highlighting */
	
	protected static class ScoredSnippet {
		Snippet snippet = null;
		double score = 0;
		public ScoredSnippet(Snippet snippet, double score) {
			this.snippet = snippet;
			this.score = score;
		}
		
	}
	
	protected static Snippet getBestAltTitle(ArrayList<Alttitles.Info> altInfos, HashMap<String,Double> weightTerm, 
			HashMap<String,Double> notInTitle, HashSet<String> stopWords, int minAdditional){
		ArrayList<ScoredSnippet> res = new ArrayList<ScoredSnippet>();
		for(Alttitles.Info ainf : altInfos){			
			double matched = 0, additional=0;
			ArrayList<ExtToken> tokens = ainf.getTokens();
			boolean completeMatch=true;
			for(int i=0;i<tokens.size();i++){
				ExtToken t = tokens.get(i);
				if(t.getPositionIncrement() == 0)
					continue; // skip aliases
				
				if(weightTerm.containsKey(t.termText()))
					matched += weightTerm.get(t.termText());
				else if(!stopWords.contains(t.termText()))
					completeMatch = false;
				
				if(notInTitle.containsKey(t.termText()))
					additional += notInTitle.get(t.termText());
			}
			if((completeMatch && additional >= minAdditional) || additional >= minAdditional+1 || additional == notInTitle.size()){
				Snippet snippet = makeSnippet(tokens,0,tokens.size(),weightTerm.keySet());
				snippet.setAlttitle(ainf);
				res.add(new ScoredSnippet(snippet,matched+additional));
			}
		}
		if(res.size() > 0){
			if(res.size() == 1){
				return res.get(0).snippet;
			} else{
				// get snippet with best score
				Collections.sort(res,  new Comparator<ScoredSnippet>() {
					public int compare(ScoredSnippet o1, ScoredSnippet o2) {
						double d = o2.score - o1.score;
						if(d > 0)
							return 1;
						else if(d == 0)
							return 0;
						else return -1;
					}});
				return res.get(0).snippet;
			}			
		}
		return null;
	}
	
	/** Text highlighting */
	  
	protected static class FragmentScore {
		int start = 0;
		int end = 0;
		double score = 0;
		// best match in this fragment
		int bestStart = -1;
		int bestEnd = -1;
		double bestScore = 0;
		
		FragmentScore(int start){
			this.start = start;
		}
		
		public String toString(){
			return "start="+start+", end="+end+", score="+score+", bestStart="+bestStart+", bestEnd="+bestEnd;
		}
	}
	
	/** Highlight text */
	protected static ArrayList<Snippet> getBestTextSnippets(ArrayList<ExtToken> tokens, HashMap<String, Double> weightTerms, 
			HashMap<String,Integer> wordIndex, int maxSnippets) {
		
		// pieces of text to ge highlighted
		ArrayList<FragmentScore> fragments = new ArrayList<FragmentScore>();

		//System.out.println("TOKENS: "+tokens);
		
		FragmentScore fs = null;
		ExtToken last = null;
		// next three are for in-order matched phrases
		Integer lastWord = null; // pointer to the last word found in sequence
		int lastIndex = 0;
		Double lastWeight = null;
		// indicator for first sentence
		boolean seenFirstSentence = false;
		for(int i=0;i<=tokens.size();i++){
			ExtToken t = null;
			if(i < tokens.size())
				t = tokens.get(i);
			if(last == null){
				fs = new FragmentScore(i);
			} else if(t==null || t.getPosition() != last.getPosition() || t.getType() == Type.SENTENCE_BREAK){
				Position pos = last.getPosition();
				// finalize fragment
				
				if(t == null || t.getType() != Type.SENTENCE_BREAK)
					fs.end = i;
				else
					fs.end = i + 1;
				fs.score *= BOOST.get(pos);
				fragments.add(fs);
				if(pos == Position.FIRST_SECTION && !seenFirstSentence){
					// boost for first sentence
					fs.score *= 4;
					seenFirstSentence = true;
				}
				fs = new FragmentScore(fs.end);
			}
			if(t == null)
				break;

			Double weight = weightTerms.get(t.termText());
			if(weight != null){
				fs.score += weight;
				Integer inx = wordIndex.get(t.termText());
				if(lastWord != null && inx != null && lastWord == inx - 1 && i-lastIndex <= 2){
					double phraseScore = (weight + lastWeight) * PHRASE_BOOST;
					fs.score += phraseScore;
					if(phraseScore > fs.bestScore){
						fs.bestStart = lastIndex;
						fs.bestEnd = i;
						fs.bestScore = phraseScore;
					}					
				}
				lastWord = inx;
				lastWeight = weight;
				lastIndex = i;
			}
			
			last = t;			
		}

		// find fragments with best score
		Collections.sort(fragments,  new Comparator<FragmentScore>() {
			public int compare(FragmentScore o1, FragmentScore o2) {
				double d = o2.score - o1.score;
				if(d > 0)
					return 1;
				else if(d == 0)
					return 0;
				else return -1;
			}});
		
		ArrayList<Snippet> res = new ArrayList<Snippet>();
		for(FragmentScore f : fragments){
			if(f.score == 0)
				continue;
			Snippet s = makeSnippet(tokens,f,weightTerms.keySet());
			res.add(s);
			System.out.println(f+" : "+s.getFormatted());
			if(res.size() >= maxSnippets)
				break;			
		}
		return res;
	}

	private static Snippet makeSnippet(ArrayList<ExtToken> tokens, FragmentScore f, Set<String> highlight) {
		return makeSnippet(tokens,f.start,f.end,highlight);	
	}
	
	private static Snippet makeSnippet(ArrayList<ExtToken> tokens, int fromIndex, int toIndex, Set<String> highlight) {
		Snippet s = new Snippet();
		StringBuilder sb = new StringBuilder();
		int start=0, end=0;
		for(int i=fromIndex;i<toIndex;i++){
			ExtToken t = tokens.get(i);
			if(t.getPositionIncrement() != 0){
				start = sb.length();
				sb.append(t.getText());
				end = sb.length();
			}
			if(highlight.contains(t.termText())){
				s.addRange(new Snippet.Range(start,end));
			}
		}
		s.setText(sb.toString());
		return s;
	}

	/** @return ArrayList<ExtToken> tokens, Altitles alttitles */
	protected static Object[] getTokens(IndexReader reader, String key) throws IOException{
		TermDocs td = reader.termDocs(new Term("key",key));
		if(td.next()){
			System.out.println("Found "+key);
			Document doc = reader.document(td.doc());
			ArrayList<ExtToken> tokens = ExtToken.deserialize(doc.getBinaryValue("text"));
			// FIXME: wrong deserialization for alttitle !
			Alttitles alttitles  = Alttitles.deserializeAltTitle(doc.getBinaryValue("alttitle"));
			return new Object[] {tokens, alttitles};
		} else
			return null;
	}
}
