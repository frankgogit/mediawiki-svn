<?php

/**
 * Static class for hooks handled by the Semantic MediaWiki extension.
 *
 * @since 1.7
 *
 * @file SemanticMediaWiki.hooks.php
 * @ingroup SMW
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
final class SMWHooks {

	/**
	 * Schema update to set up the needed database tables.
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/LoadExtensionSchemaUpdates
	 *
	 * @since 1.7
	 *
	 * @param DatabaseUpdater $updater|null
	 *
	 * @return true
	 */
	public static function onSchemaUpdate( /* DatabaseUpdater */ $updater = null ) {
		// $updater can be null in MW 1.16.
		if ( !is_null( $updater ) ) {
			// Method was added in MW 1.19.
			if ( is_callable( array( $updater, 'addPostDatabaseUpdateMaintenance' ) ) ) {
				$updater->addPostDatabaseUpdateMaintenance( 'SMWSetupScript' );
			}
		}

		return true;
	}

	/**
	 * TODO
	 *
	 * @since 1.7
	 *
	 * @return true
	 */
	public static function onPageSchemasRegistration() {
		$GLOBALS['wgPageSchemasHandlerClasses'][] = 'SMWPageSchemas';
		return true;
	}

	/**
	 * Adds links to Admin Links page.
	 *
	 * @since 1.7
	 *
	 * @param ALTree $admin_links_tree
	 *
	 * @return true
	 */
	public static function addToAdminLinks( ALTree &$admin_links_tree ) {
		$data_structure_section = new ALSection( wfMsg( 'smw_adminlinks_datastructure' ) );

		$smw_row = new ALRow( 'smw' );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'Categories' ) );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'Properties' ) );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'UnusedProperties' ) );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'SemanticStatistics' ) );

		$data_structure_section->addRow( $smw_row );
		$smw_admin_row = new ALRow( 'smw_admin' );
		$smw_admin_row->addItem( ALItem::newFromSpecialPage( 'SMWAdmin' ) );

		$data_structure_section->addRow( $smw_admin_row );
		$smw_docu_row = new ALRow( 'smw_docu' );
		$smw_name = wfMsg( 'specialpages-group-smw_group' );
		$smw_docu_label = wfMsg( 'adminlinks_documentation', $smw_name );
		$smw_docu_row->addItem( AlItem::newFromExternalLink( 'http://semantic-mediawiki.org/wiki/Help:User_manual', $smw_docu_label ) );

		$data_structure_section->addRow( $smw_docu_row );
		$admin_links_tree->addSection( $data_structure_section, wfMsg( 'adminlinks_browsesearch' ) );
		$smw_row = new ALRow( 'smw' );
		$displaying_data_section = new ALSection( wfMsg( 'smw_adminlinks_displayingdata' ) );
		$smw_row->addItem( AlItem::newFromExternalLink( 'http://semantic-mediawiki.org/wiki/Help:Inline_queries', wfMsg( 'smw_adminlinks_inlinequerieshelp' ) ) );

		$displaying_data_section->addRow( $smw_row );
		$admin_links_tree->addSection( $displaying_data_section, wfMsg( 'adminlinks_browsesearch' ) );
		$browse_search_section = $admin_links_tree->getSection( wfMsg( 'adminlinks_browsesearch' ) );

		$smw_row = new ALRow( 'smw' );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'Browse' ) );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'Ask' ) );
		$smw_row->addItem( ALItem::newFromSpecialPage( 'SearchByProperty' ) );
		$browse_search_section->addRow( $smw_row );

		return true;
	}


	/**
	 * Register special classes for displaying semantic content on Property and
	 * Concept pages.
	 *
	 * @since 1.7
	 *
	 * @param $title Title
	 * @param $article Article or null
	 *
	 * @return true
	 */
	public static function onArticleFromTitle( Title &$title, /* Article */ &$article ) {
		if ( $title->getNamespace() == SMW_NS_PROPERTY ) {
			$article = new SMWPropertyPage( $title );
		} elseif ( $title->getNamespace() == SMW_NS_CONCEPT ) {
			$article = new SMWConceptPage( $title );
		}

		return true;
	}

	/**
	 * This hook registers parser functions and hooks to the given parser. It is
	 * called during SMW initialisation. Note that parser hooks are something different
	 * than MW hooks in general, which explains the two-level registration.
	 *
	 * @since 1.7
	 */
	public static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setFunctionHook( 'ask', array( 'SMWAsk', 'render' ) );
		$parser->setFunctionHook( 'show', array( 'SMWShow', 'render' ) );
		$parser->setFunctionHook( 'subobject', array( 'SMWSubobject', 'render' ) );
		$parser->setFunctionHook( 'concept', array( 'SMWConcept', 'render' ) );
		$parser->setFunctionHook( 'set', array( 'SMWSet', 'render' ) );
		$parser->setFunctionHook( 'set_recurring_event', array( 'SMWSetRecurringEvent', 'render' ) );
		$parser->setFunctionHook( 'declare', array( 'SMWDeclare', 'render' ), SFH_OBJECT_ARGS );

		return true; // Always return true, in order not to stop MW's hook processing!
	}

	/**
	 * Adds the 'Powered by Semantic MediaWiki' button right next to the default
	 * 'Powered by MediaWiki' button at the bottom of every page. This works
	 * only with MediaWiki 1.17+.
	 * It might make sense to make this configurable via a variable, if some
	 * admins don't want it.
	 *
	 * @since 1.7
	 *
	 * @return true
	 */
	public static function addPoweredBySMW( &$text, $skin ) {
		global $smwgScriptPath;
		$url = htmlspecialchars( "$smwgScriptPath/skins/images/smw_button.png" );
		$text .= ' <a href="http://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki"><img src="' . $url . '" alt="Powered by Semantic MediaWiki" /></a>';

		return true; // Always return true, in order not to stop MW's hook processing!
	}

}
