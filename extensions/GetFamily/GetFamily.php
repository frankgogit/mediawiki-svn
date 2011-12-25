<?php
/**
 * Special:GetFamily extension
 * Generates family file for pywikipediabot
 * Wikia @2007
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Łukasz "Egon" Matysiak  <egon@wikia.com>
 * @link http://www.mediawiki.org/wiki/Extension:GetFamily Documentation
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "[ <b> Error </b> ] This is not a valid entry point.\n";
	exit( 1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'GetFamily',
	'version' => '1.0.1',
	'author' => 'Łukasz Matysiak',
	'descriptionmsg' => 'getfamily-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:GetFamily'
);

// Set up the new special page
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['GetFamily'] = $dir . 'GetFamily.i18n.php';
// FIXME: Add $wgExtensionMessagesFiles for special page aliases.
$wgSpecialPages['GetFamily'] = 'SpecialGetFamily';

// New user right
$wgAvailableRights[] = 'getfamily';
$wgGroupPermissions['*']['getfamily'] = true;

// FIXME: split off into GetFamily_body.php
class SpecialGetFamily extends SpecialPage {
	public function __construct(){
		parent::__construct( 'GetFamily' );
	}

	function execute() {
		global $wgRequest, $wgUser, $wgOut;
		global $wgScript, $wgDBname, $wgLanguageCode, $wgSitename, $wgServer, $wgArticlePath, $wgVersion;

		if( !$wgUser->isAllowed( 'getfamily' ) ){
			$wgOut->permissionRequired( 'getfamily' );
		}

		$out = '';

		if ( $wgRequest->getVal( 'action' ) == 'GetLocal' ) {
			$dbr = wfGetDB( DB_SLAVE );
			$fromLang = $wgRequest->getVal( 'fromLang' );
			$result = $dbr->select( 'interwiki', array( 'iw_url' ), array( 'iw_prefix' => $fromLang ), __METHOD__ );
			if ( $object = $dbr->fetchObject( $result ) ) {
				$fromLang = $object->iw_url;
			} else {
				$fromLang = '';
			}

			header( 'Content-Type: text/xml' );
			$out .= "<family>\n";

			$out .= Xml::element( 'urlcheck', array(), $fromLang ) . "\n";
			$out .= Xml::element( 'language', array(), $wgLanguageCode ) . "\n";
			$out .= Xml::element( 'hostname', array(), str_replace( 'http://', '', $wgServer ) ) . "\n";
			$out .= Xml::element( 'path', array(), $wgScript ) . "\n";

			// $keys = array_keys ($wgCanonicalNamespaceNames);
			$language = Language::factory( $wgLanguageCode );
			$array = $language->getNamespaces();
			$keys = array_keys( $array );

			foreach ( $keys as $key ) {
				$out .= Xml::openElement( 'namespace', array() ) . "\n";
				$out .= Xml::element( 'key', array(), $key ) . "\n";
				// $out .= Xml::element('name', array(), $wgCanonicalNamespaceNames[$key]) . "\n";
				$out .= Xml::element( 'name', array(), $array[$key] ) . "\n";
				$out .= Xml::closeElement( 'namespace' );
			}
			$out .= "</family>\n";
		} else {
			header( 'Content-Type: text/plain' );

			$langNames = Language::getLanguageNames();
			$langcodes = array_keys( $langNames );

			$dbr = wfGetDB( DB_SLAVE );
			foreach ( $langcodes as $lang_code ) {
				$where .= ', ' . $dbr->addQuotes( $lang_code );
			}
			$where = substr( $where, 1 );
			$result = $dbr->select( 'interwiki', array( 'iw_prefix', 'iw_url' ),
				array( "iw_prefix IN ( $where )" ), __METHOD__ );

			$datalinks = array();

			while ( $dbObject = $dbr->fetchObject( $result ) ) {
				$datalinks[$dbObject->iw_prefix] = $dbObject->iw_url;
			}

			$datalinks[$wgLanguageCode] = $wgServer . $wgArticlePath;

			unset( $datalinks['bug'] );

			$metadata = array();
			$metadata['langs'] = array();
			$metadata['path'] = array();
			$namespacedata = array();

			foreach ( $datalinks as $lang => $link ) {
				$link = str_replace( '$1', 'Special:GetFamily?action=GetLocal&fromLang=' . $wgLanguageCode, $link );
				if ( !class_exists( 'WikiCurl' ) ) {
					global $IP;
					require_once( "$IP/extensions/WikiCurl/WikiCurl.php" );
				}
				$handler = new WikiCurl();
				$content = $handler->get( $link );
				if ( strpos( $content, '<family>' ) === false ) {
					unset( $handler );
					continue;
				}
				$content = substr( $content, strpos( $content, "\r\n\r\n" ) + 4 );
				unset( $handler );

				try {
					$xml = new SimpleXMLElement( $content );
				} catch ( Exception $e ) {
					continue;
				}

				// $urlcheck = (string)$xml->urlcheck;
				// if ( strcmp( $urlcheck, $wgServer.$wgArticlePath ) != 0 ){
				//	continue;
				// }
				$metadata['langs'][$lang] = (string)$xml->hostname;
				$metadata['path'][$lang] = (string)$xml->path;

				foreach ( $xml->namespace as $namespace ) {
					$namespacedata[(int)$namespace->key][$lang] = (string)$namespace->name;
				}
			}

			if ( $namespacedata != array() ) {
				$out .= "# -*- coding: utf-8  -*-

	'''
	The $wgSitename family.

	This is config file for pywikipediabot framework.
	It was generated by Special:GetFamily (a Wikia extension).

	Save this file to families/{$wgDBname}_family.py in your pywikibot installation
	The pywikipediabot itself is available for free download from svn.wikimedia.org
	'''

	import family

	class Family(family.Family):

		def __init__(self):
			family.Family.__init__(self)
			self.name = '$wgDBname' # Set the family name; this should be the same as in the filename.

			self.langs = {\n";

			$keys = array_keys( $metadata['langs'] );

			foreach ( $keys as $key ) {
				$out .= "            '$key': '{$metadata['langs'][$key]}', \n";
			}

			$out .= "        }\n        \n";

			$namespace_keys = array_keys( $namespacedata );

			foreach ( $namespace_keys as $key ) {
				$langs = array_keys( $namespacedata[$key] );
				$out .= "        self.namespaces[$key] = {\n";

				foreach ( $langs as $lang ) {
					$out .= "            '$lang': u'{$namespacedata[$key][$lang]}',\n";
				}
				$out .=  "        }\n        \n";
			}

			$out .= "
		def hostname(self, code):
			return self.langs[code]

		def path(self, code):
			path = ''\n";

			$keys = array_keys( $metadata['langs'] );

			foreach ( $keys as $key ) {
				$out .=  "        if code == '$key':\n            path = '{$metadata['path'][$key]}'\n";
			}

			$out .= "        return path

		def login_address(self, code):
			return '%s?title=%s:Userlogin&action=submitlogin' % (self.path(code), self.special_namespace_url(code))

		def version(self, code):
			return '" . $wgVersion . "' # The MediaWiki version used. Not very important in most cases.
	";
			} else {
				$out .= wfMsg( 'getfamily-interwikierror' );
			}
		}
		die( $out );
	}
}
