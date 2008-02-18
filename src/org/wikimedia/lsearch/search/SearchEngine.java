package org.wikimedia.lsearch.search;

import java.io.IOException;
import java.text.MessageFormat;
import java.util.ArrayList;
import java.util.BitSet;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Hashtable;
import java.util.Iterator;
import java.util.Map.Entry;

import org.apache.log4j.Logger;
import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.analysis.Token;
import org.apache.lucene.document.Document;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.Term;
import org.apache.lucene.index.TermDocs;
import org.apache.lucene.index.TermEnum;
import org.apache.lucene.queryParser.ParseException;
import org.apache.lucene.search.Query;
import org.apache.lucene.search.Searchable;
import org.apache.lucene.search.SearchableMul;
import org.apache.lucene.search.Searcher;
import org.apache.lucene.search.TopDocs;
import org.wikimedia.lsearch.analyzers.Analyzers;
import org.wikimedia.lsearch.analyzers.FieldBuilder;
import org.wikimedia.lsearch.analyzers.FilterFactory;
import org.wikimedia.lsearch.analyzers.StopWords;
import org.wikimedia.lsearch.analyzers.WikiQueryParser;
import org.wikimedia.lsearch.analyzers.WikiQueryParser.NamespacePolicy;
import org.wikimedia.lsearch.analyzers.WikiQueryParser.ParsingOptions;
import org.wikimedia.lsearch.beans.ResultSet;
import org.wikimedia.lsearch.beans.SearchResults;
import org.wikimedia.lsearch.beans.Title;
import org.wikimedia.lsearch.config.Configuration;
import org.wikimedia.lsearch.config.GlobalConfiguration;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.frontend.SearchDaemon;
import org.wikimedia.lsearch.frontend.SearchServer;
import org.wikimedia.lsearch.highlight.Highlight;
import org.wikimedia.lsearch.highlight.HighlightResult;
import org.wikimedia.lsearch.interoperability.RMIMessengerClient;
import org.wikimedia.lsearch.ranks.StringList;
import org.wikimedia.lsearch.related.Related;
import org.wikimedia.lsearch.related.RelatedTitle;
import org.wikimedia.lsearch.spell.SuggestQuery;
import org.wikimedia.lsearch.util.Localization;

/**
 * Search engine implementation. The implementation is independent of frontend used to
 * communicate with client. A generic container of search results is returned. 
 * 
 * @author rainman
 *
 */
public class SearchEngine {
	static org.apache.log4j.Logger log = Logger.getLogger(SearchEngine.class);

	protected final int MAXLINES = 1000;
	protected final int MAXOFFSET = 10000;
	protected static GlobalConfiguration global = null;
	protected static Configuration config = null;
	protected static SearcherCache cache = null;
	protected static Hashtable<String,Hashtable<String,Integer>> dbNamespaces = new Hashtable<String,Hashtable<String,Integer>>();
	protected long timelimit;
	
	public SearchEngine(){
		if(config == null)
			config = Configuration.open();
		if(global == null)
			global = GlobalConfiguration.getInstance();
		if(cache == null)
			cache = SearcherCache.getInstance();
		
		timelimit = config.getInt("Search","timelimit",5000);
	}
	
	/** Main search method, call this from the search frontend */
	public SearchResults search(IndexId iid, String what, String searchterm, HashMap query) {
		
		if (what.equals("search") || what.equals("explain")) {
			int offset = 0, limit = 100; boolean exactCase = false;
			int iwlimit = 10;
			boolean searchOnly = false;
			if (query.containsKey("offset"))
				offset = Math.max(Integer.parseInt((String)query.get("offset")), 0);
			if (query.containsKey("limit"))
				limit = Math.min(Integer.parseInt((String)query.get("limit")), MAXLINES);
			if (query.containsKey("iwlimit"))
				iwlimit = Math.min(Integer.parseInt((String)query.get("iwlimit")), MAXLINES);
			if (query.containsKey("case") && global.exactCaseIndex(iid.getDBname()) && ((String)query.get("case")).equalsIgnoreCase("exact"))
				exactCase = true;
			if(query.containsKey("searchonly"))
				searchOnly = Boolean.parseBoolean((String)query.get("searchonly"));
			NamespaceFilter namespaces = new NamespaceFilter((String)query.get("namespaces"));
			SearchResults res = search(iid, searchterm, offset, limit, iwlimit, namespaces, what.equals("explain"), exactCase, false, searchOnly);
			if(res!=null && res.isRetry()){
				int retries = 0;
				if(iid.isSplit() || iid.isNssplit()){
					retries = iid.getSplitFactor()-2;
				} else if(iid.isMainsplit())
					retries = 1;
				
				while(retries > 0 && res.isRetry()){
					res = search(iid, searchterm, offset, limit, iwlimit, namespaces, what.equals("explain"), exactCase, false, searchOnly);
					retries--;
				}
				if(res.isRetry())
					res.setErrorMsg("Internal error, too many internal retries.");
			}			
			return res;
		} else if (what.equals("raw") || what.equals("rawexplain")) {
			int offset = 0, limit = 100; boolean exactCase = false;
			int iwlimit = 10;
			if (query.containsKey("offset"))
				offset = Math.max(Integer.parseInt((String)query.get("offset")), 0);
			if (query.containsKey("limit"))
				limit = Math.min(Integer.parseInt((String)query.get("limit")), MAXLINES);
			if (query.containsKey("iwlimit"))
				iwlimit = Math.min(Integer.parseInt((String)query.get("iwlimit")), MAXLINES);
			if (query.containsKey("case") && global.exactCaseIndex(iid.getDBname()) && ((String)query.get("case")).equalsIgnoreCase("exact"))
				exactCase = true;
			NamespaceFilter namespaces = new NamespaceFilter((String)query.get("namespaces"));
			return search(iid, searchterm, offset, limit, iwlimit, namespaces, what.equals("rawexplain"), exactCase, true, true);
		} else if (what.equals("titlematch")) {
				// TODO: return searchTitles(searchterm);
		} else if (what.equals("prefix")){
			int limit = MAXLINES;
			if (query.containsKey("limit"))
				limit = Math.min(Integer.parseInt((String)query.get("limit")), MAXLINES);
			SearchResults res = prefixSearch(iid, searchterm, limit);
			if(query.containsKey("format")){
				String format = (String)query.get("format");
				if(format.equalsIgnoreCase("json"))
					res.setFormat(SearchResults.Format.JSON);
				else if(format.equalsIgnoreCase("opensearch"))
					res.setFormat(SearchResults.Format.OPENSEARCH);
			}
			return res;
		} else if (what.equals("related")){
			int offset = 0, limit = 100; 
			if (query.containsKey("offset"))
				offset = Math.max(Integer.parseInt((String)query.get("offset")), 0);
			if (query.containsKey("limit"))
				limit = Math.min(Integer.parseInt((String)query.get("limit")), MAXLINES);
			return relatedSearch(iid, searchterm, offset, limit);
		} else {
			SearchResults res = new SearchResults();
			res.setErrorMsg("Unrecognized search type. Try one of: " +
			              "search, explain, raw, rawexplain, prefix, related.");
			log.warn("Unknown request type [" + what + "].");
			return res;
		}
		return null;
	}
	
	/** Convert namespace names into numbers, e.g. User:Rainman into 2:Rainman  */
	protected String getKey(String title, IndexId iid){
		title = title.replace('_',' ');
		int colon = title.indexOf(':');
		if(colon != -1 && colon != title.length()-1){
			String ns = title.substring(0,colon);
			Integer inx = dbNamespaces.get(iid.getDBname()).get(ns.toLowerCase());
			if(inx != null){
				return inx +":"+ title.substring(colon+1);
			}
		}
		
		return "0:" + title;		
	}
	/** Get a valid namespace prefix, e.g. User from User:Moin */ 
	protected String getNamespace(String title, IndexId iid){
		title = title.replace('_',' ');
		int colon = title.indexOf(':');
		if(colon > 0 && colon != title.length()-1){
			String ns = title.substring(0,colon);
			Integer inx = dbNamespaces.get(iid.getDBname()).get(ns.toLowerCase());
			if(inx != null)
				return ns;
		}
		return "";
	}
	
	protected SearchResults relatedSearch(IndexId iid, String searchterm, int offset, int limit) {
		readLocalization(iid);
		IndexId rel = iid.getRelated();
		SearcherCache cache = SearcherCache.getInstance();
		SearchResults res = new SearchResults();
		try {
			IndexSearcherMul searcher = cache.getLocalSearcher(rel);
			IndexReader reader = searcher.getIndexReader();
			String key = getKey(searchterm,iid);
			TermDocs td = reader.termDocs(new Term("key",key));
			if(td.next()){
				ArrayList<RelatedTitle> col = Related.convertToRelatedTitleList(new StringList(reader.document(td.doc()).get("related")).toCollection());
				res.setNumHits(col.size());
				res.setSuccess(true);
				for(int i=offset;i<offset+limit && i<col.size();i++){
					RelatedTitle rt = col.get(i);
					Title t = rt.getRelated();
					ResultSet rs = new ResultSet(rt.getScore(),t.getNamespaceAsString(),t.getTitle());
					res.addResult(rs);
				}
				// highlight stuff
				Analyzer analyzer = Analyzers.getSearcherAnalyzer(iid);
				NamespaceFilter nsDefault = new NamespaceFilter(key.substring(0,key.indexOf(':')));
				FieldBuilder.BuilderSet bs = new FieldBuilder(iid).getBuilder();
				HashSet<String> stopWords = StopWords.getPredefinedSet(iid);				
				WikiQueryParser parser = new WikiQueryParser(bs.getFields().contents(),nsDefault,analyzer,bs,NamespacePolicy.IGNORE,stopWords);
				Query q = parser.parse(key.substring(key.indexOf(':')+1),new WikiQueryParser.ParsingOptions(true));
				highlight(iid,q,parser.getWords(),searcher,res);
			} else{
				res.setSuccess(true);
				res.setNumHits(0);
			}
		} catch (IOException e) {
			e.printStackTrace();
			log.error("I/O error in relatedSearch on "+rel+" : "+e.getMessage());			
			res.setErrorMsg("I/O Error processing index for "+rel);
		}
		return res;
	}

	protected void readLocalization(IndexId iid){
		if(!dbNamespaces.containsKey(iid.getDBname())){
			synchronized(dbNamespaces){
				HashMap<String,Integer> m = Localization.getLocalizedNamespaces(iid.getLangCode(),iid.getDBname());
				Hashtable<String,Integer> map = new Hashtable<String,Integer>();
				if(m != null)
					map.putAll(m);
				dbNamespaces.put(iid.getDBname(),map);
			}
		}
	}
	
	protected SearchResults prefixSearch(IndexId iid, String searchterm, int limit) {
		readLocalization(iid);
		IndexId pre = iid.getPrefix();
		SearcherCache cache = SearcherCache.getInstance();
		SearchResults res = new SearchResults();
		try {			
			long start = System.currentTimeMillis();
			String key = getKey(searchterm.toLowerCase(),iid);
			String namespace = getNamespace(searchterm,iid);
			IndexSearcherMul searcher = cache.getLocalSearcher(pre);
			IndexReader reader = searcher.getIndexReader();
			TermDocs td = reader.termDocs(new Term("prefix",key));
			if(td.next()){
				// found entry with a prefix, return				
				StringList sl = new StringList(reader.document(td.doc()).get("articles"));
				int limitCount = 0;
				Iterator<String> it = sl.iterator();
				while(it.hasNext()){
					if(limitCount >= limit)
						break;
					ResultSet rs = new ResultSet(it.next());
					rs.setNamespaceTextual(capitalizeFirst(namespace));
					res.addResult(rs);
					limitCount++;
				}
				logRequest(pre,"prefix",searchterm,null,res.getNumHits(),start,searcher);
				return res;
			}
			// check if it's an unique prefix
			TermEnum te = reader.terms(new Term("key",key));
			if(te.term() != null){
				String r = te.term().text();
				if(r.startsWith(key)){
					TermDocs td1 = reader.termDocs(new Term("key",r));
					if(td1.next()){
						ResultSet rs = new ResultSet(reader.document(td1.doc()).get("key"));
						rs.setNamespaceTextual(capitalizeFirst(namespace));
						res.addResult(rs);
						//logRequest(pre,"prefix",searchterm,null,res.getNumHits(),start,searcher);
						return res;
					}
				}
			}
			// we didn't find a match, but we didn't encounter an error either
			res.setNumHits(0);
			res.setSuccess(true);
		} catch (IOException e) {
			e.printStackTrace();
			log.error("Internal error in prefixSearch on "+pre+" : "+e.getMessage());
			res.setErrorMsg("I/O error on index "+pre);
		}
		return res;
	}
	
	private String capitalizeFirst(String str){
		if(str == null || str.equals(""))
			return str;
		if(str.length()==1)
			return str.toUpperCase();
		else
			return Character.toUpperCase(str.charAt(0))+str.substring(1);
	}
	
	/** Search a single titles index part */
	public SearchResults searchTitles(IndexId iid, String searchterm, ArrayList<String> words, Query q, SuffixNamespaceWrapper filter, int offset, int limit, boolean explain){
		if(!iid.isTitlesBySuffix())
			return null;
		try {			
			SearcherCache cache = SearcherCache.getInstance();
			IndexSearcherMul searcher;
			long searchStart = System.currentTimeMillis();
			searcher = cache.getLocalSearcher(iid);
			TopDocs hits = searcher.search(q,filter,offset+limit);
			// search
			SearchResults res = makeTitlesSearchResults(searcher,hits,offset,limit,iid,searchterm,q,searchStart,explain);
			// highlight
			highlightTitles(iid,q,words,searcher,res);
			return res;
		} catch (IOException e) {
			e.printStackTrace();
			SearchResults res = new SearchResults();
			res.setErrorMsg("Internal error in SearchEngine: "+e.getMessage());
			log.error("I/O error in searchTitles(): "+e.getMessage());
			return res;
		}
	}

	/** Search mainpart or restpart of the split index */
	public HighlightPack searchPart(IndexId iid, String searchterm, Query q, NamespaceFilterWrapper filter, int offset, int limit, boolean explain){
		if( ! (iid.isMainsplit() || iid.isNssplit()))
			return null;
		try {			
			SearcherCache cache = SearcherCache.getInstance();
			IndexSearcherMul searcher;
			long searchStart = System.currentTimeMillis();
			searcher = cache.getLocalSearcher(iid);
			NamespaceFilterWrapper localfilter = filter;
			if(iid.isMainsplit() && iid.isMainPart())
				localfilter = null;
			else if(iid.isNssplit() && !iid.isLogical() && iid.getNamespaceSet().size()==1 && !iid.getNamespaceSet().contains("<default>"))
				localfilter = null;
			if(localfilter != null)
				log.info("Using local filter: "+localfilter);
			TopDocs hits = searcher.search(q,localfilter,offset+limit);
			SearchResults res = makeSearchResults(searcher,hits,offset,limit,iid,searchterm,q,searchStart,explain);
			HighlightPack pack = new HighlightPack(res);
			// pack extra info needed for highlighting
			pack.terms = getTerms(q,"contents");
			pack.dfs = searcher.docFreqs(pack.terms);
			pack.maxDoc = searcher.maxDoc();
			return pack;
		} catch (IOException e) {
			e.printStackTrace();
			HighlightPack pack = new HighlightPack(new SearchResults());
			pack.res.setErrorMsg("Internal error in SearchEngine: "+e.getMessage());
			log.error("Internal error in SearchEngine while trying to search main part: "+e.getMessage());
			return pack;
		}
		
	}
	
	/**
	 * Search on iid, with query searchterm. View results from offset to offset+limit, using
	 * the default namespaces filter
	 */
	public SearchResults search(IndexId iid, String searchterm, int offset, int limit, int iwlimit, NamespaceFilter nsDefault, boolean explain, boolean exactCase, boolean raw, boolean searchOnly){
		Analyzer analyzer = Analyzers.getSearcherAnalyzer(iid,exactCase);
		if(nsDefault == null || nsDefault.cardinality() == 0)
			nsDefault = new NamespaceFilter("0"); // default to main namespace
		FieldBuilder.BuilderSet bs = new FieldBuilder(iid,exactCase).getBuilder(exactCase);
		HashSet<String> stopWords = StopWords.getPredefinedSet(iid);
		WikiQueryParser parser = new WikiQueryParser(bs.getFields().contents(),nsDefault,analyzer,bs,NamespacePolicy.IGNORE,stopWords);
		HashSet<NamespaceFilter> fields = parser.getFieldNamespaces(searchterm);
		NamespaceFilterWrapper nsfw = null;
		Query q = null;
		SearchResults res = null;
		long searchStart = System.currentTimeMillis();
		Hashtable<String,NamespaceFilter> cachedFilters = GlobalConfiguration.getInstance().getNamespacePrefixes();
		boolean searchAll = false;
		
		// if search is over one field, try to use filters
		if(fields.size()==1){
			if(fields.contains(new NamespaceFilter())){
				nsfw = new NamespaceFilterWrapper(new NamespaceFilter());  // empty filter: "all" keyword
				searchAll = true;
			} else if(!fields.contains(nsDefault)){ 
				// use the specified prefix in the query (if it can be cached)
				NamespaceFilter f = fields.toArray(new NamespaceFilter[] {})[0];
				if(f.cardinality()==1 || NamespaceCache.isComposable(f))
					nsfw = new NamespaceFilterWrapper(f);
			// use default filter if it's cached or composable of cached entries
			} else if(cachedFilters.containsValue(nsDefault) || NamespaceCache.isComposable(nsDefault))
				nsfw = new NamespaceFilterWrapper(nsDefault);
		}
		
		WikiSearcher searcher = null;
		try {
			//q = parseQuery(searchterm,parser,iid,raw,nsfw,searchAll);
			
			TopDocs hits=null;
			// see if we can search only part of the index
			if(nsfw!=null && !nsfw.getFilter().isAll() && (iid.isMainsplit() || iid.isNssplit())){
				HashSet<IndexId> parts = new HashSet<IndexId>();
				for(NamespaceFilter f : nsfw.getFilter().decompose()){
					parts.add(iid.getPartByNamespace(f.getNamespace()));										
				}				
				if(parts.size() == 1){
					IndexId piid = parts.iterator().next();
					if(!piid.isFurtherSubdivided()){
						// search on single index part
						String host;
						if(piid.isMySearch())
							host = "localhost";
						else{
							// load balance remote hosts
							WikiSearcher ts = new WikiSearcher(iid);
							host = ts.getHost(piid);
						}
						if(host == null){
							res = new SearchResults();
							res.setErrorMsg("Error contacting searcher for "+piid);
							log.error("Error contacting searcher for "+piid);
							return res;
						}
						// query 
						Wildcards wildcards = new Wildcards(piid,host,exactCase);
						q = parseQuery(searchterm,parser,iid,raw,nsfw,searchAll,wildcards);
						
						RMIMessengerClient messenger = new RMIMessengerClient();						
						HighlightPack pack = messenger.searchPart(piid,searchterm,q,nsfw,offset,limit,explain,host);
						res = pack.res;
						if(!searchOnly){
							highlight(iid,q,parser.getWords(),pack.terms,pack.dfs,pack.maxDoc,res,exactCase,null);
							fetchTitles(res,searchterm,nsfw,iid,parser,wildcards,offset,0,iwlimit,explain);
							suggest(iid,searchterm,parser,res,offset,nsfw);
						}
						return res;
					}
				} 
				// construct a searcher on required parts
				HashSet<IndexId> expanded = new HashSet<IndexId>();
				for(IndexId p : parts){
					if(p.isFurtherSubdivided())
						expanded.addAll(p.getPhysicalIndexIds());
					else
						expanded.add(p);
				}
				log.info("Making searcher for "+expanded);
				searcher = new WikiSearcher(expanded);
			
			}
			if(searcher == null)
				searcher = new WikiSearcher(iid);
			// normal search
			try{
				// query 
				Wildcards wildcards = new Wildcards(searcher.getAllHosts(),exactCase);
				q = parseQuery(searchterm,parser,iid,raw,nsfw,searchAll,wildcards);
								
				hits = searcher.search(q,nsfw,offset+limit);
				res = makeSearchResults(searcher,hits,offset,limit,iid,searchterm,q,searchStart,explain);
				if(!searchOnly){
					highlight(iid,q,parser.getWords(),searcher,parser.getHighlightTerms(),res,exactCase);
					fetchTitles(res,searchterm,nsfw,iid,parser,wildcards,offset,0,iwlimit,explain);
					suggest(iid,searchterm,parser,res,offset,nsfw);
				}
				return res;
			} catch(Exception e){				
				if(e.getMessage()!=null && e.getMessage().equals("time limit")){
					res = new SearchResults();
					res.setErrorMsg("Time limit of "+timelimit+"ms exceeded");
					log.warn("Execution time limit of "+timelimit+"ms exceeded.");
					return res;
				}
				e.printStackTrace();
				res = new SearchResults();
				res.retry();
				log.warn("Retry, temportal error for query: ["+q+"] on "+iid);
				return res;
			}			
		} catch(ParseException e){
			res = new SearchResults();
			res.setErrorMsg("Error parsing query: "+searchterm);
			log.error("Cannot parse query: "+searchterm+", error: "+e.getMessage());
			return res;
		} catch (Exception e) {
			res = new SearchResults();
			e.printStackTrace();
			res.setErrorMsg("Internal error in SearchEngine: "+e.getMessage());
			log.error("Internal error in SearchEngine trying to make WikiSearcher: "+e.getMessage());
			return res;
		}
	}

	/** "Did you mean.." engine, use highlight results (if any) to refine suggestions, call after all other results are already obtained */
	protected void suggest(IndexId iid, String searchterm, WikiQueryParser parser, SearchResults res, int offset, NamespaceFilterWrapper nsfw) {
		if(offset == 0 && iid.hasSpell()){
			//if(res.isFoundAllInTitle())
			//	return;
			/* if(nsfw != null){
				BitSet def = global.getDefaultNamespace(iid).getIncluded(); // spellcheck is on these namespaces
				BitSet targ = nsfw.getFilter().getIncluded();
				if(!def.intersects(targ) && !nsfw.getFilter().isAll())
					return; // trying to spellcheck in namespaces other than built for
			} */
			if(nsfw == null)
				return; // query on many overlapping namespaces, won't try to spellcheck to not mess things up
			// suggest !
			res.setSuggest(null);
			ArrayList<Token> tokens = parser.tokenizeBareText(searchterm);			
			RMIMessengerClient messenger = new RMIMessengerClient();
			// find host 
			String host = cache.getRandomHost(iid.getSpell());
			SuggestQuery sq = messenger.suggest(host,iid.toString(),searchterm,tokens,res.getPhrases(),res.getFoundInContext(),res.getFirstHitRank(),nsfw.getFilter());
			res.setSuggest(sq);			
		}
	}

	protected Query parseQuery(String searchterm, WikiQueryParser parser, IndexId iid, boolean raw, NamespaceFilterWrapper nsfw, boolean searchAll, Wildcards wildcards) throws ParseException {
		Query q = null;
		if(raw){
			// do minimal parsing, make a raw query
			parser.setNamespacePolicy(WikiQueryParser.NamespacePolicy.LEAVE);
			q = parser.parseRaw(searchterm);
		} else if(nsfw == null){
			if(searchAll)
				q = parser.parse(searchterm,new ParsingOptions(NamespacePolicy.IGNORE,wildcards));
			else
				q = parser.parse(searchterm,new ParsingOptions(NamespacePolicy.REWRITE,wildcards));				
		} else{
			q = parser.parse(searchterm,new ParsingOptions(NamespacePolicy.IGNORE,wildcards));
			log.info("Using NamespaceFilterWrapper "+nsfw);
		}
		return q;
	}

	/** Our scores can span several orders of magnitude, transform them to be more relevant to the user */
	public float transformScore(double score){
		//return (float) (Math.log10(1+score*99)/2);
		return (float) score;
	}
	
	
	/** Fetch related interwiki titles 
	 * @throws IOException */
	protected void fetchTitles(SearchResults res, String searchterm, NamespaceFilterWrapper nsfw, IndexId iid, WikiQueryParser parser, Wildcards wildcards, int offset, int iwoffset, int iwlimit, boolean explain) throws IOException{
		if(!iid.hasTitlesIndex())
			return;
		if(offset != 0)
			return; // do titles search only for first page of normal-search results
		IndexId titles = iid.getTitlesIndex();
		IndexId main = titles.getDB();
		SuffixFilter sf = null;
		NamespaceFilter nsf = null;
		if(nsfw != null)
			nsf = nsfw.getFilter();
		
		ArrayList<String> words = parser.getWords();
		Query q = parser.parseForTitles(searchterm,wildcards);
		
		// this databases is in one part alone, we can optimize this case
		if(titles.getTitlesBySuffixCount()==1){
			IndexId target = null;
		
			// optimized case, we only need to search the other part of the index
			if(main.getSplitFactor()==2)
				target = (main.getPart(1) != titles)? main.getPart(1) : main.getPart(2); // get other part
			// not a split index, also search a single part
			else if(main.getSplitFactor()==1){
				target = titles;
				sf = new SuffixFilter(iid.getTitlesSuffix());
			}
			
			if(target != null){
				String host = cache.getRandomHost(target);
				RMIMessengerClient messenger = new RMIMessengerClient();
				SuffixNamespaceWrapper wrap = null;
				if(nsf != null || sf != null)
					wrap = new SuffixNamespaceWrapper(nsf,sf);
				SearchResults r = messenger.searchTitles(host,target.toString(),searchterm,words,q,wrap,iwoffset,iwlimit,explain);
				if(r.isSuccess())
					res.setTitles(r.getResults());
				else
					log.error("Error getting grouped titles results from "+host+":"+r.getErrorMsg());
				return;
			}			
		}
		
		// otherwise, we need to search all parts of the index
		long searchStart = System.currentTimeMillis();
		WikiSearcher searcher = new WikiSearcher(main);
		sf = new SuffixFilter(iid.getTitlesSuffix());
		SuffixNamespaceWrapper wrap = new SuffixNamespaceWrapper(nsf,sf);
		
		log.info("Using titles filter: "+wrap);
		
		TopDocs hits = searcher.search(q,wrap,iwoffset+iwlimit);
		SearchResults r = makeTitlesSearchResults(searcher,hits,iwoffset,iwlimit,main,searchterm,q,searchStart,explain);
		highlightTitles(main,q,words,searcher,r);
		
		if(r.isSuccess()){
			res.setTitles(r.getResults());
			if(r.isFoundAllInTitle())
				res.setFoundAllInTitle(true);
			//res.addToFirstHitRank(r.getNumHits());
		} else
			log.error("Error getting grouped titles search results: "+r.getErrorMsg());
	}
	
	protected SearchResults makeSearchResults(SearchableMul s, TopDocs hits, int offset, int limit, IndexId iid, String searchterm, Query q, long searchStart, boolean explain) throws IOException{
		SearchResults res = new SearchResults();
		int numhits = hits.totalHits;
		res.setSuccess(true);			
		res.setNumHits(numhits);
		logRequest(iid,"search",searchterm, q, numhits, searchStart, s);
		
		int size = min(limit+offset,MAXOFFSET,numhits) - offset;
		int[] docids = new int[size]; 
		float[] scores = new float[size];
		// fetch documents
		for(int i=offset, j=0 ; i<limit+offset && i<MAXOFFSET && i<numhits; i++, j++){
			docids[j] = hits.scoreDocs[i].doc;
			scores[j] = hits.scoreDocs[i].score;
		}
		// fetch documents
		Document[] docs = s.docs(docids);
		int j=0;
		//float maxScore = hits.getMaxScore();
		float maxScore = 1;
		for(Document doc : docs){
			String namespace = doc.get("namespace");
			String title = doc.get("title");
			float score = transformScore(scores[j]/maxScore); 
			ResultSet rs = new ResultSet(score,namespace,title);
			if(explain)
				rs.setExplanation(((Searcher)s).explain(q,docids[j]));
			res.addResult(rs);
			j++;
		}
		
		return res;
	}
	
	protected SearchResults makeTitlesSearchResults(SearchableMul s, TopDocs hits, int offset, int limit, IndexId iid, String searchterm, Query q, long searchStart, boolean explain) throws IOException{
		SearchResults res = new SearchResults();
		int numhits = hits.totalHits;
		res.setSuccess(true);			
		res.setNumHits(numhits);
		logRequest(iid,"search",searchterm, q, numhits, searchStart, s);
		
		int size = min(limit+offset,MAXOFFSET,numhits) - offset;
		int[] docids = new int[size]; 
		float[] scores = new float[size];
		// fetch documents
		for(int i=offset, j=0 ; i<limit+offset && i<MAXOFFSET && i<numhits; i++, j++){
			docids[j] = hits.scoreDocs[i].doc;
			scores[j] = hits.scoreDocs[i].score;
		}
		// fetch documents
		Document[] docs = s.docs(docids);
		int j=0;
		//float maxScore = hits.getMaxScore();
		float maxScore = 1;
		for(Document doc : docs){
			String namespace = doc.get("namespace");
			String title = doc.get("title");
			String suffix = doc.get("suffix");
			String interwiki = iid.getInterwikiBySuffix(suffix);
			float score = transformScore(scores[j]/maxScore); 
			ResultSet rs = new ResultSet(score,namespace,title,suffix,interwiki);
			if(explain)
				rs.setExplanation(((Searcher)s).explain(q,docids[j]));
			res.addResult(rs);
			j++;
		}
		
		return res;
	}
	
	protected Term[] getTerms(Query q, String field){
		String fieldExact = field+"_exact";
		HashSet<Term> termSet = new HashSet<Term>();
		q.extractTerms(termSet);
		HashSet<Term> forbidden = new HashSet<Term>();
		WikiQueryParser.extractForbiddenInto(q,forbidden);
		Iterator<Term> it = termSet.iterator();
		while(it.hasNext()){
			Term t = it.next();
			String fieldName = t.field(); 
			if(!(fieldName.equals(field) || fieldName.equals(fieldExact)) || forbidden.contains(t))
				it.remove();
		}
		return termSet.toArray(new Term[] {});
	}
	
	/** Highlight search results, and set the property in ResultSet */
	protected void highlight(IndexId iid, Query q, ArrayList<String> words, WikiSearcher searcher, Term[] terms, SearchResults res, boolean exactCase) throws IOException{
		int[] df = searcher.docFreqs(terms); 
		int maxDoc = searcher.maxDoc();
		highlight(iid,q,words,terms,df,maxDoc,res,exactCase,null);
	}
	
	/** Highlight search results, and set the property in ResultSet */
	protected void highlight(IndexId iid, Query q, ArrayList<String> words, IndexSearcherMul searcher, SearchResults res) throws IOException{
		Term[] terms = getTerms(q,"contents");
		int[] df = searcher.docFreqs(terms); 
		int maxDoc = searcher.maxDoc();
		highlight(iid,q,words,terms,df,maxDoc,res,false,null);
	}
	
	/** Highlight search results from titles index */
	protected void highlightTitles(IndexId iid, Query q, ArrayList<String> words, IndexSearcherMul searcher, SearchResults res) throws IOException{
		Term[] terms = getTerms(q,"alttitle");
		int[] df = searcher.docFreqs(terms); 
		int maxDoc = searcher.maxDoc();
		highlight(iid,q,words,terms,df,maxDoc,res,false,searcher.getIndexReader());
	}
	
	/** Highlight search results from titles index using a wikisearcher */
	protected void highlightTitles(IndexId iid, Query q, ArrayList<String> words, WikiSearcher searcher, SearchResults res) throws IOException{
		Term[] terms = getTerms(q,"alttitle");
		int[] df = searcher.docFreqs(terms); 
		int maxDoc = searcher.maxDoc();
		highlight(iid,q,words,terms,df,maxDoc,res,false,null);
	}
	
	/** Highlight article (don't call directly, use one of the interfaces above instead) */
	protected void highlight(IndexId iid, Query q, ArrayList<String> words, Term[] terms, int[] df, int maxDoc, SearchResults res, boolean exactCase, IndexReader reader) throws IOException{
		// iid -> array of keys
		HashMap<IndexId,ArrayList<String>> map = new HashMap<IndexId,ArrayList<String>>();
		iid = iid.getHighlight();
		// key -> result
		HashMap<String,ResultSet> keys = new HashMap<String,ResultSet>();
		for(ResultSet r : res.getResults()){
			IndexId piid = iid.getPartByNamespace(r.namespace);
			ArrayList<String> hits = map.get(piid);
			if(hits == null){
				hits = new ArrayList<String>();
				map.put(piid,hits);
			}
			hits.add(r.getKey());
			keys.put(r.getKey(),r);
		}
		// highlight!
		HashSet<String> stopWords = StopWords.getPredefinedSet(iid);
		HashMap<String,HighlightResult> results = new HashMap<String,HighlightResult>();
		RMIMessengerClient messenger = new RMIMessengerClient();
		
		for(Entry<IndexId,ArrayList<String>> e : map.entrySet()){
			IndexId piid = e.getKey();
			for(IndexId hiid : piid.getPhysicalIndexIds()){
				Highlight.ResultSet rs = null;
				if(reader != null){ 
					// we got a local reader, use it
					rs = Highlight.highlight(e.getValue(),hiid,terms,df,maxDoc,words,stopWords,exactCase,reader); 					
				} else{ 
					// remote call
					String host = cache.getRandomHost(hiid);
					rs = messenger.highlight(host,e.getValue(),hiid.toString(),terms,df,maxDoc,words,exactCase);
				}
				results.putAll(rs.highlighted);
				res.getPhrases().addAll(rs.phrases);
				res.getFoundInContext().addAll(rs.foundInContext);
				if(rs.foundAllInTitle && words.size()>1)
					res.setFoundAllInTitle(true);				
			}
		}
		res.addToFirstHitRank(res.getNumHits());
		// set highlight property
		for(Entry<String,HighlightResult> e : results.entrySet()){
			keys.get(e.getKey()).setHighlight(e.getValue());
		}
	}
	
	protected int min(int i1, int i2, int i3){
		return Math.min(Math.min(i1,i2),i3);
	}
	
	protected void logRequest(IndexId iid, String what, String searchterm, Query query, int numhits, long start, Searchable searcher) {
		long delta = System.currentTimeMillis() - start;
		SearchServer.stats.add(true, delta, SearchDaemon.getOpenCount());
		log.info(MessageFormat.format("{0} {1}: query=[{2}] parsed=[{3}] hit=[{4}] in {5}ms using {6}",
			new Object[] {what, iid.toString(), searchterm, query==null? "" : query.toString(), new Integer(numhits), new Long(delta), searcher.toString()}));
	}
}
