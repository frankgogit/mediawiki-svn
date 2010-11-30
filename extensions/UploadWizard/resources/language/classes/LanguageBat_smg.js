/** Samogitian (Žemaitėška)
 *
 * @ingroup Language
 *
 * @author Niklas Laxström
 * ported to js by mdale
 */
mw.Language.convertPlural = function( count, forms ) {
	
	forms = mw.Language.preConvertPlural( forms, 4 );

	count = Math.abs( count );
	if ( count === 0 || (count % 100 === 0 || (count % 100 >= 10 && count % 100 < 20)) ) {
		return forms[2];
	} else if ( count % 10 === 1 ) {
		return forms[0];
	} else if ( count % 10 === 2 ) {
		return forms[1];
	} else {
		return forms[3];
	}
}