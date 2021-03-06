package de.brightbyte.wikiword.integrator.data;

import de.brightbyte.abstraction.PropertyAccessor;
import de.brightbyte.data.cursor.DataCursor;
import de.brightbyte.util.PersistenceException;

public class FeatureAssemblingCursor<R> implements DataCursor<FeatureSet> {

	protected DataCursor<R> cursor;
	protected PropertyMapping<R> qualfierMapping = null;
	protected R prev;
	
	protected PropertyAccessor<R, ? extends Object> recordIdAccessor;
	protected PropertyAccessor<R, ? extends String>  propertyNameAccessor;
	protected PropertyAccessor<R, ? extends Object>  propertyValueAccessor;
	
	public static FeatureAssemblingCursor<Record> newForRecordCursor(DataCursor<Record> cursor,
			String recordIdField, String PropertyNameField, String propertyValueField) {
		return new FeatureAssemblingCursor<Record>(cursor, 
				new Record.Accessor<Integer>(recordIdField, Integer.class),
				new Record.Accessor<String>(PropertyNameField, String.class),
				new Record.Accessor<Object>(propertyValueField, Object.class));
	}
			
	public FeatureAssemblingCursor(DataCursor<R> cursor,  
			PropertyAccessor<R, ? extends Object> recordIdAccessor, 
			PropertyAccessor<R, ? extends String> propertyNameAccessor, 
			PropertyAccessor<R, ? extends Object> propertyValueAccessor) {
		if (cursor==null) throw new NullPointerException();
		if (recordIdAccessor==null) throw new NullPointerException();
		if (propertyNameAccessor==null) throw new NullPointerException();
		if (propertyValueAccessor==null) throw new NullPointerException();
		
		this.cursor = cursor;
		this.recordIdAccessor = recordIdAccessor;
		this.propertyNameAccessor = propertyNameAccessor;
		this.propertyValueAccessor = propertyValueAccessor;
	}

	public void setQualifierMapping(PropertyMapping<R> qm) {
		this.qualfierMapping = qm;
	}
	
	public void close() {
		cursor.close();
	}

	public FeatureSet next() throws PersistenceException {
		if (prev==null) prev = cursor.next();
		if (prev==null) return null;
		
		FeatureSet f = new DefaultFeatureSet();
		Object currentId = recordIdAccessor.getValue(prev);
		f.addFeature(recordIdAccessor.getName(), currentId, null);
		
		while (prev!=null) {
			String key = propertyNameAccessor.getValue(prev);
			Object value = propertyValueAccessor.getValue(prev);
			
			Record qualifiers = getQualifiers(prev);
			
			f.addFeature(key, value, qualifiers);

			prev = cursor.next();
			if (prev==null) break;
			
			Object id =  recordIdAccessor.getValue(prev);
			if (!currentId.equals(id)) break;
		}
		
		return f;
	}

	private Record getQualifiers(R rec) {
		if (qualfierMapping==null) return null;
		
		Record qualifiers = null;
		
		Iterable<String> fields = qualfierMapping.fields();
		for (String field: fields) {
			Object value = qualfierMapping.getValue(rec, field, null);
			if (qualifiers==null) qualifiers = new DefaultRecord();
			qualifiers.add(field, value);
		}
		
		return qualifiers;
	}

}
 