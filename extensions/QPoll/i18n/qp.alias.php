<?php
/**
 * Aliases for special pages
 *
 * @file
 * @ingroup Extensions
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'PollResults' => array( 'PollResults' ),
);

/** Russian (Русский) */
$specialPageAliases['ru'] = array(
	'PollResults' => array( 'Результаты_опросов' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;
