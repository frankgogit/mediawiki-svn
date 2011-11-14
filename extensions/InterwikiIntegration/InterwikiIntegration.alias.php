<?php
/**
 * Aliases for the InterwikiIntegration extension
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English
 * @author Tisane
 */
$specialPageAliases['en'] = array(
 	'PopulateInterwikiIntegrationTable' => array( 'PopulateInterwikiIntegrationTable' ),
);

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'PopulateInterwikiIntegrationTable'   => array( 'ملء_جدول_الإنترويكي' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;