package org.wikimedia.lsearch.ranks;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Iterator;
import java.util.Map.Entry;

import org.mediawiki.importer.DumpWriter;
import org.mediawiki.importer.Page;
import org.mediawiki.importer.Revision;
import org.mediawiki.importer.Siteinfo;
import org.wikimedia.lsearch.beans.ArticleLinks;
import org.wikimedia.lsearch.beans.Title;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.util.Localization;

/**
 * Read a HashSet of titles from dump
 * 
 * @author rainman
 *
 */
public class TitleReader  implements DumpWriter{
	Page page;
	Revision revision;
	Links links;
	protected String langCode;
	
	public TitleReader(String langCode, IndexId iid) throws IOException{
		this.langCode = langCode;
		this.links = Links.createNew(iid);
	}

	public void writeRevision(Revision revision) throws IOException {
		this.revision = revision;		
	}
	public void writeStartPage(Page page) throws IOException {
		this.page = page;
	}
	public void writeEndPage() throws IOException {
		String key = page.Title.Namespace+":"+page.Title.Text;
		links.addTitle(new Title(key));
	}
	public Links getLinks() {
		return links;
	}
	public void close() throws IOException {
		// nop		
	}
	public void writeEndWiki() throws IOException {
		// nop
	}
	public void writeSiteinfo(Siteinfo info) throws IOException {
		// write siteinfo to localization
		Iterator it = info.Namespaces.orderedEntries();
		while(it.hasNext()){
			Entry<Integer,String> pair = (Entry<Integer,String>)it.next();
			Localization.addCustomMapping(pair.getValue(),pair.getKey(),langCode);
			links.addToNamespaceMap(pair.getValue(),pair.getKey());
		}
	}	
	public void writeStartWiki() throws IOException {
		// nop		
	}
}
