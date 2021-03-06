var title = require('./mediawiki.Title.js'),
	Title = title.Title,
	Namespace = title.Namespace;

var MWParserEnvironment = function(opts) {
	var options = {
		tagHooks: {},
		parserFunctions: {},
		pageCache: {}, // @fixme use something with managed space
		debug: false,
		trace: false,
		wgScriptPath: "/wiki",
		wgScript: "/wiki/index.php",
		wgUploadPath: "/wiki/images",
		wgScriptExtension: ".php",
		fetchTemplates: false,
		maxDepth: 40
	};
	// XXX: this should be namespaced
	$.extend(options, opts);
	$.extend(this, options);
};

// Outstanding page requests (for templates etc)
// Class-static
MWParserEnvironment.prototype.requestQueue = {};

MWParserEnvironment.prototype.lookupKV = function ( kvs, key ) {
	if ( ! kvs ) {
		return null;
	}
	var kv;
	for ( var i = 0, l = kvs.length; i < l; i++ ) {
		kv = kvs[i];
		if ( kv.k === key ) {
			// found, return it.
			return kv;
		}
	}
	// nothing found!
	return null;
};

MWParserEnvironment.prototype.lookupValue = function ( kvs, key ) {
	if ( ! kvs ) {
		return null;
	}
	var kv;
	for ( var i = 0, l = kvs.length; i < l; i++ ) {
		kv = kvs[i];
		if ( kv.v === key ) {
			// found, return it.
			return kv;
		}
	}
	// nothing found!
	return null;
};

MWParserEnvironment.prototype.KVtoHash = function ( kvs ) {
	if ( ! kvs ) {
		console.warn( "Invalid kvs!: " + JSON.stringify( kvs, null, 2 ) );
		return {};
	}
	var res = {};
	for ( var i = 0, l = kvs.length; i < l; i++ ) {
		var kv = kvs[i],
			key = this.tokensToString( kv.k ).trim();
		if( res[key] === undefined ) {
			res[key] = kv.v;
		}
	}
	//console.warn( 'KVtoHash: ' + JSON.stringify( res ));
	return res;
};

// Does this need separate UI/content inputs?
MWParserEnvironment.prototype.formatNum = function( num ) {
	return num + '';
};

MWParserEnvironment.prototype.getVariable = function( varname, options ) {
		//
};

/**
 * @return MWParserFunction
 */
MWParserEnvironment.prototype.getParserFunction = function( name ) {
	if (name in this.parserFunctions) {
		return new this.parserFunctions[name]( this );
	} else {
		return null;
	}
};

/**
 * @return MWParserTagHook
 */
MWParserEnvironment.prototype.getTagHook = function( name ) {
	if (name in this.tagHooks) {
		return new this.tagHooks[name](this);
	} else {
		return null;
	}
};


MWParserEnvironment.prototype.makeTitleFromPrefixedText = function ( text ) {
	text = this.normalizeTitle( text );
	var nsText = text.split( ':', 1 )[0];
	if ( nsText && nsText !== text ) {
		var _ns = new Namespace(0);
		var ns = _ns._defaultNamespaceIDs[ nsText.toLowerCase() ];
		//console.warn( JSON.stringify( [ nsText, ns ] ) );
		if ( ns !== undefined ) {
			return new Title( text.substr( nsText.length + 1 ), ns, nsText, this );
		} else {
			return new Title( text, 0, '', this );
		}
	} else {
		return new Title( text, 0, '', this );
	}
};


// XXX: move to Title!
MWParserEnvironment.prototype.normalizeTitle = function( name ) {
	if (typeof name !== 'string') {
		throw new Error('nooooooooo not a string');
	}
	var forceNS;
	if ( name.substr( 0, 1 ) === ':' ) {
		forceNS = ':';
		name = name.substr(1);
	} else {
		forceNS = '';
	}

	name = name.trim().replace(/[\s_]+/g, '_');

	// Implement int: as alias for MediaWiki:
	if ( name.substr( 0, 4 ) === 'int:' ) {
		name = 'MediaWiki:' + name.substr( 4 );
	}

	// FIXME: Generalize namespace case normalization
	if ( name.substr( 0, 10 ).toLowerCase() === 'mediawiki:' ) {
		name = 'MediaWiki:' + name.substr( 10 );
	}
	
	function upperFirst( s ) { return s.substr(0, 1).toUpperCase() + s.substr(1); }
	// XXX: Do not uppercase all bits!
	var ns = name.split(':', 1)[0];
	if( ns !== '' && ns !== name ) {
		name = upperFirst( ns ) + ':' + upperFirst( name.substr( ns.length + 1 ) );
	} else {
		name = upperFirst( name );
	}
	//name = name.split(':').map( upperFirst ).join(':');
	//if (name === '') {
	//	throw new Error('Invalid/empty title');
	//}
	return forceNS + name;
};

/**
 * @fixme do this for real eh
 */
MWParserEnvironment.prototype.resolveTitle = function( name, namespace ) {
	// hack!
	if (name.indexOf(':') == -1 && typeof namespace ) {
		// hack hack hack
		name = namespace + ':' + this.normalizeTitle( name );
	}
	return name;
};

MWParserEnvironment.prototype.tokensToString = function ( tokens, strict ) {
	var out = [];
	//console.warn( 'MWParserEnvironment.tokensToString, tokens: ' + JSON.stringify( tokens ) );
	// XXX: quick hack, track down non-array sources later!
	if ( ! $.isArray( tokens ) ) {
		tokens = [ tokens ];
	}
	for ( var i = 0, l = tokens.length; i < l; i++ ) {
		var token = tokens[i];
		if ( token === undefined ) {
			console.trace();
			this.tp( 'MWParserEnvironment.tokensToString, invalid token: ' + 
							JSON.stringify( token ) +
							' tokens:' + JSON.stringify( tokens, null, 2 ));
			continue;
		}
		if ( token.constructor === String ) {
			out.push( token );
		} else if ( token.type === 'COMMENT' || token.type === 'NEWLINE' ) {
			// strip comments and newlines
		} else {
			if ( strict ) {
				return [out.join(''), tokens.slice( i )];
			}
			var tstring = JSON.stringify( token );
			this.dp ( 'MWParserEnvironment.tokensToString, non-text token: ' + 
					tstring + JSON.stringify( tokens, null, 2 ) );
			//out.push( tstring );
		}
	}
	//console.warn( 'MWParserEnvironment.tokensToString result: ' + out.join('') );
	return out.join('');
};

MWParserEnvironment.prototype.decodeURI = function ( s ) {
	return s.replace( /%[0-9a-f][0-9a-f]/g, function( m ) {
		try {
			return decodeURI( m );
		} catch ( e ) {
			return m;
		}
	} );
};

MWParserEnvironment.prototype.sanitizeURI = function ( s ) {
	var host = s.match(/^[a-zA-Z]+:\/\/[^\/]+(?:\/|$)/),
		path = s,
		anchor = null;
	//console.warn( 'host: ' + host );
	if ( host ) {
		path = s.substr( host[0].length );
		host = host[0];
	} else {
		host = '';
	}
	var bits = path.split('#');
	if ( bits.length > 1 ) {
		anchor = bits[bits.length - 1];
		path = path.substr(0, path.length - anchor.length - 1);
	}
	host = host.replace( /%(?![0-9a-fA-F][0-9a-fA-F])|[#|]/g, function ( m ) {
		return encodeURIComponent( m );
	} );
	path = path.replace( /%(?![0-9a-fA-F][0-9a-fA-F])|[\[\]#|]/g, function ( m ) {
		return encodeURIComponent( m );
	} );
	s = host + path;
	if ( anchor !== null ) {
		s += '#' + anchor;
	}
	return s;
};

/**
 * Simple debug helper
 */
MWParserEnvironment.prototype.dp = function ( ) {
	if ( this.debug ) {
		if ( arguments.length > 1 ) {
			console.warn( JSON.stringify( arguments, null, 2 ) );
		} else {
			console.warn( arguments[0] );
		}
	}
};

/**
 * Simple debug helper, trace-only
 */
MWParserEnvironment.prototype.tp = function ( ) {
	if ( this.debug || this.trace ) {
		if ( arguments.length > 1 ) {
			console.warn( JSON.stringify( arguments, null, 2 ) );
		} else {
			console.warn( arguments[0] );
		}
	}
};


if (typeof module == "object") {
	module.exports.MWParserEnvironment = MWParserEnvironment;
}
