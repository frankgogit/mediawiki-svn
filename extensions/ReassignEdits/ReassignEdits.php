<?php
/**
* ReassignEdits
*
* @package MediaWiki
* @subpackage Extensions
*
* @author: Tim 'SVG' Weyer <SVG@Wikiunity.com>
*
* @copyright Copyright (C) 2011 Tim Weyer, Wikiunity
* @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
*
*/

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'ReassignEdits',
	'author'         => array( 'Tim Weyer' ),
	'url'            => 'https://www.mediawiki.org/wiki/Extension:ReassignEdits',
	'descriptionmsg' => 'reassignedits-desc',
	'version'        => '0.1.0',
);

// Add permission required to use Special:ReassignEdits
$wgAvailableRights[] = 'reassignedits';

// Allow bureaucrats by default to access Special:ReassignEdits
// needed if extension has been added by extensions selection at installation menu or by a management system
$wgGroupPermissions['bureaucrat']['reassignedits'] = true;

// Internationalization files
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['ReassignEdits'] = $dir . 'ReassignEdits.i18n.php';
$wgExtensionMessagesFiles['ReassignEditsAliases'] = $dir . 'ReassignEdits.alias.php';

// Special page classes
$wgAutoloadClasses['SpecialReassignEdits'] = $dir . 'ReassignEdits_body.php';
$wgSpecialPages['ReassignEdits'] = 'SpecialReassignEdits';
$wgSpecialPageGroups['ReassignEdits'] = 'users';

