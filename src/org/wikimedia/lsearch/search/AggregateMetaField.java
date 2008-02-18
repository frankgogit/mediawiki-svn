package org.wikimedia.lsearch.search;

import java.io.IOException;
import java.util.Collection;
import java.util.HashMap;
import java.util.StringTokenizer;
import java.util.WeakHashMap;

import javax.print.attribute.standard.Finishings;

import org.apache.log4j.Logger;
import org.apache.lucene.index.CorruptIndexException;
import org.apache.lucene.index.IndexReader;
import org.apache.lucene.index.IndexReader.FieldOption;

/**
 * Local cache of aggregate field meta informations
 * 
 * @author rainman
 *
 */
public class AggregateMetaField {
	static Logger log = Logger.getLogger(RankField.class);
	protected static WeakHashMap<IndexReader,HashMap<String,AggregateMetaFieldSource>> cache = new WeakHashMap<IndexReader,HashMap<String,AggregateMetaFieldSource>>();
	protected static Object lock = new Object();
	
	/** Get a cached field source 
	 * @throws IOException */
	public static AggregateMetaFieldSource getCachedSource(IndexReader reader, String field) throws IOException{
		synchronized(lock){
			HashMap<String,AggregateMetaFieldSource> fields = cache.get(reader);
			if(fields == null){
				fields = new HashMap<String,AggregateMetaFieldSource>();
				cache.put(reader,fields);
			}
			AggregateMetaFieldSource s = fields.get(field);
			if(s != null)
				return s;
			else{
				s = new AggregateMetaFieldSource(reader,field);
				fields.put(field,s);
				return s;
			}		
		}
	}
	
	/**
	 * Cached meta aggregate info 
	 * 
	 * @author rainman
	 *
	 */
	static public class AggregateMetaFieldSource {
		protected int[] index = null;
		protected byte[] length  = null;
		protected byte[] lengthNoStopWords = null;
		protected float[] boost  = null;
		protected IndexReader reader = null;
		protected String field;
		protected boolean cachingFinished = false;
		
		protected class CachingThread extends Thread {
			public void run(){
				log.info("Caching aggregate field "+field+" for "+reader.directory());
				int maxdoc = reader.maxDoc();
				index = new int[maxdoc];
				int count = 0;
				length = new byte[maxdoc]; // estimate maxdoc values
				lengthNoStopWords = new byte[maxdoc]; 
				boost = new float[maxdoc];
				for(int i=0;i<maxdoc;i++){
					byte[] stored = null;
					try{
						stored = reader.document(i).getBinaryValue(field);
						index[i] = count;
						if(stored == null)
							continue;
						for(int j=0;j<stored.length/6;j++){
							if(count >= length.length){
								length = extendBytes(length);
								lengthNoStopWords = extendBytes(lengthNoStopWords);
								boost = extendFloats(boost);
							}						
							length[count] = stored[j*6];
							if(length[count] == 0){
								log.warn("Broken length=0 for docid="+i+", at position "+j);
							}
							lengthNoStopWords[count] = stored[j*6+1];
							int boostInt = (((stored[j*6+2]&0xff) << 24) + ((stored[j*6+3]&0xff) << 16) + ((stored[j*6+4]&0xff) << 8) + ((stored[j*6+5]&0xff) << 0));
							boost[count] = Float.intBitsToFloat(boostInt);
							
							count++;
						}										
					} catch(Exception e){
						log.error("Exception during processing stored_field="+field+" on docid="+i+", with stored="+stored+" : "+e.getMessage());
						e.printStackTrace();
					}
				}
				// compact arrays
				if(count < length.length - 1){
					length = resizeBytes(length,count);
					lengthNoStopWords = resizeBytes(lengthNoStopWords,count);
					boost = resizeFloats(boost,count);
				}
				log.info("Finished caching aggregate "+field+" for "+reader.directory());
				cachingFinished = true;
			}
			protected byte[] extendBytes(byte[] array){
				return resizeBytes(array,array.length*2);
			}
			protected byte[] resizeBytes(byte[] array, int size){
				byte[] t = new byte[size];
				System.arraycopy(array,0,t,0,Math.min(array.length,size));
				return t;
			}
			protected float[] extendFloats(float[] array){
				return resizeFloats(array,array.length*2);
			}		
			protected float[] resizeFloats(float[] array, int size){
				float[] t = new float[size];
				System.arraycopy(array,0,t,0,Math.min(array.length,size));
				return t;
			}
		}
		
		protected AggregateMetaFieldSource(IndexReader reader, String fieldBase) throws IOException{
			this.reader = reader;
			this.field = fieldBase+"_meta";
			Collection fields = reader.getFieldNames(FieldOption.ALL);
			if(!fields.contains(field)){
				cachingFinished = true;
				return; // index doesn't have ranking info
			}
			
			// run background caching
			new CachingThread().start();
		}
		protected int getValueIndex(int docid, int position){
			return getValueIndex(docid,position,false);
		}
		protected int getValueIndex(int docid, int position, boolean checkExists){
			int start = index[docid];
			int end = (docid == index.length-1)? length.length : index[docid+1];
			if(position >= end-start){
				if(checkExists) // if true this is not an error
					return -1; 
				else
					throwException(docid,position,end-start-1);
			}
			return start+position;
		}
		
		private void throwException(int docid, int position, int lastValid){
			try {
				// first try to give more detailed error
				throw new ArrayIndexOutOfBoundsException("Requestion position "+position+" on field "+field+" for "+docid+" ["+reader.document(docid).get("namespace")+":"+reader.document(docid).get("title")+"], but last valid index is "+lastValid);
			} catch (IOException e) {
				e.printStackTrace();
				throw new ArrayIndexOutOfBoundsException("Requestion position "+position+" on field "+field+" unavailable");
			}			
		}
		
		protected byte[] getStored(int docid) throws CorruptIndexException, IOException{
			return reader.document(docid).getBinaryValue(field);
		}
		
		/** Get length for position */ 
		public int getLength(int docid, int position) throws CorruptIndexException, IOException{
			if(!cachingFinished) // still caching in background
				return getStored(docid)[position*6];
			return length[getValueIndex(docid,position)];
		}		
		/** Get length for position */ 
		public int getLengthNoStopWords(int docid, int position) throws CorruptIndexException, IOException{
			if(!cachingFinished) 
				return getStored(docid)[position*6+1];
			return lengthNoStopWords[getValueIndex(docid,position)];
		}
		/** generic function to get boost value at some position, if checkExists=true won't die on error */
		private float getBoost(int docid, int position, boolean checkExists) throws CorruptIndexException, IOException{
			if(!cachingFinished){
				byte[] stored = getStored(docid);
				if(stored == null || (position*6+5)>=stored.length){
					if(checkExists)
						return 1;
					else
						throwException(docid,position,(stored==null)? 0 : (stored.length/6));
				}
				int boostInt = (((stored[position*6+2]&0xff) << 24) + ((stored[position*6+3]&0xff) << 16) + ((stored[position*6+4]&0xff) << 8) + ((stored[position*6+5]&0xff) << 0));
				return Float.intBitsToFloat(boostInt);
			}
			int inx = getValueIndex(docid,position,checkExists);
			if(inx == -1) // value not found, fine ... (were looking for boost)
				return 1;
			return boost[inx];
		}
		
		/** Get boost for position */ 
		public float getBoost(int docid, int position) throws CorruptIndexException, IOException{
			return getBoost(docid,position,false);
		}
		
		/** Get rank (boost at position 0) */
		public float getRank(int docid) throws CorruptIndexException, IOException{
			return getBoost(docid,0,true);
		}
	}
}
