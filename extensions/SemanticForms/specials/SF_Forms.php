<?php
/**
 * Shows list of all forms on the site.
 *
 * @author Yaron Koren
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

class SFForms extends QueryPage {
	/**
	 * Constructor
	 */
	function __construct( $name = 'Forms' ) {
		parent::__construct( $name );
		SFUtils::loadMessages();
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function getPageHeader() {
		global $wgUser;
		
		SFUtils::loadMessages();
		
		$sk = $wgUser->getSkin();
		$cf = SpecialPage::getPage( 'CreateForm' );
		$create_form_link = $sk->makeKnownLinkObj( $cf->getTitle(), $cf->getDescription() );
		$header = "<p>" . $create_form_link . ".</p>\n";
		$header .= '<p>' . wfMsg( 'sf_forms_docu' ) . "</p><br />\n";
		return $header;
	}

	function getPageFooter() {
	}

	function getSQL() {
		$NSform = SF_NS_FORM;
		$dbr = wfGetDB( DB_SLAVE );
		$page = $dbr->tableName( 'page' );
		// QueryPage uses the value from this SQL in an ORDER clause,
		// so return page_title as title.
		return "SELECT 'Form' AS type,
			page_title AS title,
			page_title AS value
			FROM $page
			WHERE page_namespace = {$NSform}
			AND page_is_redirect = 0";
	}

	function getQueryInfo() {
		return array(
			'tables' => array( 'page' ),
			'fields' => array( 'page_title AS title', 'page_title AS value' ),
			'conds' => array( 'page_namespace' => SF_NS_FORM, 'page_is_redirect' => 0 )
		);
	}

	function sortDescending() {
		return false;
	}

	function formatResult( $skin, $result ) {
		$title = Title::makeTitle( SF_NS_FORM, $result->value );
		return $skin->makeLinkObj( $title, $title->getText() );
	}
}
