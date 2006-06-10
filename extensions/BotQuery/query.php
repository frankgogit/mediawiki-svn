<?php
/**
* Bot Query extension for MediaWiki 1.7+
*
* Copyright (C) 2006 Yuri Astrakhan <FirstnameLastname@gmail.com>
* Uses bits from the original query.php code written by Tim Starling.
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along
* with this program; if not, write to the Free Software Foundation, Inc.,
* 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
* http://www.gnu.org/copyleft/gpl.html
*/


define( 'MEDIAWIKI', true );
unset( $IP );
if ( isset( $_REQUEST['GLOBALS'] ) ) {
	echo '<a href="http://www.hardened-php.net/index.76.html">$GLOBALS overwrite vulnerability</a>';
	die( -1 );
}

define( 'MW_NO_OUTPUT_BUFFER', true );
$wgNoOutputBuffer = true;

$IP = dirname( realpath( __FILE__ ) ) . '/../..';
chdir( $IP );
require_once( "$IP/includes/Defines.php" );
require_once( "$IP/LocalSettings.php" );
require_once( "$IP/includes/Setup.php" );

define( 'GEN_FUNCTION', 0 );
define( 'GEN_MIME',     1 );
define( 'GEN_ISMETA',   1 );
define( 'GEN_PARAMS',   2 );
define( 'GEN_DEFAULTS', 3 );
define( 'GEN_DESC',     4 );

$db =& wfGetDB( DB_SLAVE );
$bqp = new BotQueryProcessor( $db );
$bqp->execute();
$bqp->output();
	


class BotQueryProcessor {
	var $classname = 'BotQueryProcessor';

	/**
	* Output generators - each format name points to an array of the following parameters:
	*     0) Function to call
	*     1) mime type 
	*     2) array of accepted parameters
	*     3) array of default parameter values
	*     4) Format description
	*/
	var $outputGenerators = array(
		'xml' => array( 'printXML', 'text/xml',
			array('xmlindent', 'nousage'), 
			array(null, null), 
			array(
			"XML format",
			"Optional indentation can be enabled by supplying 'xmlindent' parameter.",
			"Errors will return this usage screen, unless 'nousage' parameter is given.",
			"Internet Explorer is known to have many issues with text/xml output.",
			"Please use other browsers or switch to html format while debuging.",
			"Example: query.php?what=info&format=xml",
			)),
		'html'=> array( 'printHTML', 'text/html',
			array('nousage'),
			array(null),
			array(
			"HTML format",
			"The data is presented as an indented syntax-highlighted XML format.",
			"Errors will return this usage screen, unless 'nousage' parameter is given.",
			"Example: query.php?what=info&format=html",
			)),
		'txt' => array( 'printHumanReadable', 'application/x-wiki-botquery-print_r', null, null, array(
			"Human-readable format using print_r()",
			"Details: http://www.php.net/print_r",
			"Example: query.php?what=info&format=txt",
			)),
		'json'=> array( 'printJSON', 'application/json', null, null, array(
			"JSON format",
			"Details: http://en.wikipedia.org/wiki/JSON",
			"Example: query.php?what=info&format=json",
			)),
		'php' => array( 'printPHP', 'application/vnd.php.serialized', null, null, array(
			"PHP serialized format using serialize()",
			"Details: http://www.php.net/serialize",
			"Example: query.php?what=info&format=php",
			)),
		'wddx' => array( 'printWDDX', 'text/xml', null, null, array(
			"WDDX - Web Distributed Data eXchange format",
			"Details: http://www.openwddx.org",
			"Example: query.php?what=info&format=wddx",
			)),
		'dbg' => array( 'printDebugCode', 'application/x-wiki-botquery-var_export', null, null, array(
			"PHP source code format using var_export()",
			"Details: http://www.php.net/var_export",
			"Example: query.php?what=info&format=dbg",
			)),
	);

	/**
	* Properties generators - each property points to an array of the following parameters:
	*     0) Function to call
	*     1) true/false - does this property work on individual pages?  (false for site's metadata)
	*     2) array of accepted parameters
	*     3) array of default parameter values. If the default value is an array itself, only the listed values are allowed, and the 1st value is taken as default.
	*     4) Format description
	*/
	var $propGenerators = array(

		// Site-wide Generators
		'info'           => array( 'genMetaSiteInfo', true, null, null, array(
			"General site information",
			"Example: query.php?what=info",
			)),
		'namespaces'     => array( 'genMetaNamespaceInfo', true, null, null, array(
			"List of localized namespace names",
			"Example: query.php?what=namespaces",
			)),
		'userinfo'       => array( 'genMetaUserInfo', true, 
			array( 'uiisblocked', 'uihasmsg', 'uiextended' ),
			array( false, false, false ),
			array(
			"Information about current user.",
			"The information will always include 'name' element, and optionally 'anonymous' or 'bot' flags.",
			"Parameters supported:",
			"uiisblocked- If present, and current user or ip is blocked, a 'blocked' flag will be added.",
			"uihasmsg   - If present, and current user or ip has messages waiting, a 'messages' flag will be added.",
			"uiextended - If present, includes additional information such as rights and groups.",
			"Example: query.php?what=userinfo&uiisblocked&uihasmsg&uiextended",
			)),
		'recentchanges'  => array( 'genMetaRecentChanges', true,
			array( 'rcfrom', 'rclimit', 'rchide' ),
			array( null, 50, array(null, 'minor', 'bots', 'anons', 'liu') ),
			array(
			"Adds recently changed articles to the output list.",
			"Parameters supported:",
			"rcfrom     - Timestamp of the first entry to start from. The list order reverses.",
			"rclimit    - how many total links to return.",
			"             Smaller size is possible if pages changes multiple times.",
			"rchide     - Which entries to ignore 'minor', 'bots', 'anons', 'liu' (loged-in users).",
			"             Cannot specify both anons and liu.",
			"Example: query.php?what=recentchanges&rchide=liu|bots",
			)),
		'allpages'       => array( 'genMetaAllPages', true,
			array( 'aplimit', 'apfrom', 'apnamespace' ),
			array( 50, '!', 0 ),
			array(
			"Enumerates all available pages to the output list.",
			"Parameters supported:",
			"aplimit      - how many total pages to return",
			"apfrom       - the page title to start enumerating from. Default is '!'",
			"apnamespaces - limits which namespace to enumerate. Default 0 (Main)",
			"Example: query.php?what=allpages&aplimit=50",
			)),
		'nolanglinks'    => array( 'genMetaNoLangLinksPages', true,
			array( 'nllimit', 'nlfrom', 'nlnamespace' ),
			array( 50, '!', 0 ),
			array(
			"Enumerates pages without language links to the output list.",
			"Parameters supported:",
			"nllimit      - how many total pages to return",
			"nlfrom       - the page title to start enumerating from. Default is '!'",
			"nlnamespaces - limits which namespace to enumerate. Default 0 (Main)",
			"Example: query.php?what=nolanglinks&nllimit=50",
			)),
		'category'       => array( 'genPagesInCategory', true,
			array( 'cptitle', 'cplimit', 'cpfrom' ),
			array( null, 200, '' ),
			array(
			"Adds pages in a given category to the output list.",
			"Parameters supported:",
			"cptitle    - A category name, either with or without the 'Category:' prefix.",
			"cplimit    - How many total pages (in category) to return.",
			"cpfrom     - The category sort key to continue paging. Starts at the begining by default.",
			"Example: query.php?what=category&cptitle=Days",
			)),
		'users'          => array( 'genUserPages', true,
			array( 'usfrom', 'uslimit' ),
			array( null, 50 ),
			array(
			"Adds user pages to the output list.",
			"Parameters supported:",
			"usfrom     - Start user listing from...",
			"uslimit    - how many total links to return.",
			"Example: query.php?what=users&usfrom=Y",
			)),

		//
		// Page-specific Generators
		//
		'redirects'      => array( 'genRedirectInfo', false, null, null, array(
			"For all given redirects, provides additional information such as pageIds and double-redirection",
			"Example: query.php?what=redirects&titles=Main_page",
			"         query.php?what=recentchanges|redirects  (Which of the recent changes are redirects?)",
			)),
		'permissions'    => array( 'genPermissionsInfo', false,
			array( 'prcanmove' ),
			array( false ),
			array(
			"For all found pages, check if the user can edit them.",
			"Parameters supported:",
			"prcanmove  - If specified, also check if the page can be moved.",
			"Example: query.php?what=permissions&titles=Main_page|User%20Talk:Yurik",
			)),
		'links'          => array( 'genPageLinksHelper', false, null, null, array(
			"List of regular page links",
			"Example: query.php?what=links&titles=MediaWiki|Wikipedia",
			)),
		'langlinks'      => array( 'genPageLinksHelper', false, null, null, array(
			"Inter-language links",
			"Example: query.php?what=langlinks&titles=MediaWiki|Wikipedia",
			)),
		'templates'      => array( 'genPageLinksHelper', false, null, null, array(
			"List of used templates",
			"Example: query.php?what=templates&titles=Main_Page",
			)),
		'backlinks'      => array( 'genPageBackLinksHelper', false,
			array( 'blfilter', 'bllimit', 'blcontfrom' ),
			array( array('existing', 'nonredirects', 'all'), 50, null ),
			array(
			"What pages link to this page(s)",
			"Parameters supported:",
			"blfilter   - Of all given pages, which should be queried:",
			"  'nonredirects', 'existing' (blue links, default), or 'all' (red links)",
			"bllimit    - how many total links to return",
			"blcontfrom - from which point to continue. Use the 'next' value from the previous queries.",
			"Example: query.php?what=backlinks&titles=Main%20Page&bllimit=10",
			)),
		'embeddedin'     => array( 'genPageBackLinksHelper', false, 
			array( 'eifilter', 'eilimit', 'eicontfrom' ), 
			array( array('existing', 'nonredirects', 'all'), 50, null ),
			array(
			"What pages include this page(s) as template(s)",
			"Parameters supported:",
			"eifilter   - Of all given pages, which should be queried:",
			"  'nonredirects', 'existing' (blue links, default), or 'all' (red links)",
			"eilimit    - how many total links to return",
			"eicontfrom - from which point to continue. Use the 'next' value from the previous queries.",
			"Example: query.php?what=embeddedin&titles=Template:Stub&eilimit=10",
			)),
		'imagelinks'     => array( 'genPageBackLinksHelper', false, 
			array( 'ilfilter', 'illimit', 'ilcontfrom' ),
			array( array('all', 'existing', 'nonredirects'), 50, null ),
			array(
			"What pages use this image(s)",
			"ilfilter   - Of all given images, which should be queried:",
			"  'nonredirects', 'existing', or 'all' (default, includes non-existant or those stored on Wikimedia Commons)",
			"illimit    - how many total links to return",
			"ilcontfrom - from which point to continue. Use the 'next' value from the previous queries.",
			"Example: query.php?what=imagelinks&titles=Image:HermitageAcrossNeva.jpg&illimit=10",
			)),
		'revisions'      => array( 'genPageRevisions', false,
			array( 'rvuniqusr', 'rvcomments', 'rvcontent', 'rvlimit', 'rvoffset', 'rvstart', 'rvend' ),
			array( false, false, false, 10, 0, null, null ),
			array(
			"Revision history - Lists edits performed to the given pages",
			"Parameters supported:",
			"rvuniqusr  - if specified, the result will include only the last revision by each unique user.",
			"rvcomments - if specified, the result will include summary strings",
			"rvcontent  - if specified, the result will include raw wiki text.",
			"             This parameter is *very slow*, use only when needed.",
			"rvlimit    - how many links to return *for each title*",
			"rvoffset   - when too many results are found, use this to page",
			"rvstart    - timestamp of the earliest entry",
			"rvend      - timestamp of the latest entry",
			"Example: query.php?what=revisions&titles=Main%20Page&rvlimit=10&rvcomments",
			"         query.php?what=revisions&titles=Main%20Page&rvuniqusr&rvlimit=3&rvcomments",
			)),
		'usercontribs'   => array( 'genUserContributions', false,
			array( 'uccomments', 'uclimit' ),
			array( false, 50 ),
			array(
			"Revision history - Lists last edits performed by the given user(s)",
			"Parameters supported:",
			"uccomments - if specified, the result will include summary strings",
			"uclimit    - how many links to return *for each user*",
			"Example: query.php?what=usercontribs&titles=User:YurikBot&uclimit=20&uccomments",
			)),
		'content'        => array( 'genPageContent', false, null, null,
			array(
			"Raw page content - Retrieves raw wiki markup for each page.",
			"This query is *very slow*! Please optimize content requests to reduce load on the servers.",
			"Duplicate results may be obtained through revisions+rvcontent request",
			"Example: query.php?what=content&titles=Main%20Page",
			)),
	);

	/**
	* Object Constructor, uses a database connection as a parameter
	*/
	function BotQueryProcessor( $db ) {
		global $wgRequest, $wgUser;

		$this->totalStartTime = wfTime();

		$this->data = array();
		
		$this->pageIdByText = array();	// reverse page ID lookup
		$this->requestsize = 0;
		$this->db = $db;

		$this->isBot = $wgUser->isBot();

		$this->enableProfiling = !$wgRequest->getCheck('noprofile');
		
		$this->format = 'html'; // set it here because if parseFormat fails, the usage output relies on this setting
		$this->format = $this->parseFormat( $wgRequest->getVal('format', 'html') );

		$allProperties = array_merge(array(null), array_keys( $this->propGenerators ));
		$this->properties = $this->parseMultiValue( 'what', $allProperties );

		// Neither one of these variables is referenced directly!
		// Meta generators may append titles or pageids to these varibales.
		// Do not modify this values directly - use the AddRaw() method
		$this->titles = null;
		$this->pageids = null;
		$this->normalizedTitles = array();

		// These fields contain ids useful for other generators (redirectPageIds + nonRedirPageIds == existingPageIds)
		$this->existingPageIds = array();	// all existsing pages
		$this->redirectPageIds = array();	// all redirect pages
		$this->nonRedirPageIds = array();	// all regular, non-redirect pages
	}

	/**
	* The core function - executes meta generators, populates basic page info, and then fills in the required additional data for all pages
	*/
	function execute() {
		// Process metadata generators
		$this->callGenerators( true );
		// Process 'titles' and 'pageids' parameters, and any other pages assembled by meta generators
		$this->genPageInfo();
		// Process page-related generators
		$this->callGenerators( false );
		
		// Report empty query - if pages and meta elements have no subelements
		if( ( !array_key_exists('pages', $this->data) || empty($this->data['pages']) ) &&
			( !array_key_exists('meta', $this->data) || empty($this->data['meta']) )) {
			$this->dieUsage( 'Nothing to do', 'emptyresult' );
		}
		// All items under 'pages' will be presented as 'page' xml elements
		if( array_key_exists('pages', $this->data) && !empty($this->data['pages']) ) {
			$this->data['pages']['_element'] = 'page';
		}
	}

	/**
	* Helper method to call generators (either meta or non-meta)
	*/
	function callGenerators( $callMetaGenerators ) {
		foreach( $this->propGenerators as $property => &$generator ) {
			if( $generator[GEN_ISMETA] === $callMetaGenerators && in_array( $property, $this->properties )) {
				$this->{$generator[GEN_FUNCTION]}($property, $generator);
			}
		}
	}

	/**
	* Output the result to the user
	*/
	function output($isError = false) {
		global $wgRequest, $wgUser;

		$this->recordProfiling( 'total', 'time', $this->totalStartTime );
		
		$printer = $this->outputGenerators[$this->format][GEN_FUNCTION];
		$mime = $this->outputGenerators[$this->format][GEN_MIME];
		header( "Content-Type: $mime; charset=utf-8;" );
		if( !$isError ) {
			$printer( $this->data );
		} else {
			$printer( $this->data['query'] );
		}
		
		//
		// Log request - userid (non-identifiable), status, what is asked, request size, additional parameters
		//
		$userIdentity = md5( $wgUser->getName() ) . "\t" . ($wgUser->isAnon() ? "anon" : ($this->isBot ? "bot" : "usr"));
		$what = $wgRequest->getVal('what');
		$format = $wgRequest->getVal('format');
		$params = mergeParameters( $this->propGenerators );
		$params = array_merge( $params, mergeParameters( $this->outputGenerators ));
		$params = array_unique($params);
		$paramVals = array();
		foreach( $params as $param ) {
			$val = $wgRequest->getVal($param);
			if( $val !== null ) {
				$paramVals[] = "$param=$val";
			}
		}
		$paramStr = implode( '&', $paramVals );
		$perfVals = array();
		if( array_key_exists('query', $this->data) ) {
			foreach( $this->data['query'] as $module => $values ) {
				if( is_array( $values ) && array_key_exists('time', $values) ) {
					$perfVals[] = "$module={$values['time']}";
				}
			}
		}
		$perfStr = implode( '&', $perfVals );
		$msg = "$userIdentity\t$format\t$what\t{$this->requestsize}\t$paramStr\t$perfStr";
		wfDebugLog( 'query', $msg );
	}


	//
	// ************************************* INPUT PARSERS *************************************
	//
	function parseFormat( $format ) {
		if( array_key_exists($format, $this->outputGenerators) ) {
			return $format;
		} else {
			$this->dieUsage( "Unrecognised format '$format'", 'badformat' );
		}
	}
	
	/**
	* Return an array of values that were given in a "a|b|c" notation, after it validates them against the list allowed values.
	*/
	function parseMultiValue( $valueName, $allowedValues ) {
		global $wgRequest;

		$values = $wgRequest->getVal($valueName, $allowedValues[0]);		
		$valuesList = explode( '|', $values );
		$unknownValues = array_diff( $valuesList, $allowedValues);
		if( $unknownValues ) {
			$this->dieUsage("Unrecognised value" . (count($unknownValues)>1?"s '":" '") . implode("', '", $unknownValues) . "' for parameter '$valueName'",
							"unknown_$valueName" );
		}

		return $valuesList;
	}

	
	//
	// ************************************* GENERATORS *************************************
	//

	
	/**
	* Creates lists of pages to work on. User parameters 'titles' and 'pageids' will be added to the list, and information from page table will be provided.
	* As the result of this method, $this->redirectPageIds and existingPageIds (arrays) will be available for other generators.
	*/
	function genPageInfo() {
		$this->startProfiling();
		$where = array();
				
		// Assemble a list of titles to process. This method will modify $where and $this->requestsize
		$nonexistentPages = &$this->parseTitles( $where );

		// Assemble a list of pageids to process. This method will modify $where and $this->requestsize
		$pageids = &$this->parsePageIds( $where );

		// Have anything to do?
		if( $this->requestsize > 0 ) {
			// Validate limits
			$this->validateLimit( 'pi_botquerytoobig', $this->requestsize, 500, 20000 );
			
			// Query page information with the given lists of titles & pageIDs
			$this->startDbProfiling();
			$res = $this->db->select( 
				'page',
				array( 'page_id', 'page_namespace', 'page_title', 'page_is_redirect', 'page_touched', 'page_latest' ),
				$this->db->makeList( $where, LIST_OR ),
				$this->classname . '::genPageInfo' );
			$this->endDbProfiling('pageInfo');
			
			while( $row = $this->db->fetchObject( $res ) ) {
				$this->storePageInfo( $row );
				if( $nonexistentPages !== null ) {
					unset( $nonexistentPages[$row->page_namespace][$row->page_title] );	// Strike out link
				}
			}
			$this->db->freeResult( $res );

			// Create records for non-existent page IDs
			if( $pageids !== null ) {
				foreach( array_diff_key($pageids, $this->existingPageIds) as $pageid ) {
					$data = &$this->data['pages'][$pageid];
					$data['id'] = 0;
					$data['badId'] = $pageid;
				}
			}
			
			// Add entries for non-existent page titles
			$i = -1;
			if( $nonexistentPages !== null ) {
				foreach( $nonexistentPages as $namespace => &$stuff ) {
					foreach( $stuff as $dbk => &$arbitrary ) {
						$title = Title::makeTitle( $namespace, $dbk );
						// Must do this check even for non-existent pages, as some generators can give related information
						if ( !$title->userCanRead() ) {
							$this->dieUsage( "No read permission for $titleString", 'pi_nopageaccessdenied' );
						}
						$data = &$this->data['pages'][$i];
						$this->pageIdByText[$title->getPrefixedText()] = $i;
						$data['_obj']    = $title;
						$data['title']   = $title->getPrefixedText();
						$data['ns']      = $title->getNamespace();
						$data['id']      = 0;
						$i--;
					}
				}
			}

			// When normalized title differs from what was given, append the given title(s)
			foreach( $this->normalizedTitles as $givenTitle => &$title ) {
				$data = &$this->data['pages'][$i--];
				$data['title'] = $givenTitle;
				$data['normalizedTitle'] = $title->getPrefixedText();
			}
		}
		$this->endProfiling('pageInfo');
	}

	
	//
	// ************************************* META GENERATORS *************************************
	//
	
	
	/**
	* Get general site information
	*/
	function genMetaSiteInfo(&$prop, &$genInfo) {
		global $wgSitename, $wgVersion, $wgCapitalLinks;
		$this->startProfiling();
		$meta = array();
		$mainPage = Title::newFromText( wfMsgForContent( 'mainpage' ) );

		$meta['mainpage'] = $mainPage->getText();
		$meta['base']     = $mainPage->getFullUrl();
		$meta['sitename'] = $wgSitename;
		$meta['generator']= "MediaWiki $wgVersion";
		$meta['case']     = $wgCapitalLinks ? 'first-letter' : 'case-sensitive'; // "case-insensitive" option is reserved for future

		$this->data['meta']['site'] = $meta;
		$this->endProfiling( $prop );
	}

	/**
	* Get the list of localized namespaces
	*/
	function genMetaNamespaceInfo(&$prop, &$genInfo) {
		global $wgContLang;
		$this->startProfiling();
		$meta = array();
		$meta['_element'] = 'ns';
		foreach( $wgContLang->getFormattedNamespaces() as $ns => $title ) {
			$meta[$ns] = array( "id"=>$ns, "*" => $title );
		}
		$this->data['meta']['namespaces'] = $meta;
		$this->endProfiling( $prop );
	}

	/**
	* Get current user's status information
	*/
	function genMetaUserInfo(&$prop, &$genInfo) {
		global $wgUser;
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));		
		$meta = array();
		$meta['name'] = $wgUser->getName();
		if( $wgUser->isAnon() ) $meta['anonymous'] = '';
		if( $this->isBot ) $meta['bot'] = '';
		if( $uiisblocked && $wgUser->isBlocked() ) $meta['blocked'] = '';
		if( $uihasmsg && $wgUser->getNewtalk() ) $meta['messages'] = '';
		if( $uiextended ) {
			$meta['groups'] = $wgUser->getGroups();
			$meta['groups']['_element'] = 'g';
			$meta['rights'] = $wgUser->getRights();
			$meta['rights']['_element'] = 'r';
		}

		$this->data['meta']['user'] = $meta;
		$this->endProfiling( $prop );
	}

	/**
	* Add pagids of the most recently modified pages to the output
	*/
	function genMetaRecentChanges(&$prop, &$genInfo) {
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));		
		# It makes no sense to hide both anons and logged-in users
		if( in_array('anons', $rchide) && in_array('liu', $rchide) ) {
			$this->dieUsage( "Both 'anons' and 'liu' cannot be given for 'rchide' parameter", 'rc_badrchide' );
		}
		$this->validateLimit( 'rc_badrclimit', $rclimit, 500, 5000 );

		$conds = array();		
		if ( $rcfrom != '' ) {
			$conds[] = 'rc_timestamp >= ' . $this->prepareTimestamp($rcfrom);
		}

		foreach( $rchide as &$elem ) {
			switch( $elem ) {
				case '': // nothing
					break;
				case 'minor':
					$conds[] = 'rc_minor = 0';
					break;
				case 'bots':
					$conds[] = 'rc_bot = 0';
					break;
				case 'anons':
					$conds[] = 'rc_user != 0';
					break;
				case 'liu':
					$conds[] = 'rc_user = 0';
					break;
				default:
					die( "Internal error - Unknown hide param '$elem'" );
			}
		}	

		$options = array( 'USE INDEX' => 'rc_timestamp', 'LIMIT' => $rclimit );
		$options['ORDER BY'] = 'rc_timestamp' . ( $rcfrom != '' ? '' : ' DESC' );

		$this->startDbProfiling();
		$res = $this->db->select(
			'recentchanges',
			'rc_cur_id',
			$conds,
			$this->classname . '::genMetaRecentChanges',
			$options
			);
		$this->endDbProfiling( $prop );
		while ( $row = $this->db->fetchObject( $res ) ) {
			if( $row->rc_cur_id != 0 ) {
				$this->addRaw( 'pageids', $row->rc_cur_id );
			}
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}
	
	/**
	* Add user pages to the list of titles to output (the actual user pages might not exist)
	*/
	function genUserPages(&$prop, &$genInfo) {
		global $wgContLang;
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));

		$this->validateLimit( 'uslimit', $uslimit, 50, 1000 );

		$this->startDbProfiling();
		$res = $this->db->select(
			'user',
			'user_name',
			"user_name >= " . $this->db->addQuotes($usfrom),
			$this->classname . '::genUserPages',
			array( 'ORDER BY' => 'user_name', 'LIMIT' => $uslimit )
			);
		$this->endDbProfiling( $prop );
		
		$userNS = $wgContLang->getNsText(NS_USER);
		if( !$userNS ) $userNS = 'User';
		$userNS .= ':';
		
		while ( $row = $this->db->fetchObject( $res ) ) {
			$this->addRaw( 'titles', $userNS . $row->user_name );
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}

	/**
	* Add all pages by a given namespace to the output
	*/
	function genMetaAllPages(&$prop, &$genInfo) {
		//
		// TODO: This is very inefficient - we can get the actual page information, instead we make two identical query.
		//
		global $wgContLang;
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));
		$this->validateLimit( 'aplimit', $aplimit, 50, 1000 );

		$ns = $wgContLang->getNsText($apnamespace);
		if( $ns === false ) {
			$this->dieUsage( "Unknown namespace $ns", 'ap_badnamespace' );
		} else if( strlen($ns) > 0 ) {
			$ns .= ':';
		}

		$this->startDbProfiling();
		$res = $this->db->select(
			'page',
			array( 'page_id', 'page_namespace', 'page_title', 'page_is_redirect', 'page_touched', 'page_latest' ),
			array( 'page_namespace' => intval($apnamespace), 'page_title>=' . $this->db->addQuotes($apfrom) ),
			$this->classname . '::genMetaAllPages',
			array( 'USE INDEX' => 'name_title', 'LIMIT' => $aplimit+1, 'ORDER BY' => 'page_namespace, page_title' ));
		$this->endDbProfiling( $prop );

		// Add found page ids to the list of requested titles - they will be auto-populated later
		$count = 0;
		while ( $row = $this->db->fetchObject( $res ) ) {
			if( ++$count > $aplimit ) {
				// We've reached the one extra which shows that there are additional pages to be had. Stop here...
				$this->addStatusMessage( $prop, array('next' => $row->page_title) );
				break;
			}
			$this->storePageInfo( $row );
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}

	/**
	* Add pages by the namespace without language links to the output
	*/
	function genMetaNoLangLinksPages(&$prop, &$genInfo) {
		global $wgContLang;
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));
		$this->validateLimit( 'nllimit', $nllimit, 50, 1000 );
		extract( $this->db->tableNames( 'page', 'langlinks' ) );

		//
		// Find all pages without any rows in the langlinks table
		//
		$sql = 'SELECT'
			. ' page_id, page_namespace, page_title, page_is_redirect, page_touched, page_latest'
			. " FROM $page LEFT JOIN $langlinks ON page_id = ll_from"
			. ' WHERE'
			. ' ll_from IS NULL AND page_namespace=' . intval($nlnamespace) . ' AND page_title>=' . $this->db->addQuotes($nlfrom)
			. ' ORDER BY page_namespace, page_title'
			. ' LIMIT ' . intval($nllimit+1);

		$this->startDbProfiling();
		$res = $this->db->query( $sql, $this->classname . '::genMetaNoLangLinksPages' );
		$this->endDbProfiling( $prop );

		// Add found page ids to the list of requested titles - they will be auto-populated later
		$count = 0;
		while ( $row = $this->db->fetchObject( $res ) ) {
			if( ++$count > $nllimit ) {
				// We've reached the one extra which shows that there are additional pages to be had. Stop here...
				$this->addStatusMessage( $prop, array('next' => $row->page_title) );
				break;
			}
			$this->storePageInfo( $row );
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}
	
	/**
	* Add pages in a category
	*/
	function genPagesInCategory(&$prop, &$genInfo) {
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));

		// Validate parameters
		if( $cptitle === null ) {
			$this->dieUsage( "Missing category title parameter cptitle", 'cp_missingcptitle' );
		}	
		$categoryObj = &Title::newFromText( $cptitle );
		if(    !$categoryObj ||
			   ($categoryObj->getNamespace() !== NS_MAIN && $categoryObj->getNamespace() !== NS_CATEGORY) ||
			   $categoryObj->isExternal() ) {
			$this->dieUsage( "bad category name $cptitle", 'cp_invalidcategory' );
		}
		$conds = array( 'cl_to' => $categoryObj->getDBkey() );
		if ( $cpfrom != '' ) {
			$conds[] = 'cl_sortkey >= ' . $this->db->addQuotes($cpfrom);
		}
		$this->validateLimit( 'cplimit', $cplimit, 500, 5000 );
		
		$this->startDbProfiling();
		$res = $this->db->select(
			'categorylinks',
			array( 'cl_from', 'cl_sortkey' ),
			$conds,
			$this->classname . '::genPagesInCategory',
			array( 'ORDER BY' => 'cl_sortkey', 'LIMIT' => $cplimit+1 ));
		$this->endDbProfiling( $prop );
		
		$count = 0;
		while ( $row = $this->db->fetchObject( $res ) ) {
			if( ++$count > $cplimit ) {
				// We've reached the one extra which shows that there are additional pages to be had. Stop here...
				$this->addStatusMessage( 'category', array('next' => $row->cl_sortkey) );
				break;
			}
			$this->addRaw( 'pageids', $row->cl_from );
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}
	
	//
	// ************************************* PAGE INFO GENERATORS *************************************
	//

	/**
	* Populate redirect data. Redirects may be one of the following:
	*     Redir to nonexisting, Existing page, or Existing redirect.
	*     Existing redirect may point to yet another nonexisting or existing page( which in turn may also be a redirect)
	*/
	function genRedirectInfo(&$prop, &$genInfo) {
		if( empty( $this->redirectPageIds ) ) {
			return;
		}
		$this->startProfiling();
		extract( $this->db->tableNames( 'page', 'pagelinks' ) );

		//
		// Two part query:
		//     first part finds all the redirect, who's targets are regular existing pages
		//     second part finds targets that either do not exist or are redirects themselves.
		//
		$sql = 'SELECT '
			. 'la.pl_from a_id,'
			. 'la.pl_namespace b_namespace, la.pl_title b_title, pb.page_id b_id, pb.page_is_redirect b_is_redirect, '
			. 'null c_namespace, null c_title, null c_id, null c_is_redirect '
			. "FROM $pagelinks AS la, $page AS pb "
			. ' WHERE ' . $this->db->makeList( array( 
				'la.pl_from' => $this->redirectPageIds,
				'la.pl_namespace = pb.page_namespace',
				'la.pl_title = pb.page_title',
				'pb.page_is_redirect' => 0
				), LIST_AND )
		. ' UNION SELECT '
			. 'la.pl_from a_id,'
			. 'la.pl_namespace b_namespace, la.pl_title b_title, pb.page_id b_id, pb.page_is_redirect b_is_redirect,'
			. 'lb.pl_namespace c_namespace, lb.pl_title c_title, pc.page_id c_id, pc.page_is_redirect c_is_redirect '
			. 'FROM '
			. "(($pagelinks AS la LEFT JOIN $page AS pb ON la.pl_namespace = pb.page_namespace AND la.pl_title = pb.page_title) LEFT JOIN "
			. "$pagelinks AS lb ON pb.page_id = lb.pl_from) LEFT JOIN "
			. "$page AS pc ON lb.pl_namespace = pc.page_namespace AND lb.pl_title = pc.page_title "
			. ' WHERE ' . $this->db->makeList( array(
				'la.pl_from' => $this->redirectPageIds,
				"pb.page_is_redirect IS NULL OR pb.page_is_redirect = '1'"
				), LIST_AND );

		$this->startDbProfiling();
		$res = $this->db->query( $sql, $this->classname . '::genRedirectInfo' );
		$this->endDbProfiling( $prop );
		
		while ( $row = $this->db->fetchObject( $res ) ) {
			$this->addPageSubElement( $row->a_id, 'redirect', 'to', $this->getLinkInfo( $row->b_namespace, $row->b_title, $row->b_id, $row->b_is_redirect ), false);
			if( $row->b_is_redirect ) {
				$this->addPageSubElement( $row->a_id, 'redirect', 'dblredirectto', $this->getLinkInfo( $row->c_namespace, $row->c_title, $row->c_id, $row->c_is_redirect ), false);
			}
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}

	/**
	* Checks which pages the user has the rights to edit and move.
	*/
	function genPermissionsInfo(&$prop, &$genInfo) {
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));
		
		$pages =& $this->data['pages'];
		$titles = array();
		foreach( $pages as $key => &$page ) {
			if( array_key_exists('_obj', $page) ) {
				$titles[$key] =& $page['_obj'];
			}
		}
		if( !empty($titles) ) {
			// populate cache
			$batch = new LinkBatch( $titles );
			
			$this->startDbProfiling();
			$batch->execute();
			if( empty( $this->existingPageIds ) ) {
				$this->endDbProfiling( $prop );
			} else {
				$res = $this->db->select(
					'page',
					array('page_id', 'page_restrictions'),
					array('page_id' => $this->existingPageIds),
					$this->classname . "::genPermissionsInfo" );
				$this->endDbProfiling( $prop );

				while ( $row = $this->db->fetchObject( $res ) ) {
					$titles[ $row->page_id ]->loadRestrictions( $row->page_restrictions );
				}
				$this->db->freeResult( $res );
			}
			
			foreach( $titles as $key => &$title ) {
				$page =& $pages[$key];
				$page['canEdit'] = $title->userCanEdit() ? 'true' : 'false';
				if( $prcanmove ) {
					$page['canMove'] = $title->userCanMove() ? 'true' : 'false';
				}
			}
		}
		$this->endProfiling( $prop );
	}
	
	var $genPageLinksSettings = array(	// database column name prefix, output element name
		'links' 	=> array( 'prefix' => 'pl', 'code' => 'l',  'linktbl' => 'pagelinks', 'langlinks' => false ),
		'langlinks' => array( 'prefix' => 'll', 'code' => 'll', 'linktbl' => 'langlinks', 'langlinks' => true ),
		'templates' => array( 'prefix' => 'tl', 'code' => 'tl', 'linktbl' => 'templatelinks', 'langlinks' => false ));

	/**
	* Generates list of links/langlinks/templates for all non-redirect pages.
	*/
	function genPageLinksHelper(&$prop, &$genInfo) {
		if( empty($this->nonRedirPageIds) ) {
			return;
		}
		$this->startProfiling();
		extract( $this->genPageLinksSettings[$prop] );
		
		$this->startDbProfiling();
		$res = $this->db->select(
			$linktbl,
			array( 	"{$prefix}_from from_id",
					($langlinks ? 'll_lang' : "{$prefix}_namespace to_namespace"),
					"{$prefix}_title to_title" ),
			array( "{$prefix}_from" => $this->nonRedirPageIds ),
			$this->classname . "::genPageLinks_{$code}" );
		$this->endDbProfiling( $prop );

		while ( $row = $this->db->fetchObject( $res ) ) {
			if( $langlinks ) {
				$values = array('lang' => $row->ll_lang, '*' => $row->to_title);
			} else {
				$values = $this->getLinkInfo( $row->to_namespace, $row->to_title );
			}
			$this->addPageSubElement( $row->from_id, $prop, $code, $values);
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}
	
	var $genPageBackLinksSettings = array(	// database column name prefix, output element name
		'embeddedin' => array( 'prefix' => 'tl', 'code' => 'ei', 'linktbl' => 'templatelinks', 'isImage' => false ),
		'backlinks' => array( 'prefix' => 'pl', 'code' => 'bl', 'linktbl' => 'pagelinks', 'isImage' => false ),
		'imagelinks' => array( 'prefix' => 'il', 'code' => 'il', 'linktbl' => 'imagelinks', 'isImage' => true ));

	/**
	* Generate backlinks for either links, templates, or both
	* $type - either 'template' or 'page'
	*/
	function genPageBackLinksHelper(&$prop, &$genInfo) {
		$this->startProfiling();
		extract( $this->genPageBackLinksSettings[$prop] );
		
		//
		// Parse and validate parameters
		//
		$parameters = $this->getParams( $prop, $genInfo );		
		$contFrom = $parameters["{$code}contfrom"];
		$limit  = intval($parameters["{$code}limit"]);
		$this->validateLimit( "{$code}limit", $limit, 50, 1000 );
		$filter = $parameters["{$code}filter"];
		if( count($filter) != 1 ) {
			$this->dieUsage( "{$code}filter must either be 'all', 'existing', or 'nonredirects'", "{$code}_badmultifilter" );
		} else {
			$filter = $filter[0];
		}
		//
		// Prase contFrom - will be in the format    ns|db_key|page_id - determine how to continue
		//
		if( $contFrom ) {
			$contFromList = explode( '|', $contFrom );
			$contFromValid = count($contFromList) === 3;
			if( $contFromValid ) {
				$fromNs = intval($contFromList[0]);
				$fromTitle = $contFromList[1];
				$contFromValid = ( ($fromNs !== 0 || $contFromList[0] === '0') && !empty($fromTitle) );
			}
			if( $contFromValid ) {
				$fromPageId = intval($contFromList[2]);
				$contFromValid = ($fromPageId > 0);
			}
			if( !$contFromValid ) {
				$this->dieUsage( "{$code}contfrom is invalid. You should pass the original value retured by the previous query", "{$code}_badcontfrom" );
			}
		}
		//
		// Parse page type filtering
		//
		$nonredir = $existing = $all = false;
		switch( $filter ) {
			case 'all' :
				$all = true;
				// fallthrough
			case 'existing' :
				$existing = true;
				// fallthrough
			case 'nonredirects' :
				$nonredir = true;
				break;
			default:
				$this->dieUsage( "{$code}filter '$filter' is not one of the allowed: 'all', 'existing' [default], and 'nonredirects'", "{$code}_badfilter" );
		}
		//
		// Make a list of pages to query
		//
		$linkBatch = new LinkBatch;
		foreach( $this->data['pages'] as $key => &$page ) {
			if( (
				( $key < 0 && $all && array_key_exists('_obj', $page) ) ||
				( $key > 0 && ($existing || ($nonredir && !array_key_exists('redirect', $page))) )
				)
			&&
				( !$isImage || $page['ns'] == NS_IMAGE )	// when doing image links search, only allow NS_IMAGE
			) {
				$title = &$page['_obj'];
				// remove any items already processed by previous queries
				if( $contFrom ) {
					if( $title->getNamespace() < $fromNs ||
						($title->getNamespace() === $fromNs && $title->getDBkey() < $fromTitle)) {
						continue;
					}
				}
				$linkBatch->addObj( $title );
			}
		}
		if( $linkBatch->isEmpty() ) {
			$this->addStatusMessage( $prop, array('error'=>'emptyrequest') );
			return; // Nothing to do
		}
		//
		// Create query parameters
		//
		$columns = array( "{$prefix}_from from_id", 'page_namespace from_namespace', 'page_title from_title' );
		$where = array( "{$prefix}_from = page_id" );
		if( $isImage ) {
			$columns[] = "{$prefix}_to to_title";
			$where["{$prefix}_to"] = array_keys($linkBatch->data[NS_IMAGE]);
			$orderBy   = "{$prefix}_to, {$prefix}_from";
			if( $contFrom ) {
				$where[] = "(({$prefix}_to > " . $this->db->addQuotes( $fromTitle ) ." ) OR "
						  ."({$prefix}_to = " . $this->db->addQuotes( $fromTitle ) ." AND {$prefix}_from >= " . intval($fromPageId) . "))"; 
			}
		} else {
			$columns[] = "{$prefix}_namespace to_namespace";
			$columns[] = "{$prefix}_title to_title";
			$where[]   = $linkBatch->constructSet( $prefix, $this->db );
			$orderBy   = "{$prefix}_namespace, {$prefix}_title, {$prefix}_from";
			if( $contFrom ) {
				$where[] = 	 "({$prefix}_namespace > " . intval($fromNs) ." OR "
							."({$prefix}_namespace = " . intval($fromNs) ." AND "
								."({$prefix}_title > " . $this->db->addQuotes( $fromTitle ) ." OR "
								."({$prefix}_title = " . $this->db->addQuotes( $fromTitle ) ." AND "
									."{$prefix}_from >= " . intval($fromPageId) . "))))"; 
			}
		}
		$options = array( 'ORDER BY' => $orderBy, 'LIMIT' => $limit+1 );
		//
		// Execute
		//
		$this->startDbProfiling();
		$res = $this->db->select(
			array( $linktbl, 'page' ),
			$columns,
			$where,
			$this->classname . "::genPageBackLinks_{$code}",
			$options );
		$this->endDbProfiling( $prop );

		$count = 0;
		while ( $row = $this->db->fetchObject( $res ) ) {
			if( ++$count > $limit ) {
				// We've reached the one extra which shows that there are additional pages to be had. Stop here...
				$this->addStatusMessage( $prop, 
					array('next' => ($isImage ? NS_IMAGE : $row->to_namespace) ."|{$row->to_title}|{$row->from_id}") );
				break;
			}
			$pageId = $this->lookupPageIdByTitle( ($isImage ? NS_IMAGE : $row->to_namespace), $row->to_title );
			$values = $this->getLinkInfo( $row->from_namespace, $row->from_title, $row->from_id );
			$this->addPageSubElement( $pageId, $prop, $code, $values );
		}
		$this->db->freeResult( $res );
		$this->endProfiling( $prop );
	}
	
	/**
	* Add a list of revisions to the page history
	*/
	function genPageRevisions(&$prop, &$genInfo) {
		if( empty( $this->existingPageIds ) ) {
			return;
		}
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));
		
		$tables = array('revision');
		$fields = array('rev_id', 'rev_text_id', 'rev_timestamp', 'rev_user', 'rev_user_text', 'rev_minor_edit');
		if( $rvcomments ) {
			$fields[] = 'rev_comment';
		}
		$conds = array( 'rev_deleted' => 0 );
		if( isset($rvstart) )  $conds[] = 'rev_timestamp >= ' . $this->prepareTimestamp($rvstart);
		if( isset($rvend) )    $conds[] = 'rev_timestamp <= ' . $this->prepareTimestamp($rvend);
		$options = array( 'LIMIT' => $rvlimit, 'ORDER BY' => 'rev_timestamp DESC, rev_id DESC' );
		if( isset($rvuniqusr) ) $options['GROUP BY'] = 'rev_user_text';
		if( $rvoffset !== 0 )  $options['OFFSET'] = $rvoffset;
		
		if( $rvcontent ) {
			$this->validateLimit( 'content + rvlimit * pages', $rvlimit * count($this->existingPageIds), 50, 200 );
			$tables[] = 'text';
			$fields[] = 'old_id';
			$fields[] = 'old_text';
			$fields[] = 'old_flags';
			$conds[] = 'rev_text_id=old_id';
		} else {
			$this->validateLimit( 'rvlimit * pages', $rvlimit * count($this->existingPageIds), 200, 2000 );
		}
		$queryname = $this->classname . '::genPageRevisions';
		
		$this->startDbProfiling();
		foreach( $this->existingPageIds as $pageId ) {
			$conds['rev_page'] = $pageId;
			$res = $this->db->select( $tables, $fields, $conds, $queryname, $options );
			while ( $row = $this->db->fetchObject( $res ) ) {
				$vals = array(
					'revid' => $row->rev_id,
					'oldid' => $row->rev_text_id,
					'timestamp' => wfTimestamp( TS_ISO_8601, $row->rev_timestamp ),
					'user' => $row->rev_user_text,
					);
				if( !$row->rev_user ) {
					$vals['anon'] = '';
				}
				if( $row->rev_minor_edit ) {
					$vals['minor'] = '';
				}
				if( $rvcomments ) {
					$vals['comment'] = $row->rev_comment;
				}
				if( $rvcontent ) {
					$vals['xml:space'] = 'preserve';
					$vals['*'] = Revision::getRevisionText( $row );
				} else {
					$vals['*'] = '';	// Force all elements to be attributes
				}
				
				$this->addPageSubElement( $pageId, 'revisions', 'rv', $vals);
			}
			$this->db->freeResult( $res );
		}
		$this->endDbProfiling( $prop );
		$this->endProfiling( $prop );
	}

	/**
	* Add user contributions to the user pages
	*/
	function genUserContributions(&$prop, &$genInfo) {
		$this->startProfiling();
		extract( $this->getParams( $prop, $genInfo ));

		// Make query parameters
		$tables = array('page', 'revision');
		$fields = array('page_namespace', 'page_title', 'page_is_new', 'rev_id', 'rev_text_id', 'rev_timestamp', 'rev_minor_edit');
		if( $uccomments ) {
			$fields[] = 'rev_comment';
		}
		$conds = array( 'page_id=rev_page' );
		$queryname = $this->classname . '::genUserContributions';
		$options = array( 'LIMIT' => $uclimit, 'ORDER BY' => 'rev_timestamp DESC', 'FORCE INDEX' => 'usertext_timestamp' );
		
		$count = 0;
		$maxallowed = ($this->isBot ? 500 : 2000);
		
		$this->startDbProfiling(); // DB code is intermixed here, so the result is not very accurate
		// For all valid pages in User namespace query history. Note that the page might not exist.
		foreach( $this->data['pages'] as $key => &$page ) {
			if( array_key_exists('_obj', $page) ) {
				$title =& $page['_obj'];
				if( $title->getNamespace() == NS_USER && !$title->isExternal() ) {
					if( (++$count * $uclimit) > $maxallowed ) {
						$this->dieUsage( "Too many user contributions requested, only $maxallowed allowed", 'uclimit * users');
					}
					
					$conds['rev_user_text'] = $title->getText();
					$data = &$page['contributions'];
					
					$res = $this->db->select( $tables, $fields, $conds, $queryname, $options );
					while ( $row = $this->db->fetchObject( $res ) ) {
						$vals = $this->getLinkInfo( $row->page_namespace, $row->page_title );
						$vals['revid'] = $row->rev_id;
						$vals['oldid'] = $row->rev_text_id;
						$vals['timestamp'] = wfTimestamp( TS_ISO_8601, $row->rev_timestamp );
						if( $row->rev_minor_edit ) $vals['minor'] = '';
						if( $row->page_is_new ) $vals['new'] = '';
						if( $uccomments ) $vals['comment'] = $row->rev_comment;

						$data[] = $vals;
					}
					$this->db->freeResult( $res );
					$data['_element'] = 'uc';
				}
			}
		}
		$this->endDbProfiling( $prop );
		$this->endProfiling( $prop );
	}

	/**
	* Add the raw content of the pages
	*/
	function genPageContent(&$prop, &$genInfo) {
		if( empty( $this->existingPageIds ) ) {
			return;
		}
		$this->startProfiling();

		// Generate the WHERE clause for pageIds+RevisionIds
		$ids = array();
		foreach( $this->data['pages'] as $pageId => &$page ) {
			if( $pageId > 0 ) {
				$ids[] = "(rev_page=$pageId AND rev_id={$page['revid']})";
			}
		}
		$this->validateLimit( 'co_querytoobig', count($ids), 50, 200 );		
		
		$this->startDbProfiling();
		$res = $this->db->select(
			array('revision', 'text'),
			array('rev_page', 'old_id', 'old_text', 'old_flags'),
			array('rev_text_id=old_id', implode('OR', $ids)),
			$this->classname . '::genPageContent'
			);
		while ( $row = $this->db->fetchObject( $res ) ) {
			$this->addPageSubElement( $row->rev_page, $prop, 'xml:space', 'preserve', false);
			$this->addPageSubElement( $row->rev_page, $prop, '*', Revision::getRevisionText( $row ), false);
		}
		$this->db->freeResult( $res );
		$this->endDbProfiling( $prop );	// Revision::getRevisionText is also a database call, so include it in this scope
		$this->endProfiling( $prop );
	}

	//
	// ************************************* UTILITIES *************************************
	//
	
	/**
	* Take $row with fields from 'page' table and create needed page entries in $this->data
	*/
	function storePageInfo( &$row ) {
		$title = Title::makeTitle( $row->page_namespace, $row->page_title );
		if ( !$title->userCanRead() ) {
			$this->db->freeResult( $res );
			$this->dieUsage( "No read permission for $titleString", 'pi_pageidaccessdenied' );
		}
		$pageid = $row->page_id;
		$data = &$this->data['pages'][$pageid];
		$this->pageIdByText[$title->getPrefixedText()] = $pageid;
		$data['_obj']    = $title;
		$data['ns']      = $title->getNamespace();
		$data['title']   = $title->getPrefixedText();
		$data['id']      = $pageid;
		$data['touched'] = $row->page_touched;
		$data['revid']   = $row->page_latest;
		
		$this->existingPageIds[] = $pageid;
		if ( $row->page_is_redirect ) {
			$data['redirect'] = '';
			$this->redirectPageIds[] = $pageid;
		} else {
			$this->nonRedirPageIds[] = $pageid;
		}
	}

	/**
	* Process the list of given titles, update $where and $this->requestsize, and return the data of the LinkBatch object
	*/
	function parseTitles( &$where ) {
		global $wgRequest;
		$titles = $this->addRaw( 'titles', $wgRequest->getVal('titles') );
		if( $titles !== null ) {
			$titles = explode( '|', $titles );
			$linkBatch = new LinkBatch;
			foreach ( $titles as &$titleString ) {
				$titleObj = &Title::newFromText( $titleString );
				if ( !$titleObj ) {
					$this->dieUsage( "bad title $titleString", 'pi_invalidtitle' );
				}
				if ( !$titleObj->userCanRead() ) {
					$this->dieUsage( "No read permission for $titleString", 'pi_titleaccessdenied' );
				}
				$linkBatch->addObj( $titleObj );
				
				// Make sure we remember the original title that was given to us
				// This way the caller can correlate new titles with the originally requested if they change namespaces, etc
				if( $titleString !== $titleObj->getPrefixedText() ) {
					$this->normalizedTitles[$titleString] = $titleObj;
				}
			}
			if ( $linkBatch->isEmpty() ) {
				$this->dieUsage( "no valid titles were given", 'pi_novalidtitles' );
			}
			// Create a list of pages to query
			$where[] = $linkBatch->constructSet( 'page', $this->db );
			$this->requestsize += $linkBatch->getSize();
			
			// we don't need the batch any more, data can be destroyed
			return $linkBatch->data;
		} else {
			return null;
		}
	}
	
	/**
	* Process the list of given titles, update $where and $this->requestsize, and return the data of the LinkBatch object
	*/
	function parsePageIds( &$where ) {
		global $wgRequest;
		$pageids = $this->addRaw( 'pageids', $wgRequest->getVal('pageids') );
		if ( $pageids !== null ) {
			$pageids = explode( '|', $pageids );
			$pageids = array_map( 'intval', $pageids );
			$pageids = array_unique($pageids);
			sort( $pageids, SORT_NUMERIC );
			if( $pageids[0] <= 0 ) {
				$this->dieUsage( "'pageids' contains a bad id", 'pi_badpageid' );
			}
			$where['page_id'] = $pageids;
			$this->requestsize += count($pageids);
		}
		return $pageids;
	}
	
	/**
	* From two parameter arrays, makes an array of the values provided by the user.
	*/
	function getParams( &$property, &$generator ) {
		global $wgRequest;
		
		$paramNames = &$generator[GEN_PARAMS];
		$paramDefaults = &$generator[GEN_DEFAULTS];
		if( count($paramNames) !== count($paramDefaults) ) {
			die("Internal error: '$property' param count mismatch");
		}
		$results = array();
		for( $i = 0; $i < count($paramNames); $i++ ) {
			$param = &$paramNames[$i];
			$dflt = &$paramDefaults[$i];
			switch( gettype($dflt) ) {
				case 'NULL':
				case 'string':
					$result = $wgRequest->getVal( $param, $dflt );
					break;
				case 'integer':
					$result = $wgRequest->getInt( $param, $dflt );
					break;
				case 'boolean':
					// Having a default value of 'true' is pointless
					$result = $wgRequest->getCheck( $param );
					break;
				case 'array':
					$result = $this->parseMultiValue( $param, $dflt );
					break;
				default:
					die('Internal error: unprocessed type ' . gettype($dflt));
			}
			$results[$param] = $result;
		}
		return $results;
	}
	
	/**
	* Lookup of the page id by ns:title in the data array, and will die if no such title is found
	*/
	function lookupPageIdByTitle( $ns, &$dbkey ) {
		$prefixedText = Title::makeTitle( $ns, $dbkey )->getPrefixedText();
		if( array_key_exists( $prefixedText, $this->pageIdByText )) {
			return $this->pageIdByText[$prefixedText];
		}
		die( "internal error - '$ns:$dbkey' not found" );
	}
	
	/**
	* Use this method to add 'titles' or 'pageids' during meta generation in addition to any supplied by the user.
	*/
	function addRaw( $type, $elements ) {
		$val = & $this->{$type};
		if( $elements !== null && $elements !== '' ) {
			if( is_array( $elements )) {
				$elements = implode( '|', $elements );
			}
			if( $val !== null ) {
				$val .= '|';
			}
			$val .= $elements;
		}
		return $val;
	}
	
	/**
	* Creates an array describing the properties of a given link
	*/
	function getLinkInfo( $ns, $title, $id = -1, $isRedirect = false ) {
		return $this->getTitleInfo( Title::makeTitle( $ns, $title ), $id, $isRedirect );
	}

	/**
	* Creates an element    <$title ns='xx' iw='xx' id='xx'>Prefixed Title</$title>
	* All attributes are optional.
	*/
	function getTitleInfo( $title, $id = -1, $isRedirect = false ) {
		$data = array();
		if( $title->getNamespace() != NS_MAIN ) {
			$data['ns'] = $title->getNamespace();
		}
		if( $title->isExternal() ) {
			$data['iw'] = $title->getInterwiki();
		}
		if( $id === null ) {
			$id = 0;
		}
		if( $id >= 0 ) {
			$data['id'] = $id;
		}
		if( $isRedirect ) {
			$data['redirect'] = 'true';
		}
		$data['*'] = $title->getPrefixedText();

		return $data;
	}

	/**
	* Adds a sub element to the page by its id. 
	* Example for $multiItems = true (useful when there are many subelements with the same name, like langlinks or backlinks)
	* 'pages' => array (
	*    $pageId => array (
	*      $mainElem => array (
	*        '_element' => $itemElem,
	*        0 => $params
	*        1 => $params
	*        .....
	* Example for $multiItems = false (useful when there are few elements with unique names)
	* 'pages' => array (
	*    $pageId => array (
	*      $mainElem => array (
	*        $itemElem => $params
	*        .....
	*/
	function addPageSubElement( $pageId, $mainElem, $itemElem, $params, $multiItems = true ) {
		$data = & $this->data['pages'][$pageId][$mainElem];
		if( $multiItems ) {
			$data['_element'] = $itemElem;
			$data[] = $params;
		} else {
			if( !empty($data) && (array_key_exists( $itemElem, $data ) || array_key_exists( '_element', $data ))) {
				die("Internal error: multiple calls to addPageSubElement($itemElem)");
			}
			$data[$itemElem] = $params;
		}
	}

	/**
	* Validate the proper format of the timestamp string (14 digits), and add quotes to it.
	*/
	function prepareTimestamp( $value ) {
		if ( preg_match( '/^[0-9]{14}$/', $value ) ) {
			return $this->db->addQuotes( $value );
		} else {
			$this->dieUsage( 'Incorrect timestamp format', 'badtimestamp' );
		}
	}
	
	/**
	* NOTE: This function must not be called after calling header()
	* Creates a human-readable usage information message
	*/
	function dieUsage( $message, $errorcode ) {
		global $wgUser, $wgRequest;

		$this->addStatusMessage( 'error', $errorcode );
		if( !$wgRequest->getCheck( 'nousage' ) && 
			( $this->format === 'xml' || $this->format === 'html' )) {
				
			$indentSize = 12;
			$indstr = str_repeat(" ", $indentSize+7);
			$formatString = "  %-{$indentSize}s - %s\n\n";
			
			$formats = "";
			foreach( $this->outputGenerators as $format => &$generator ) {
				$formats .= sprintf( $formatString, $format,
					mergeDescriptionStrings($generator[GEN_DESC], $indstr));
			}

			$props = "\n  *These properties apply to the entire site*\n";
			foreach( $this->propGenerators as $property => &$generator ) {
				if( $generator[GEN_ISMETA] ) {
					$props .= sprintf( $formatString, $property, 
								mergeDescriptionStrings($generator[GEN_DESC], $indstr));
				}
			}
			$props .= "\n  *These properties apply to the specified pages*\n";
			foreach( $this->propGenerators as $property => &$generator ) {
				if( !$generator[GEN_ISMETA] ) {
					$props .= sprintf( $formatString, $property, 
								mergeDescriptionStrings($generator[GEN_DESC], $indstr));
				}
			}

			// No need to html-escape $message - it gets done as part of the xml/html generation
			$msg = array(
				"",
				"",
				"*------ Error: $message ($errorcode) ------*",
				"",
				"*Summary*",
				"  This API provides a way for your applications to query data directly from the MediaWiki servers.",
				"  One or more pieces of information about the site and/or a given list of pages can be retrieved.",
				"  Information may be returned in either a machine (xml, json, php) or a human readable (html, dbg) format.",
				"",
				"*Usage*",
				"  query.php ? format=... & what=...|...|... & titles=...|...|... & ...",
				"",
				"*Common parameters*",
				"    format     - How should the output be formatted. See formats section.",
				"    what       - What information the server should return. See properties section.",
				"    titles     - A list of titles, separated by the pipe '|' symbol.",
				"    pageids    - A list of page ids, separated by the pipe '|' symbol.",
				"    noprofile  - When present, each sql query execution time will be hidden. (not implemented)",
				"",
				"*Examples*",
				"    query.php?format=xml&what=links|templates&titles=User:Yurik",
				"  This query will return a list of all links and templates used on the User:Yurik",
				"",
				"    query.php?format=xml&what=revisions&titles=Main_Page&rvlimit=100&rvstart=20060401000000&rvcomments",
				"  Get a list of 100 last revisions of the main page with comments, but only if it happened after midnight April 1st 2006",
				"",
				"",
				"*Supported Formats*",
				$formats,
				"",
				"*Supported Properties*",
				$props,
				"",
				"*Notes*",
				"  Some properties may add status information to the 'query' element.",
				"",
				"*Credits*",
				"  This feature is maintained by Yuri Astrakhan (FirstnameLastname@gmail.com)",
				"  Please leave your comments and suggestions at http://en.wikipedia.org/wiki/User_talk:Yurik",
				"",
				"  This extension came as the result of IRC discussion between Yuri Astrakhan (en:Yurik), Tim Starling (en:Tim Starling), and Daniel Kinzler(de:Duesentrieb)",
				"  The extension was first implemented by Tim to provide interlanguage links and history summary.",
				"  It was later completelly rewritten by Yuri, introducing the rest of properties, meta information, and various formatting options.",
				"",
				"*User Status*",
				"  You are " . ($wgUser->isAnon() ? "an anonymous" : "a logged-in") . " " . ($this->isBot ? "bot" : "user") . " " . $wgUser->getName() .
					($wgUser->getNewtalk() ? ', and you have unread messages.' : '.'),
				"",
				"*Version*",
				'  $Id$',
				"",
				);
		
			$this->addStatusMessage( 'usage', implode("\n", $msg), true );
		}
		$this->output(true);
		die(0);
	}
	
	/**
	* Adds a status message into the <query> element, for a given module.
	*/
	function addStatusMessage( $module, $value, $preserveXmlSpacing = false ) {
		if( !array_key_exists( 'query', $this->data )) {
			$this->data['query'] = array();
		}
		if( !array_key_exists( $module, $this->data['query'] )) {
			$this->data['query'][$module] = array();
		}
		
		$element = &$this->data['query'][$module];
		if( is_array($value) ) {
			$element = array_merge( $element, $value );
			if( !array_key_exists( '*', $element )) {
				$element['*'] = '';
			}
		} else {
			if( array_key_exists( '*', $element )) {
				$element['*'] .= $value;
			} else {
				$element['*'] = $value;
			}
			if( $preserveXmlSpacing ) {
				$element['xml:space'] = 'preserve';
			}
		}
	}
	
	/**
	* Records the time of the call to this method
	*/
	function startProfiling() {
		$this->startTime = wfTime();
	}
	/**
	* Same as startProfiling, but used for DB access only
	*/
	function startDbProfiling() {
		$this->startDbTime = wfTime();
	}
	
	/**
	* Records the running time of the given module since last startDbProfiling() call.
	*/
	function endProfiling( $module ) {
		$this->recordProfiling( $module, 'time', $this->startTime );
	}
	/**
	* Same as endProfiling, but used for DB access only
	*/
	function endDbProfiling( $module ) {
		$this->recordProfiling( $module, 'dbtime', $this->startDbTime );
	}
	/**
	* Helper profiling function
	*/
	function recordProfiling( $module, $type, &$start ) {
		$timeDelta = wfTime() - $start;
		unset($start);
		$this->addStatusMessage( $module, array( $type => sprintf( "%1.2fms", $timeDelta * 1000.0 ) ));
	}
	
	/**
	* Validate the value against the minimum and user/bot maximum limits. Prints usage info on failure.
	*/
	function validateLimit( $varname, $value, $max, $botMax = false, $min = 1 ) {
		global $wgUser;
		if( $botMax === false ) $botMax = $max;
		
		if ( $value < $min ) {
			$this->dieUsage( "$value entries is less than $min", $varname );
		}
		if( $this->isBot ) {
			if ( $value > $botMax ) {
				$this->dieUsage( "Bot requested $value pages, which is over $botMax pages allowed", $varname );
			}
		} else {
			if( $value > $max ) {
				$this->dieUsage( "User requested $value pages, which is over $max pages allowed", $varname );
			}
		}
	}
}


//
// ************************************* Print Methods *************************************
//

/**
* Prints data in html format. Escapes all unsafe characters. Adds an HTML warning in the begining.
*/
function printHTML( &$data ) {
?>
<html>
<head>
	<title>MediaWiki Query Interface</title>
</head>
<body>
	<br/>
<?php
	if( !array_key_exists('usage', $data) ) {
?>
	<small>
	This page is being rendered in HTML format, which might not be suitable for your application.<br/>
	See <a href="query.php">query.php</a> for more information.<br/>
	</small>
<?php
	}
?>
<pre><?php
	recXmlPrint( 'htmlprinter', 'yurik', $data, -2 );
?></pre>
</body>
<?php
}

/**
* Prety-print various elements in HTML format, such as xml tags and URLs. This method also replaces any "<" with &lt;
*/
function htmlprinter( $text ) {
	// encode all tags as safe blue strings
	$text = ereg_replace( '\<([^>]+)\>', '<font color=blue>&lt;\1&gt;</font>', $text );
	// identify URLs
	$text = ereg_replace("[a-zA-Z]+://[^ ()<\n]+", '<a href="\\0">\\0</a>', $text);
	// identify requests to query.php
	$text = ereg_replace("query\\.php\\?[^ ()<\n]+", '<a href="\\0">\\0</a>', $text);
	// make strings inside * bold
	$text = ereg_replace("\\*[^<>\n]+\\*", '<b>\\0</b>', $text);
	echo $text;
}

/**
* Output data in XML format
*/
function printXML( &$data ) {
	global $wgRequest;
	echo '<?xml version="1.0" encoding="utf-8"?>';
	recXmlPrint( 'echoprinter', 'yurik', $data, $wgRequest->getCheck('xmlindent') ? -2 : null );
}
/**
* Pass-through printer.
*/
function echoprinter( $text ) {
	echo $text;
}

/**
* Sanitizes the data and prints it with the print_r()
*/
function printHumanReadable( &$data ) {
	sanitizeOutputData($data);
	print_r($data);
}

/**
* Prints the data as is, using var_export().
* This format exposes all internals of the data object unescaped, thus it must never be outputed with meta set to text/*
*/
function printDebugCode( &$data ) {
	var_export($data);
}

/**
* Sanitizes the data and serialize() it so that other php scripts can easily consume the data
*/
function printPHP( &$data ) {
	sanitizeOutputData($data);
	echo serialize($data);
}

/**
* Sanitizes the data and serialize it in WDDX format.
* If PHP was compiled with WDDX support, use it (faster)
*/
function printWDDX( &$data ) {
	sanitizeOutputData($data);
	if ( function_exists( 'wddx_serialize_value' ) ) {
		echo wddx_serialize_value($data);
	} else {
		echo '<?xml version="1.0" encoding="utf-8"?>';
		echo '<wddxPacket version="1.0"><header/><data>';
		slowWddxPrinter( $data );
		echo '</data></wddxPacket>';
	}
}

/**
* Recursivelly go through the object and output its data in WDDX format.
*/
function slowWddxPrinter( &$elemValue ) {
	switch( gettype($elemValue) ) {
		case 'array':
			echo '<struct>';
			foreach( $elemValue as $subElemName => &$subElemValue ) {
				echo wfElement( 'var', array('name' => $subElemName), null );
				slowWddxPrinter( $subElemValue );
				echo '</var>';
			}
			echo '</struct>';
			break;
		case 'integer':
		case 'double':
			echo wfElement( 'number', null, $elemValue );
			break;
		case 'string':
			echo wfElement( 'string', null, $elemValue );
			break;
		default:
			die( 'Unknown type ' . gettype($elemValue) );
	}
}

/**
* Sanitizes the data and serializes it in JSON format
*/
function printJSON( &$data ) {
	sanitizeOutputData($data);
	if ( !function_exists( 'json_encode' ) ) {
		require_once 'json.php';
		$json = new Services_JSON();
		echo $json->encode( $data );
	} else {
		echo json_encode( $data );
	}
}

/**
* Recursivelly removes any elements from the array that begin with an '_'.
* The content element '*' is the only special element that is left.
* Use this method when the entire data object gets sent to the user.
*/
function sanitizeOutputData( &$data ) {
	foreach( $data as $key => &$value ) {
		if( $key[0] === '_' ) {
			unset( $data[$key] );
		} elseif( $key === '*' && $value === '' ) {
			unset( $data[$key] );
		} elseif( is_array( $value )) {
			sanitizeOutputData( $value );
		}
	}
}

/**
* This method takes an array and converts it into an xml.
* There are several noteworthy cases:
*
*  If array contains a key "_element", then the code assumes that ALL other keys are not important and replaces them with the value['_element'].
*	Example:	name="root",  value = array( "_element"=>"page", "x", "y", "z") creates <root>  <page>x</page>  <page>y</page>  <page>z</page> </root>
*
*  If any of the array's element key is "*", then the code treats all other key->value pairs as attributes, and the value['*'] as the element's content.
*	Example:	name="root",  value = array( "*"=>"text", "lang"=>"en", "id"=>10)   creates  <root lang="en" id="10">text</root>
*
* If neither key is found, all keys become element names, and values become element content.
* The method is recursive, so the same rules apply to any sub-arrays.
*/
function recXmlPrint( $printer, $elemName, &$elemValue, $indent ) {
	$indstr = "";
	if( !is_null($indent) ) {
		$indent += 2;
		$indstr = "\n" . str_repeat(" ", $indent);
	}

	switch( gettype($elemValue) ) {
		case 'array':
			if( array_key_exists('*', $elemValue) ) {
				$subElemContent = $elemValue['*'];
				unset( $elemValue['*'] );
				if( gettype( $subElemContent ) === 'array' ) {
					$printer( $indstr . wfElement( $elemName, $elemValue, null ));
					recXmlPrint( $printer, $elemName, $subElemValue, $indent );
					$printer( $indstr . "</$elemName>" );
				} else {
					$printer( $indstr . wfElement( $elemName, $elemValue, $subElemContent ));
				}
			} else {
				$printer( $indstr . wfElement( $elemName, null, null ));
				if( array_key_exists('_element', $elemValue) ) {
					$subElemName = $elemValue['_element'];
					foreach( $elemValue as $subElemId => &$subElemValue ) {
						if( $subElemId !== '_element' ) {
							recXmlPrint( $printer, $subElemName, $subElemValue, $indent );
						}
					}
				} else {
					foreach( $elemValue as $subElemName => &$subElemValue ) {
						recXmlPrint( $printer, $subElemName, $subElemValue, $indent );
					}
				}
				$printer( $indstr . "</$elemName>" );
			}
			break;
		case 'object':
			// ignore
			break;
		default:
			$printer( $indstr . wfElement( $elemName, null, $elemValue ));
			break;
	}
}

/**
* Helper method that merges an array of strings and prepends each line with an indentation string
*/
function mergeDescriptionStrings( &$value, $indstr ) {
	if( is_array($value) ) {
		$value = implode( "\n", $value );
	}
	return str_replace("\n", "\n$indstr", $value);
}

/**
* Merge all known generator parameters into one array of values. Used for logging.
*/
function mergeParameters( &$generators ) {
	$params = array();
	foreach( $generators as $property => &$generator ) {
		$value = &$generator[GEN_PARAMS];
		if( $value !== null ) {
			if( is_array($value) ) {
				$params = array_merge( $params, $value );
			} else {
				$params[] = $value;
			}
		}
	}
	return $params;
}

?>
