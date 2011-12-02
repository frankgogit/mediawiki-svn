/*
 * Script for Article Feedback Extension
 */
( function( $ ) {

/* Load at the bottom of the article */
var $aftDiv = $( '<div id="mw-articlefeedbackv5"></div>' ).articleFeedbackv5();

// Put on bottom of article before #catlinks (if it exists)
// Except in legacy skins, which have #catlinks above the article but inside content-div.
var legacyskins = [ 'standard', 'cologneblue', 'nostalgia' ];
if ( $( '#catlinks' ).length && $.inArray( mw.config.get( 'skin' ), legacyskins ) < 0 ) {
	$aftDiv.insertBefore( '#catlinks' );
} else {
	// CologneBlue, Nostalgia, ...
	mw.util.$content.append( $aftDiv );
}

/* Setup for feedback links */

// Only track users who have been assigned to the tracking group
var useClickTracking = 'track' === mw.user.bucket(
	'ext.articleFeedbackv5-tracking', mw.config.get( 'wgArticleFeedbackv5Tracking' )
);

// Info about each of the links
var linkInfo = {
	'1': {
		clickTracking: $aftDiv.articleFeedbackv5( 'prefix', 'section-link' )
	},
	'2': {
		clickTracking: $aftDiv.articleFeedbackv5( 'prefix', 'titlebar-link' )
	},
	'4': {
		clickTracking: $aftDiv.articleFeedbackv5( 'prefix', 'toolbox-link' )
	}
};

// Click event
var clickFeedbackLink = function ( $link ) {
	// Click tracking
	if ( useClickTracking && $.isFunction( $.trackActionWithInfo ) ) {
		$.trackActionWithInfo( linkInfo[ $link.data( 'linkId' ) ].clickTracking, mw.config.get( 'wgTitle' ) );
	}
	// Open as modal
	$aftDiv.articleFeedbackv5( 'openAsModal', $link );
};

// Bucketing
var linkBucket = function () {
	// Find out which link bucket they go in:
	// 1. Display buckets 0 or 5?  Always zero.
	// 2. Requested in query string (debug only)
	// 3. Random bucketing
	var displayBucket = $aftDiv.articleFeedbackv5( 'getBucketId' );
	if ( '5' == displayBucket || '0' == displayBucket ) {
		console.log( '5 or 0');
		return '0';
	}
	var knownBuckets = { '0': true, '1': true, '2': true };
	var requested = mw.util.getParamValue( 'aft_link' );
	if ( $aftDiv.articleFeedbackv5( 'inDebug' ) && requested in knownBuckets ) {
		console.log( 'requested ' + requested );
		return requested;
	} else {
		console.log( 'bucketing' );
		console.log( mw.config.get( 'wgArticleFeedbackv5LinkBuckets' ) );
		console.log( mw.config.get( 'wgArticleFeedbackv5DisplayBuckets' ) );
		var bucketName = mw.user.bucket( 'ext.articleFeedbackv5-links',
			mw.config.get( 'wgArticleFeedbackv5LinkBuckets' )
		);
		var nameMap = { '-': 0, 'A': 1, 'B': 2 };
		return nameMap[bucketName];

	}
}();
if ( $aftDiv.articleFeedbackv5( 'inDebug' ) ) {
	console.log( 'Using link option #' + linkBucket );
}

/* Add section links */
if ( '1' == linkBucket ) {
	$( 'span.editsection' ).append(
		'&nbsp;[' +
		'<a href="#mw-articlefeedbackv5" class="articleFeedbackv5-sectionlink">' +
			mw.msg( 'articlefeedbackv5-section-linktext' ) + '</a>' +
		']'
	);
	$( 'span.editsection a.articleFeedbackv5-sectionlink' )
		.data( 'linkId', 1 )
		.click( function ( e ) {
			e.preventDefault();
			clickFeedbackLink( $( e.target ) );
		} );
}

/* Add titlebar link */
if ( '2' == linkBucket ) {
	$( '<a href="#mw-articleFeedbackv5" id="articleFeedbackv5-titlebarlink" />' )
		.data( 'linkId', 2 )
		.text( mw.msg( 'articlefeedbackv5-titlebar-linktext' ) )
		.click( function ( e ) {
			e.preventDefault();
			clickFeedbackLink( $( e.target ) );
		} )
		.insertBefore( $aftDiv );
}

/* Add toolbox link */
if ( '5' == $aftDiv.articleFeedbackv5( 'getBucketId' ) ) {
	var $aftLink4 = $( '<li id="t-articlefeedbackv5"><a href="#mw-articlefeedbackv5"></a></li>' )
		.find( 'a' )
			.text( mw.msg( 'articlefeedbackv5-toolbox-linktext' ) )
			.click( function ( e ) {
				// Just set the link ID -- this should act just like AFTv4
				$aftDiv.articleFeedbackv5( 'setLinkId', 4 );
			} )
		.end();
	$( '#p-tb' ).find( 'ul' ).append( $aftLink4 );
}

} )( jQuery );
