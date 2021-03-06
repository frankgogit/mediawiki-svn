/**
 * Creates an es.DocumentModel object.
 * 
 * @class
 * @constructor
 * @param items {Array}
 * @param attributes {Object}
 * @property items {Array}
 * @property attributes {Object}
 */
es.DocumentModel = function( blocks, attributes ) {
	es.ModelList.call( this );
	this.items = new es.AggregateArray( blocks || [] );
	this.attributes = attributes || {};
};

/* Static Methods */

/**
 * Creates an es.DocumentModel object from a plain object.
 * 
 * @method
 * @static
 * @param obj {Object}
 */
es.DocumentModel.newFromPlainObject = function( obj ) {
	var types = es.BlockModel.constructors;
	return new es.DocumentModel(
		// children - if given, convert all plain "child" objects to es.WikiDom* objects
		!$.isArray( obj.children ) ? [] : $.map( obj.children, function( child ) {
			return es.BlockModel.newFromPlainObject( child );
		} )
	);
};

/* Methods */

es.DocumentModel.prototype.commit = function( transaction ) {
	// TODO
};

es.DocumentModel.prototype.rollback = function( transaction ) {
	// TODO
};

es.DocumentModel.prototype.prepareInsertContent = function( offset, content ) {
	// TODO
};

es.DocumentModel.prototype.prepareRemoveContent = function( range ) {
	// TODO
};

es.DocumentModel.prototype.prepareAnnotateContent = function( range, annotation ) {
	// TODO
};

es.DocumentModel.prototype.insertContent = function( offset, content ) {
	// TODO
};

es.DocumentModel.prototype.removeContent = function( range ) {
	// TODO
};

es.DocumentModel.prototype.annotateContent = function( range, annotation ) {
	// TODO
};

es.DocumentModel.prototype.getPlainObject = function() {
	var obj = {};
	if ( this.items.length ) {
		obj.blocks = [];
		for ( var i = 0; i < this.items.length; i++ ) {
			obj.blocks.push( this.items[i].getPlainObject() );
		}
	}
	if ( !$.isEmptyObject( this.attributes ) ) {
		obj.attributes = $.extend( true, {}, this.attributes );
	}
};

/**
 * Gets the size of the of the contents of all blocks.
 * 
 * @method
 * @returns {Integer}
 */
es.DocumentModel.prototype.getContentLength = function() {
	return this.items.getContentLength();
};

es.extend( es.DocumentModel, es.ModelList );
