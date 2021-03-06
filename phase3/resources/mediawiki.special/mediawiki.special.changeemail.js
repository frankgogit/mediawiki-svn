/*
 * JavaScript for Special:ChangeEmail
 */
( function( $, mw ) {

/**
 * Given an email validity status (true, false, null) update the label CSS class
 */
var updateMailValidityLabel = function( mail ) {
	var	isValid = mw.util.validateEmail( mail ),
		$label = $( '#mw-emailaddress-validity' );

	// We allow empty address
	if( isValid === null ) {
		$label.text( '' ).removeClass( 'valid invalid' );

	// Valid
	} else if ( isValid ) {
		$label.text( mw.msg( 'email-address-validity-valid' ) ).addClass( 'valid' ).removeClass( 'invalid' );

	// Not valid
	} else {
		$label.text( mw.msg( 'email-address-validity-invalid' ) ).addClass( 'invalid' ).removeClass( 'valid' );
	}
};

$( document ).ready( function() {
	// Lame tip to let user know if its email is valid. See bug 22449
	// Only bind once for 'blur' so that the user can fill it in without errors
	// After that look at every keypress for direct feedback if it was invalid onblur
	$( '#wpNewEmail' ).one( 'blur', function() {
		if ( $( '#mw-emailaddress-validity' ).length === 0 ) {
			$(this).after( '<label for="wpNewEmail" id="mw-emailaddress-validity"></label>' );
		}
		updateMailValidityLabel( $(this).val() );
		$(this).keyup( function() {
			updateMailValidityLabel( $(this).val() );
		} );
	} );
} );

} )( jQuery, mediaWiki );
