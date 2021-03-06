package de.brightbyte.wikiword.disambig;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import de.brightbyte.io.Output;
import de.brightbyte.util.PersistenceException;
import de.brightbyte.wikiword.model.PhraseNode;
import de.brightbyte.wikiword.model.TermListNode;
import de.brightbyte.wikiword.model.TermReference;
import de.brightbyte.wikiword.model.WikiWordConcept;

public abstract class AbstractDisambiguator<C extends WikiWordConcept> implements Disambiguator<C> {

	private MeaningFetcher<? extends C> meaningFetcher;
	
	private Output trace;

	private Map<String, C> meaningOverrides;
	
	public AbstractDisambiguator(MeaningFetcher<? extends C> meaningFetcher, int cacheCapacity) {
		if (meaningFetcher==null) throw new NullPointerException();
		
		if (cacheCapacity>0) meaningFetcher = new CachingMeaningFetcher<C>(meaningFetcher, cacheCapacity);
		this.meaningFetcher = meaningFetcher;
	}

	public MeaningFetcher<? extends C> getMeaningFetcher() {
		return meaningFetcher;
	}

	public void setMeaningOverrides(Map<String, C> overrideMap) {
		this.meaningOverrides = overrideMap;
	}	
	
	protected <X extends TermReference>PhraseNode<X> getLastNode(PhraseNode<X> root, List<X> sequence) {
		PhraseNode<X> n = findLastNode(root, sequence);
		if (n==null) throw new IllegalArgumentException("sequence does not match node structure: "+sequence);
		return n;
	}
	
	private <X extends TermReference>PhraseNode<X> findLastNode(PhraseNode<X> root, List<X> sequence) {
		if (root.getTermReference().getTerm().length()>0) {
			X t = sequence.get(0);
			if (!t.getTerm().equals(root.getTermReference().getTerm())) return null;
			sequence = sequence.subList(1, sequence.size());
		}
		
		terms: for (X t: sequence) {
			Collection<? extends PhraseNode<X>> successors = root.getSuccessors();
			if (successors==null || successors.isEmpty()) 
				return null;
			
			for (PhraseNode<X> n: successors) {
				if (n.getTermReference().getTerm().equals(t.getTerm())) {
					root = n;
					continue terms;
				}
			}
			
			for (PhraseNode<X> n: successors) {
				PhraseNode<X> m = findLastNode(n, sequence);
				if (m != null) return m;
			}
			
			return null;
		}
		
		return root;
	}
	
	protected <X extends TermReference>Collection<X> getTerms(PhraseNode<X> root, int depth) {
		PhraseNode.TermSetBuilder<X> builder = new PhraseNode.TermSetBuilder<X>();
		builder.walk(root, 0, null, depth, Double.MAX_VALUE);
		return builder.getTerms();
	}
	
	protected <X extends TermReference>Collection<List<X>> getSequences(PhraseNode<X> root, int depth) {
		PhraseNode.SequenceSetBuilder<X> builder = new PhraseNode.SequenceSetBuilder<X>();
		builder.walk(root, 0, null, depth, Double.MAX_VALUE);
		return builder.getSequences();
	}
	
	protected <X extends TermReference>void pruneMeaninglessSequences(Collection<List<X>> sequences,  Map<X, List<? extends C>> meanings) {
		Iterator<List<X>> it = sequences.iterator();
		outer: while ( it.hasNext() ) {
			List<X> seq = it.next();
			
			for (X t: seq) {
				if ( meanings.get(t) != null ) {
					continue outer;
				}
			}
			
			it.remove();
		}
	}
	
	protected <X extends TermReference>Map<X, List<? extends C>> getMeanings(PhraseNode<X> root, Map<String, C> known) throws PersistenceException {
		Collection<X> terms = getTerms(root, Integer.MAX_VALUE);
		return getMeanings(terms, known);
	}
	
	protected <X extends TermReference>Map<X, List<? extends C>> getMeanings(Collection<X> terms, Map<String, C> known) throws PersistenceException {
		Collection<X> todo = terms;
		
		if (meaningOverrides!=null || known!=null) {
			todo = new ArrayList<X>();
			
			for (X t: terms) {
				if (  ( meaningOverrides==null || !meaningOverrides.containsKey(t.getTerm()) ) 
						&& ( known == null || !known.containsKey(t.getTerm()) )   ) {
					todo.add(t);
				}
			}
		}
		
		//FIXME: got confused by generics :(
		Map<X, List<? extends C>> meanings = (Map<X, List<? extends C>>)(Object)meaningFetcher.getMeanings(todo); 
		
		if (meaningOverrides!=null && todo.size()!=terms.size()) {
			for (X t: terms) {
				C c = meaningOverrides.get(t.getTerm());
				if (c!=null) meanings.put(t, Collections.singletonList(c));
			}
		}

		if (known!=null && todo.size()!=terms.size()) {
			for (X t: terms) {
				C c = known.get(t.getTerm());
				if (c!=null) meanings.put(t, Collections.singletonList(c));
			}
		}

		return meanings;
	}
	
	public <X extends TermReference>Disambiguation<X, C> disambiguate(List<X> terms, Map<String, C> known, Collection<? extends C> context) throws PersistenceException {
		PhraseNode<X> root = new TermListNode<X>(terms, 0);
		Map<X, List<? extends C>> meanings = getMeanings(terms, known);
		return doDisambiguate(root, meanings, context);
	}
	
	public <X extends TermReference>Disambiguation<X, C> disambiguate(PhraseNode<X> root, Map<String, C> known, Collection<? extends C> context) throws PersistenceException {
		Collection<X> terms = getTerms(root, Integer.MAX_VALUE);
		Map<X, List<? extends C>> meanings = getMeanings(terms, known);
		return doDisambiguate(root, meanings, context);
	}
		
	public abstract <X extends TermReference>Disambiguation<X, C> doDisambiguate(PhraseNode<X> root, Map<X, List<? extends C>> meanings, Collection<? extends C> context) throws PersistenceException;

	public Output getTrace() {
		return trace;
	}

	public void setTrace(Output trace) {
		this.trace = trace;
	}

	protected void trace(String msg) {
		if (trace!=null) trace.println(msg);
	}

}