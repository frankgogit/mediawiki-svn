/*
 * Copyright 2004 Kate Turner
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy 
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights 
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
 * copies of the Software, and to permit persons to whom the Software is 
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in 
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 * $Id$
 */
package org.wikimedia.lsearch;

import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.MessageFormat;
import java.util.HashMap;
import java.util.Map;
import java.util.Iterator;

import org.apache.lucene.analysis.Analyzer;
import org.apache.lucene.document.Document;
import org.apache.lucene.document.Field;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.IndexWriter;
import org.apache.lucene.index.Term;
import org.apache.lucene.queryParser.QueryParser;
import org.apache.lucene.search.Hits;
import org.apache.lucene.search.IndexSearcher;
import org.apache.lucene.search.Searcher;
import org.apache.lucene.search.TermQuery;
import org.apache.lucene.store.Directory;
import org.apache.lucene.store.RAMDirectory;

import org.apache.lucene.analysis.de.GermanAnalyzer;
import org.apache.lucene.analysis.ru.RussianAnalyzer;
//import com.sleepycat.je.DatabaseException;

/**
 * @author Kate Turner
 *
 */
public class SearchState {
	/** Logger */
	static java.util.logging.Logger log = java.util.logging.Logger.getLogger("SearchState");
	
	//private static Stack<SearchState> states;
	//private static Map<String, SearchState> openWikis;
	private static Map openWikis;
	static {
		//states = new Stack<SearchState>();
		//openWikis = new HashMap<String, SearchState>();
		openWikis = new HashMap();
	}
	public static SearchState forWiki(String dbname) throws SearchDbException {
		log.fine("lookup " + dbname);
		SearchState t = null;
		synchronized (openWikis) {
			log.fine("got lock on openWikis");
			try {
				t = (SearchState)openWikis.get(dbname);
				if (t != null)
					return t;
				t = new SearchState(dbname);
				openWikis.put(dbname, t);
				log.fine("got " + dbname);
				return t;
			} finally {
				log.fine("released lock on openWikis");
			}
		}
	}

	public static boolean stateOpen(String state) {
		return openWikis.get(state) != null;
	}
	
	public static void resetStates() {
		synchronized (openWikis) {
			//for (SearchState state : openWikis.values()) {
			for (Iterator iter = openWikis.values().iterator(); iter.hasNext();) {
				SearchState state = (SearchState)iter.next();
				state.reopen();
			}
		}
	}

	private String mydbname;
	Searcher searcher = null;
	Analyzer analyzer = null;
	QueryParser parser = null;
	IndexReader reader = null;		
	TitlePrefixMatcher matcher = null;
	String indexpath;
	Configuration config;
	IndexWriter writer;
	boolean writable = false;

	// An in-memory directory which we'll write updates into.
	private Directory buffer;
	private int updatesWritten;
	
	private SearchState(String dbname) throws SearchDbException {
		config = Configuration.open();
		indexpath = MessageFormat.format(config.getString("mwsearch.indexpath"),
				new Object[] { dbname });
		File f = new File(indexpath);
		if (!f.exists())
			f.mkdirs();
		
		log.fine(dbname + ": opening state");
		analyzer = getAnalyzerForLanguage(config.getLanguage(dbname));
		log.info(dbname + " using analyzer " +analyzer.getClass().getName());
		parser = new QueryParser("contents", analyzer);
		try {
			openReader();
		} catch (IOException e) {
			log.warning(dbname + ": warning: open for read failed");
			//throw new SearchDbException();
		}
		log.fine(dbname + ": reading title index...");
		matcher = new TitlePrefixMatcher(dbname);
		mydbname = dbname;
	}
	
	/**
	 * @param language
	 * @return
	 */
	private Analyzer getAnalyzerForLanguage(String language) {
		if (language.equals("de"))
			return new GermanAnalyzer();
		if (language.equals("eo"))
			return new EsperantoAnalyzer();
		if (language.equals("ru"))
			return new RussianAnalyzer();
		return new EnglishAnalyzer();
	}

	void close() {
		try {
			if (writable)
				mergeWrites();
			closeReader();
		} catch (IOException e) {
			log.warning(mydbname + ": warning: closing index: " + e.getMessage());
		}
	}
	
	/**
	 * @throws IOException
	 * 
	 */
	private void mergeWrites() throws IOException {
		writer.close();
		writable = false;
		
		log.info("Merging " + updatesWritten + " updates to disk on " + mydbname);
		try {
			// Need to flush any pending deletions on the reader...
			closeReader();
			
			// Merge updates from RAM to disk...
			IndexWriter ondisk = new IndexWriter(indexpath, analyzer, false);
			ondisk.addIndexes(new Directory[] { buffer });
			ondisk.close();
		} finally {
			updatesWritten = 0;
			openReader();
			buffer.close();
			
			// A new in-RAM buffer will be created on demand.
		}
	}
	
	private void countOrMerge() throws IOException {
		updatesWritten++;
		if (updatesWritten >= 10000)
			mergeWrites();
	}

	private void reopen() {
		try {
			closeReader();
			openReader();
		} catch (IOException e) {
			log.warning(mydbname + ": warning: reopening index: " + e.getMessage());
		}
	}
	
	/**
	 * @throws IOException
	 */
	private void openReader() throws IOException {
		reader = IndexReader.open(indexpath);
		searcher = new IndexSearcher(reader);
	}

	/**
	 * @throws IOException
	 */
	private void closeReader() throws IOException {
		searcher.close();
		reader.close();
	}

	/**
	 * Open the index for writing if it's not already. This is implicitly
	 * called when addDocument() is used, so callers don't need to do it.
	 * 
	 * We won't actually write to the main index yet; we're actually opening
	 * an in-memory directory which we'll buffer updates to, and merge them
	 * in chunks to disk.
	 * 
	 * @throws IOException
	 */
	private void openForWrite() throws IOException {
		if (writable)
			return;
		buffer = new RAMDirectory();
		writer = new IndexWriter(buffer, analyzer, true);
		writable = true;
		updatesWritten = 0;
	}
	
	/**
	 * Create a fresh new index.
	 * Any existing database will be overwritten.
	 * @throws IOException
	 */
	public void initializeIndex() throws IOException {
		log.info("Creating new index for " + mydbname);
		new IndexWriter(indexpath, analyzer, true).close();
		openReader();
	}
	
	public ArticleList enumerateArticles() throws SQLException {
		return enumerateArticles("19700101000000");
	}
	
	public ArticleList enumerateArticles(String startDate) throws SQLException {
		DatabaseConnection dbconn = DatabaseConnection.forWiki(mydbname);
		Connection conn = dbconn.getConn();
		String query;
		PreparedStatement pstmt;
		String tablePrefix = config.getString("mwsearch.tableprefix");
		if (tablePrefix == null) tablePrefix = "";
		
		if (!config.getBoolean("mwsearch.oldmediawiki"))
			query = "/* MWSearch */ SELECT page_id,page_namespace,page_title,old_text,page_timestamp " +
				"FROM " + tablePrefix + "page FORCE INDEX(page_timestamp), " +
				tablePrefix + "revision " +
				tablePrefix + "text " +
				"WHERE page_timestamp > \"" + startDate +
				"\" AND old_id=rev_text_id AND rev_id=page_latest AND page_is_redirect=0";
		else
			query = "/* MWSearch */ SELECT cur_id,cur_namespace,cur_title,cur_text,cur_timestamp " +
				"FROM " + tablePrefix + "cur FORCE INDEX (cur_timestamp) " +
				"WHERE cur_timestamp>\"" + startDate + "\" AND cur_is_redirect=0";
		pstmt = conn.prepareStatement(query, ResultSet.TYPE_FORWARD_ONLY,
				ResultSet.CONCUR_READ_ONLY);
		pstmt.setFetchSize(Integer.MIN_VALUE);
		ResultSet rs = pstmt.executeQuery();
		return new ArticleList(mydbname, rs);
	}
	
	public void addArticle(Article article) throws IOException, SearchDbException {
		openForWrite();
		Document d = new Document();
		
		// This will be used to look up and replace entries on index updates.
		d.add(Field.Keyword("key", article.getKey()));
		
		// These fields are returned with results
		d.add(Field.Text("namespace", article.getNamespace()));
		d.add(Field.Text("title", article.getTitle()));
		
		// Bulk contents are indexed only, not stored.
		// Clients can pull up-to-date text from the source database for hit matching.
		d.add(new Field("contents", stripWiki(article.getContents()), 
				false, true, true));
		writer.addDocument(d);
		
		countOrMerge();
		
		if (article.getNamespace().equals("0")) {
			matcher.addArticle(article);
		}

	}

	/**
	 * When altering an existing index, we have to manually remove the previous
	 * version of an article when we update it, or results will include both
	 * old and new versions.
	 * 
	 * @param article
	 * @throws IOException
	 * @throws SearchDbException
	 */
	public void replaceArticle(Article article) throws IOException, SearchDbException {
		deleteArticle(article);
		addArticle(article);
	}
	
	/**
	 * Lucene doesn't let us do deletes from an IndexWriter, only an IndexReader.
	 * To avoid locking or constant open-close switches, be sure that writing
	 * is only happening on an in-memory writer.
	 * @param article
	 * @throws IOException
	 */
	private void deleteArticle(Article article) throws IOException {
		String key = article.getKey();
		Hits hits = searcher.search(new TermQuery(
				new Term("key", key)));
		if (hits.length() == 0)
			log.fine("Nothing to delete for " + key);
		for (int i = 0; i < hits.length(); i++) {
			int id = hits.id(i);
			log.fine("Trying to delete article number " + id + "for " + key);
			try {
				reader.delete(id);
			} catch (IOException e) {
				log.warning("Couldn't delete article number " + 
					id + " for " + key + "... " + e.getMessage());
				e.printStackTrace();
			}
		}
	}

	private static String stripWiki(String text) {
		int i = 0, j, k;
		i = text.indexOf("[[Image:");
		if (i == -1) i = text.indexOf("[[image:");
		int l = i;
		while (i > -1) {
			j = text.indexOf("[[", i + 2);
			k = text.indexOf("]]", i + 2);
			if (j != -1 && j < k && k > -1) {
				i = k;
				continue;
			}
			if (k == -1)
				text = text.substring(0, l);
			else
				text = text.substring(0, l) + 
				text.substring(k + 2);
			i = text.indexOf("[[Image:");
			if (i == -1) i = text.indexOf("[[image:");		
			l = i;
		}

		while ((i = text.indexOf("<!--")) != -1) {
			if ((j = text.indexOf("-->", i)) == -1)
				break;
			if (j + 4 >= text.length())
				text = text.substring(0, i);
			else
				text = text.substring(0, i) + text.substring(j + 4);
		}
		text = text.replaceAll("\\{\\|(.*?)\\|\\}", "")
			.replaceAll("\\[\\[[A-Za-z_-]+:([^|]+?)\\]\\]", "")
			.replaceAll("\\[\\[([^|]+?)\\]\\]", "$1")
			.replaceAll("\\[\\[([^|]+\\|)(.*?)\\]\\]", "$2")
			.replaceAll("(^|\n):*''[^'].*\n", "")
			.replaceAll("^----.*", "")
			.replaceAll("'''''", "")
			.replaceAll("('''|</?[bB]>)", "")
			.replaceAll("''", "")
			.replaceAll("</?[uU]>", "");
		return text;
	}

}
