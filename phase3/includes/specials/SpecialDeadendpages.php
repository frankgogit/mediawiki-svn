<?php
/**
 * @file
 * @ingroup SpecialPage
 */

/**
 * @ingroup SpecialPage
 */
class DeadendPagesPage extends PageQueryPage {

	function getName() {
		return "Deadendpages";
	}

	function getPageHeader() {
		return wfMsgExt( 'deadendpagestext', array( 'parse' ) );
	}

	/**
	 * LEFT JOIN is expensive
	 *
	 * @return true
	 */
	function isExpensive() {
		return 1;
	}

	function isSyndicated() { return false; }

	/**
	 * @return false
	 */
	function sortDescending() {
		return false;
	}

	function getQueryInfo() {
		return array(
			'tables' => array( 'page', 'pagelinks' ),
			'fields' => array( 'page_namespace AS namespace',
					'page_title AS title',
					'page_title AS value'
			),
			'conds' => array( 'pl_from IS NULL',
					'page_namespace' => MWNamespace::getContentNamespaces(),
					'page_is_redirect' => 0
			),
			'join_conds' => array( 'pagelinks' => array( 'LEFT JOIN', array(
					'page_id=pl_from'
			) ) )
		);
	}
}

/**
 * Constructor
 */
function wfSpecialDeadendpages() {

	list( $limit, $offset ) = wfCheckLimits();

	$depp = new DeadendPagesPage();

	return $depp->doQuery( $offset, $limit );
}
