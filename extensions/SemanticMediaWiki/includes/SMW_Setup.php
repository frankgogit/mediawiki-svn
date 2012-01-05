<?php

/**
 * Global functions used for setting up the Semantic MediaWiki extension.
 * 
 * @file SMW_Setup.php
 * @ingroup SMW
 */

require_once( 'SMW_GlobalFunctions.php' );

/**
 * Function to switch on Semantic MediaWiki. This function must be called in
 * LocalSettings.php after including SMW_Settings.php. It is used to ensure
 * that required parameters for SMW are really provided explicitly. For
 * readability, this is the only global function that does not adhere to the
 * naming conventions.
 *
 * This function also sets up all autoloading, such that all SMW classes are
 * available as early on. Moreover, jobs and special pages are registered.
 *
 * @param mixed $namespace
 * @param boolean $complete
 *
 * @return true
 */
function enableSemantics( $namespace = null, $complete = false ) {
	global $smwgIP, $wgFooterIcons, $wgExtensionFunctions,
		$wgExtensionMessagesFiles,
		$smwgNamespace, $wgAPIModules;

	$wgExtensionFunctions[] = 'smwfSetupExtension';
	$wgExtensionMessagesFiles['SemanticMediaWiki'] = $smwgIP . 'languages/SMW_Messages.php';
	$wgExtensionMessagesFiles['SemanticMediaWikiAlias'] = $smwgIP . 'languages/SMW_Aliases.php';
    $wgExtensionMessagesFiles['SemanticMediaWikiMagic'] = $smwgIP . 'languages/SMW_Magic.php';

	smwfRegisterHooks();
	smwfRegisterResourceLoaderModules();
	smwfRegisterClasses();
	smwfRegisterSpecialPages();

	$wgAPIModules['smwinfo'] = 'ApiSMWInfo';
	$wgAPIModules['ask'] = 'ApiAsk';
	$wgAPIModules['askargs'] = 'ApiAskArgs';

	$wgFooterIcons['poweredby']['semanticmediawiki'] = array(
		'src' => null,
		'url' => 'http://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki',
		'alt' => 'Powered by Semantic MediaWiki',
	);

	// Initialize base namespace for URIs in data exports:
	if ( is_null( $namespace ) ) { 
		die ( 'You should be providing the domain name to enableSemantics()' );
		// fallback (bad because data URL will change depending on client URL)
//		wfWarn( 'You should be providing the domain name to enableSemantics()' );
//		$namespace = parse_url( $wgServer, PHP_URL_HOST );
	}
	if ( !$complete && ( $smwgNamespace !== '' ) ) {
		// The dot tells that the domain is not complete. It will be completed
		// in the Export since we do not want to create a title object here when
		// it is not needed in many cases.
		$smwgNamespace = '.' . $namespace;
	} else {
		$smwgNamespace = $namespace;
	}

	return true;
}

/**
 * Register all SMW hooks with MediaWiki.
 */
function smwfRegisterHooks() {
	global $wgHooks, $wgVersion;

	$wgHooks['LoadExtensionSchemaUpdates'][] = 'SMWHooks::onSchemaUpdate';

	$wgHooks['ParserTestTables'][]    = 'SMWHooks::onParserTestTables';
	$wgHooks['AdminLinks'][]          = 'SMWHooks::addToAdminLinks';
	$wgHooks['PageSchemasRegisterHandlers'][] = 'SMWHooks::onPageSchemasRegistration';
	
	$wgHooks['ParserFirstCallInit'][] = 'SMWSMWDoc::staticInit';
	$wgHooks['LanguageGetMagic'][]    = 'SMWSMWDoc::staticMagic';
	$wgHooks['ParserFirstCallInit'][] = 'SMWInfo::staticInit';
	$wgHooks['LanguageGetMagic'][]    = 'SMWInfo::staticMagic';
	
	$wgHooks['InternalParseBeforeLinks'][] = 'SMWParserExtensions::onInternalParseBeforeLinks'; // parse annotations in [[link syntax]]
	$wgHooks['ArticleDelete'][] = 'SMWParseData::onArticleDelete'; // delete annotations
	$wgHooks['TitleMoveComplete'][] = 'SMWParseData::onTitleMoveComplete'; // move annotations
	$wgHooks['LinksUpdateConstructed'][] = 'SMWParseData::onLinksUpdateConstructed'; // update data after template change and at save
	$wgHooks['ParserAfterTidy'][] = 'SMWParseData::onParserAfterTidy'; // fetch some MediaWiki data for replication in SMW's store
	$wgHooks['NewRevisionFromEditComplete'][] = 'SMWParseData::onNewRevisionFromEditComplete'; // fetch some MediaWiki data for replication in SMW's store
	$wgHooks['OutputPageParserOutput'][] = 'SMWFactbox::onOutputPageParserOutput'; // copy some data for later Factbox display
	$wgHooks['ArticleFromTitle'][] = 'SMWHooks::onArticleFromTitle'; // special implementations for property/type articles
	$wgHooks['ParserFirstCallInit'][] = 'SMWHooks::onParserFirstCallInit';

	if ( $GLOBALS['smwgToolboxBrowseLink'] ) {
		$wgHooks['SkinTemplateToolboxEnd'][] = 'SMWHooks::showBrowseLink';
	}

	$wgHooks['SkinAfterContent'][] = 'SMWFactbox::onSkinAfterContent'; // draw Factbox below categories
	$wgHooks['SkinGetPoweredBy'][] = 'SMWHooks::addPoweredBySMW';
	
	if ( version_compare( $wgVersion, '1.17alpha', '>=' ) ) {
		// For MediaWiki 1.17 alpha and later.
		$wgHooks['ExtensionTypes'][] = 'SMWHooks::addSemanticExtensionType';
	} else {
		// For pre-MediaWiki 1.17 alpha.
		$wgHooks['SpecialVersionExtensionTypes'][] = 'SMWHooks::oldAddSemanticExtensionType';
	}
}

/**
 * Register all SMW modules with the MediaWiki Resource Loader.
 */
function smwfRegisterResourceLoaderModules() {
	global $wgResourceModules, $smwgIP, $smwgScriptPath, $wgVersion, $wgStylePath, $wgStyleVersion;

	$moduleTemplate = array(
		'localBasePath' => $smwgIP,
		'remoteBasePath' => $smwgScriptPath,
		'group' => 'ext.smw'
	);
	
	$wgResourceModules['ext.smw'] = $moduleTemplate + array(
		'scripts' => array(
			'resources/ext.smw.js',
			'resources/ext.smw.compat.js',
		),
	);
	
	$wgResourceModules['ext.smw.style'] = $moduleTemplate + array(
		'styles' => 'skins/SMW_custom.css'
	);
	
	$wgResourceModules['ext.smw.tooltips'] = $moduleTemplate + array(
		'scripts' => 'skins/SMW_tooltip.js',
		'dependencies' => array(
			'mediawiki.legacy.wikibits',
			'ext.smw.style'
		)
	);

	// Modules for jQuery UI before MW 1.17.0 (b/c code).
	// This can vanish when dropping MW 1.16 support.
	// Should we better do "defined( 'MW_SUPPORTS_RESOURCE_MODULES' )" here?
	if ( version_compare( $wgVersion, '1.17alpha', '<' ) ) {
		// TODO: should we better load our own "$smwgScriptPath/libs/jquery-1.4.2.min.js"?
		// MW 1.16 only has jQuery 1.3.2 with some patches.
		$wgResourceModules['jquery'] = array(
			'scripts' => "common/jquery.min.js?$wgStyleVersion",
			'localBasePath' => null, // irrelevant for pre 1.17 b/c code
			'remoteBasePath' => $wgStylePath,
			'group' => 'ext.smw'
		);
		$wgResourceModules['jquery.ui.core'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.core.min.js',
			'styles' => 'skins/jquery-ui/base/jquery.ui.all.css',
			'dependencies' => 'jquery'
		);
		$wgResourceModules['jquery.ui.widget'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.widget.min.js'
		);
		$wgResourceModules['jquery.ui.position'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.position.min.js'
		);
		$wgResourceModules['jquery.ui.button'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.button.min.js',
			'dependencies' => array( 'jquery.ui.core', 'jquery.ui.widget' )
		);
		$wgResourceModules['jquery.ui.autocomplete'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.autocomplete.min.js',
			'dependencies' => array( 'jquery.ui.core', 'jquery.ui.widget', 'jquery.ui.position' )
		);
		$wgResourceModules['jquery.ui.dialog'] = $moduleTemplate + array(
			'scripts' => 'libs/jquery-ui/jquery.ui.dialog.min.js',
			'dependencies' => array( 'jquery.ui.core', 'jquery.ui.widget', 'jquery.ui.position', 
				'jquery.ui.button' /*, 'jquery.ui.draggable', 'jquery.ui.mouse', 'jquery.ui.resizable'*/ )
		);
	}
}

/**
 * Register all SMW classes with the MediaWiki autoloader.
 */
function smwfRegisterClasses() {
	global $smwgIP, $wgAutoloadClasses, $wgJobClasses;

	$wgAutoloadClasses['SMWHooks']   				= $smwgIP . 'SemanticMediaWiki.hooks.php';
	
	$incDir = $smwgIP . 'includes/';
	$wgAutoloadClasses['SMWCompatibilityHelpers']   = $incDir . 'SMW_CompatibilityHelpers.php';
	$wgAutoloadClasses['SMWDataValueFactory']   	= $incDir . 'SMW_DataValueFactory.php';
	$wgAutoloadClasses['SMWDISerializer']           = $incDir . 'SMW_DISerializer.php';
	$wgAutoloadClasses['SMWFactbox']                = $incDir . 'SMW_Factbox.php';
	$wgAutoloadClasses['SMWInfolink']               = $incDir . 'SMW_Infolink.php';
	$wgAutoloadClasses['SMWOutputs']                = $incDir . 'SMW_Outputs.php';
	$wgAutoloadClasses['SMWParseData']              = $incDir . 'SMW_ParseData.php';
	$wgAutoloadClasses['SMWParserExtensions']       = $incDir . 'SMW_ParserExtensions.php';
	$wgAutoloadClasses['SMWQueryLanguage']          = $incDir . 'SMW_QueryLanguage.php';
	$wgAutoloadClasses['SMWSemanticData']           = $incDir . 'SMW_SemanticData.php';
	$wgAutoloadClasses['SMWPageLister']             = $incDir . 'SMW_PageLister.php';

	// Article pages
	$apDir = $smwgIP . 'includes/articlepages/';
	$wgAutoloadClasses['SMWOrderedListPage']        = $apDir . 'SMW_OrderedListPage.php';
	$wgAutoloadClasses['SMWPropertyPage']           = $apDir . 'SMW_PropertyPage.php';
	$wgAutoloadClasses['SMWConceptPage']            = $apDir . 'SMW_ConceptPage.php';

	// Printers
	$qpDir = $smwgIP . 'includes/queryprinters/';
	$wgAutoloadClasses['SMWResultPrinter']          = $qpDir . 'SMW_QueryPrinter.php';
	$wgAutoloadClasses['SMWAggregatablePrinter']   = $qpDir . 'SMW_QP_Aggregatable.php';
	$wgAutoloadClasses['SMWTableResultPrinter']     = $qpDir . 'SMW_QP_Table.php';
	$wgAutoloadClasses['SMWListResultPrinter']      = $qpDir . 'SMW_QP_List.php';
	$wgAutoloadClasses['SMWCategoryResultPrinter']  = $qpDir . 'SMW_QP_Category.php';
	$wgAutoloadClasses['SMWEmbeddedResultPrinter']  = $qpDir . 'SMW_QP_Embedded.php';
	$wgAutoloadClasses['SMWRSSResultPrinter']       = $qpDir . 'SMW_QP_RSSlink.php';
	$wgAutoloadClasses['SMWCsvResultPrinter']       = $qpDir . 'SMW_QP_CSV.php';
	$wgAutoloadClasses['SMWDSVResultPrinter']       = $qpDir . 'SMW_QP_DSV.php';
	$wgAutoloadClasses['SMWJSONResultPrinter']      = $qpDir . 'SMW_QP_JSONlink.php';
	$wgAutoloadClasses['SMWRDFResultPrinter']       = $qpDir . 'SMW_QP_RDF.php';

	// Data items
	$diDir = $smwgIP . 'includes/dataitems/';
	$wgAutoloadClasses['SMWDataItem']		= $diDir . 'SMW_DataItem.php';
	$wgAutoloadClasses['SMWDataItemException']	= $diDir . 'SMW_DataItem.php';
	$wgAutoloadClasses['SMWDIProperty']		= $diDir . 'SMW_DI_Property.php';
	$wgAutoloadClasses['SMWDIBoolean']		= $diDir . 'SMW_DI_Bool.php';
	$wgAutoloadClasses['SMWDINumber']		= $diDir . 'SMW_DI_Number.php';
	$wgAutoloadClasses['SMWDIBlob']			= $diDir . 'SMW_DI_Blob.php';
	$wgAutoloadClasses['SMWDIString']		= $diDir . 'SMW_DI_String.php';
	$wgAutoloadClasses['SMWStringLengthException']	= $diDir . 'SMW_DI_String.php';
	$wgAutoloadClasses['SMWDIUri']			= $diDir . 'SMW_DI_URI.php';
	$wgAutoloadClasses['SMWDIWikiPage']		= $diDir . 'SMW_DI_WikiPage.php';
	$wgAutoloadClasses['SMWDITime']			= $diDir . 'SMW_DI_Time.php';
	$wgAutoloadClasses['SMWDIConcept']		= $diDir . 'SMW_DI_Concept.php';
	$wgAutoloadClasses['SMWDIError']		= $diDir . 'SMW_DI_Error.php';
	$wgAutoloadClasses['SMWDIGeoCoord']		= $diDir . 'SMW_DI_GeoCoord.php';
	$wgAutoloadClasses['SMWContainerSemanticData']	= $diDir . 'SMW_DI_Container.php';
	$wgAutoloadClasses['SMWDIContainer']		= $diDir . 'SMW_DI_Container.php';

	// Datavalues
	$dvDir = $smwgIP . 'includes/datavalues/';
	$wgAutoloadClasses['SMWDataValue']           	= $dvDir . 'SMW_DataValue.php';
	$wgAutoloadClasses['SMWRecordValue']         	= $dvDir . 'SMW_DV_Record.php';
	$wgAutoloadClasses['SMWErrorValue']          	= $dvDir . 'SMW_DV_Error.php';
	$wgAutoloadClasses['SMWStringValue']         	= $dvDir . 'SMW_DV_String.php';
	$wgAutoloadClasses['SMWWikiPageValue']       	= $dvDir . 'SMW_DV_WikiPage.php';
	$wgAutoloadClasses['SMWPropertyValue']       	= $dvDir . 'SMW_DV_Property.php';
	$wgAutoloadClasses['SMWURIValue']            	= $dvDir . 'SMW_DV_URI.php';
	$wgAutoloadClasses['SMWTypesValue']          	= $dvDir . 'SMW_DV_Types.php';
	$wgAutoloadClasses['SMWPropertyListValue']		= $dvDir . 'SMW_DV_PropertyList.php';
	$wgAutoloadClasses['SMWNumberValue']         	= $dvDir . 'SMW_DV_Number.php';
	$wgAutoloadClasses['SMWTemperatureValue']    	= $dvDir . 'SMW_DV_Temperature.php';
	$wgAutoloadClasses['SMWQuantityValue']         	= $dvDir . 'SMW_DV_Quantity.php';
	$wgAutoloadClasses['SMWTimeValue']           	= $dvDir . 'SMW_DV_Time.php';
	$wgAutoloadClasses['SMWBoolValue']           	= $dvDir . 'SMW_DV_Bool.php';
	$wgAutoloadClasses['SMWConceptValue']        	= $dvDir . 'SMW_DV_Concept.php';
	$wgAutoloadClasses['SMWImportValue']         	= $dvDir . 'SMW_DV_Import.php';

	// Export
	$expDir = $smwgIP . 'includes/export/';
	$wgAutoloadClasses['SMWExporter']               = $expDir . 'SMW_Exporter.php';
	$wgAutoloadClasses['SMWExpData']                = $expDir . 'SMW_Exp_Data.php';
	$wgAutoloadClasses['SMWExpElement']             = $expDir . 'SMW_Exp_Element.php';
	$wgAutoloadClasses['SMWExpLiteral']             = $expDir . 'SMW_Exp_Element.php';
	$wgAutoloadClasses['SMWExpResource']            = $expDir . 'SMW_Exp_Element.php';
	$wgAutoloadClasses['SMWExpNsResource']          = $expDir . 'SMW_Exp_Element.php';
	$wgAutoloadClasses['SMWExportController']		= $expDir . 'SMW_ExportController.php';
	$wgAutoloadClasses['SMWSerializer']	        	= $expDir . 'SMW_Serializer.php';
	$wgAutoloadClasses['SMWRDFXMLSerializer']       = $expDir . 'SMW_Serializer_RDFXML.php';
	$wgAutoloadClasses['SMWTurtleSerializer']       = $expDir . 'SMW_Serializer_Turtle.php';

	// Parameter classes
	$parDir = $smwgIP . 'includes/params/';
	$wgAutoloadClasses['SMWParamFormat']			= $parDir . 'SMW_ParamFormat.php';
	
	// Parser hooks
	$phDir = $smwgIP . 'includes/parserhooks/';
	$wgAutoloadClasses['SMWAsk']                    = $phDir . 'SMW_Ask.php';
	$wgAutoloadClasses['SMWShow']                   = $phDir . 'SMW_Show.php';
	$wgAutoloadClasses['SMWInfo']                   = $phDir . 'SMW_Info.php';
	$wgAutoloadClasses['SMWSubobject']              = $phDir . 'SMW_Subobject.php';
	$wgAutoloadClasses['SMWConcept']                = $phDir . 'SMW_Concept.php';
	$wgAutoloadClasses['SMWSet']                    = $phDir . 'SMW_Set.php';
	$wgAutoloadClasses['SMWSetRecurringEvent']      = $phDir . 'SMW_SetRecurringEvent.php';
	$wgAutoloadClasses['SMWDeclare']                = $phDir . 'SMW_Declare.php';
	$wgAutoloadClasses['SMWSMWDoc']                 = $phDir . 'SMW_SMWDoc.php';
	
	// Stores & queries
	$wgAutoloadClasses['SMWQueryProcessor']         = $smwgIP . 'includes/SMW_QueryProcessor.php';
	$wgAutoloadClasses['SMWQueryParser']            = $smwgIP . 'includes/SMW_QueryParser.php';

	$wgAutoloadClasses['SMWSparqlDatabase']         = $smwgIP . 'includes/sparql/SMW_SparqlDatabase.php';
	$wgAutoloadClasses['SMWSparqlDatabase4Store']   = $smwgIP . 'includes/sparql/SMW_SparqlDatabase4Store.php';
	$wgAutoloadClasses['SMWSparqlDatabaseError']    = $smwgIP . 'includes/sparql/SMW_SparqlDatabase.php';
	$wgAutoloadClasses['SMWSparqlResultWrapper']    = $smwgIP . 'includes/sparql/SMW_SparqlResultWrapper.php';
	$wgAutoloadClasses['SMWSparqlResultParser']     = $smwgIP . 'includes/sparql/SMW_SparqlResultParser.php';

	$stoDir = $smwgIP . 'includes/storage/';
	$wgAutoloadClasses['SMWQuery']                  = $stoDir . 'SMW_Query.php';
	$wgAutoloadClasses['SMWQueryResult']            = $stoDir . 'SMW_QueryResult.php';
	$wgAutoloadClasses['SMWStore']                  = $stoDir . 'SMW_Store.php';
	$wgAutoloadClasses['SMWStringCondition']        = $stoDir . 'SMW_Store.php';
	$wgAutoloadClasses['SMWRequestOptions']         = $stoDir . 'SMW_Store.php';
	$wgAutoloadClasses['SMWPrintRequest']           = $stoDir . 'SMW_PrintRequest.php';
	$wgAutoloadClasses['SMWThingDescription']       = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWClassDescription']       = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWConceptDescription']     = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWNamespaceDescription']   = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWValueDescription']       = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWConjunction']            = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWDisjunction']            = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWSomeProperty']           = $stoDir . 'SMW_Description.php';
	$wgAutoloadClasses['SMWSQLStore2']              = $stoDir . 'SMW_SQLStore2.php';
	$wgAutoloadClasses['SMWSqlStubSemanticData']    = $stoDir . 'SMW_SqlStubSemanticData.php';
	$wgAutoloadClasses['SMWSqlStore2IdCache']       = $stoDir . 'SMW_SqlStore2IdCache.php';
	$wgAutoloadClasses['SMWSQLStore2Table']         = $stoDir . 'SMW_SQLStore2Table.php';
	$wgAutoloadClasses['SMWSQLHelpers']             = $stoDir . 'SMW_SQLHelpers.php';
	$wgAutoloadClasses['SMWSparqlStore']            = $stoDir . 'SMW_SparqlStore.php';
	$wgAutoloadClasses['SMWSparqlStoreQueryEngine'] = $stoDir . 'SMW_SparqlStoreQueryEngine.php';

	// Special pages and closely related helper classes
	$specDir = $smwgIP . 'specials/';
	$wgAutoloadClasses['SMWQueryPage']                 = $specDir . 'QueryPages/SMW_QueryPage.php';
	$wgAutoloadClasses['SMWAskPage']                   = $specDir . 'AskSpecial/SMW_SpecialAsk.php';
	$wgAutoloadClasses['SMWQueryUIHelper']             = $specDir . 'AskSpecial/SMW_QueryUIHelper.php';
	$wgAutoloadClasses['SMWQueryUI']                   = $specDir . 'AskSpecial/SMW_QueryUI.php';
	$wgAutoloadClasses['SMWQueryCreatorPage']          = $specDir . 'AskSpecial/SMW_SpecialQueryCreator.php';
	$wgAutoloadClasses['SMWSpecialBrowse']             = $specDir . 'SearchTriple/SMW_SpecialBrowse.php';
	$wgAutoloadClasses['SMWPageProperty']              = $specDir . 'SearchTriple/SMW_SpecialPageProperty.php';
	$wgAutoloadClasses['SMWSearchByProperty']          = $specDir . 'SearchTriple/SMW_SpecialSearchByProperty.php';
	$wgAutoloadClasses['SMWURIResolver']               = $specDir . 'URIResolver/SMW_SpecialURIResolver.php';
	$wgAutoloadClasses['SMWAdmin']                     = $specDir . 'SMWAdmin/SMW_SpecialSMWAdmin.php';
	$wgAutoloadClasses['SMWSpecialSemanticStatistics'] = $specDir . 'Statistics/SMW_SpecialStatistics.php';
	$wgAutoloadClasses['SMWSpecialOWLExport']          = $specDir . 'Export/SMW_SpecialOWLExport.php';
	$wgAutoloadClasses['SMWSpecialProperties']         = $specDir . 'QueryPages/SMW_SpecialProperties.php';
	$wgAutoloadClasses['SMWSpecialTypes']              = $specDir . 'QueryPages/SMW_SpecialTypes.php';
	$wgAutoloadClasses['SMWSpecialUnusedProperties']   = $specDir . 'QueryPages/SMW_SpecialUnusedProperties.php';
	$wgAutoloadClasses['SMWSpecialWantedProperties']   = $specDir . 'QueryPages/SMW_SpecialWantedProperties.php';

	// Jobs
	$wgJobClasses['SMWUpdateJob']       = 'SMWUpdateJob';
	$wgAutoloadClasses['SMWUpdateJob']  = $smwgIP . 'includes/jobs/SMW_UpdateJob.php';
	$wgJobClasses['SMWRefreshJob']      = 'SMWRefreshJob';
	$wgAutoloadClasses['SMWRefreshJob'] = $smwgIP . 'includes/jobs/SMW_RefreshJob.php';

	// API modules
	$wgAutoloadClasses['ApiSMWQuery'] = $smwgIP . 'includes/api/ApiSMWQuery.php';
	$wgAutoloadClasses['ApiAsk'] = $smwgIP . 'includes/api/ApiAsk.php';
	$wgAutoloadClasses['ApiAskArgs'] = $smwgIP . 'includes/api/ApiAskArgs.php';
	$wgAutoloadClasses['ApiSMWInfo'] = $smwgIP . 'includes/api/ApiSMWInfo.php';

	// Maintenance scripts
	$wgAutoloadClasses['SMWSetupScript'] = $smwgIP . 'maintenance/SMW_setup.php';
	
	// Other extensions
	$wgAutoloadClasses['SMWPageSchemas'] = $smwgIP . 'includes/SMW_PageSchemas.php';
}

/**
 * Register all SMW special pages with MediaWiki.
 */
function smwfRegisterSpecialPages() {
	global $wgSpecialPages, $wgSpecialPageGroups;

	$wgSpecialPages['Ask']                          = 'SMWAskPage';
	$wgSpecialPageGroups['Ask']                     = 'smw_group';

	$wgSpecialPages['QueryCreator']                 = 'SMWQueryCreatorPage';
	$wgSpecialPageGroups['QueryCreator']            = 'smw_group';

	$wgSpecialPages['Browse']                       = 'SMWSpecialBrowse';
	$wgSpecialPageGroups['Browse']                  = 'smw_group';

	$wgSpecialPages['PageProperty']                 = 'SMWPageProperty';
	$wgSpecialPageGroups['PageProperty']            = 'smw_group';

	$wgSpecialPages['SearchByProperty']             = 'SMWSearchByProperty';
	$wgSpecialPageGroups['SearchByProperty']        = 'smw_group';

	$wgSpecialPages['URIResolver']                  = 'SMWURIResolver';

	$wgSpecialPages['SMWAdmin']                     = 'SMWAdmin';
	$wgSpecialPageGroups['SMWAdmin']                = 'smw_group';

	$wgSpecialPages['SemanticStatistics']           = 'SMWSpecialSemanticStatistics';
	$wgSpecialPageGroups['SemanticStatistics']      = 'wiki'; // Similar to Special:Statistics

	$wgSpecialPages['ExportRDF']                    = 'SMWSpecialOWLExport';
	$wgSpecialPageGroups['ExportRDF']               = 'smw_group';

	$wgSpecialPages['Properties']                   = 'SMWSpecialProperties';
	$wgSpecialPageGroups['Properties']              = 'pages';

	$wgSpecialPages['Types']                        = 'SMWSpecialTypes';
	$wgSpecialPageGroups['Types']                   = 'pages';

	$wgSpecialPages['UnusedProperties']             = 'SMWSpecialUnusedProperties';
	$wgSpecialPageGroups['UnusedProperties']        = 'maintenance';

	$wgSpecialPages['WantedProperties']             = 'SMWSpecialWantedProperties';
	$wgSpecialPageGroups['WantedProperties']        = 'maintenance';
}

/**
 * Do the actual intialisation of the extension. This is just a delayed init
 * that makes sure MediaWiki is set up properly before we add our stuff.
 *
 * The main things this function does are: register all hooks, set up extension
 * credits, and init some globals that are not for configuration settings.
 */
function smwfSetupExtension() {
	wfProfileIn( 'smwfSetupExtension (SMW)' );
	global $smwgIP, $smwgScriptPath, $wgFooterIcons, $smwgMasterStore, $smwgIQRunningNumber;

	$smwgMasterStore = null;
	$smwgIQRunningNumber = 0;

	///// register hooks /////
	require_once( $smwgIP . 'includes/SMW_RefreshTab.php' );
	
	if ( isset($wgFooterIcons["poweredby"])
	  && isset($wgFooterIcons["poweredby"]["semanticmediawiki"])
	  && is_null( $wgFooterIcons["poweredby"]["semanticmediawiki"]["src"] ) ) {
		$wgFooterIcons["poweredby"]["semanticmediawiki"]["src"] = "$smwgScriptPath/skins/images/smw_button.png";
	}

	wfProfileOut( 'smwfSetupExtension (SMW)' );
	return true;
}

/**********************************************/
/***** namespace settings                 *****/
/**********************************************/

/**
 * Init the additional namespaces used by Semantic MediaWiki.
 */
function smwfInitNamespaces() {
	global $smwgNamespaceIndex, $wgExtraNamespaces, $wgNamespaceAliases, $wgNamespacesWithSubpages, $wgLanguageCode, $smwgContLang;

	if ( !isset( $smwgNamespaceIndex ) ) {
		$smwgNamespaceIndex = 100;
	}
	// 100 and 101 used to be occupied by SMW's now obsolete namespaces "Relation" and "Relation_Talk"
	define( 'SMW_NS_PROPERTY',       $smwgNamespaceIndex + 2 );
	define( 'SMW_NS_PROPERTY_TALK',  $smwgNamespaceIndex + 3 );
	define( 'SMW_NS_TYPE',           $smwgNamespaceIndex + 4 );
	define( 'SMW_NS_TYPE_TALK',      $smwgNamespaceIndex + 5 );
	// 106 and 107 are occupied by the Semantic Forms, we define them here to offer some (easy but useful) support to SF
	define( 'SF_NS_FORM',            $smwgNamespaceIndex + 6 );
	define( 'SF_NS_FORM_TALK',       $smwgNamespaceIndex + 7 );
	define( 'SMW_NS_CONCEPT',        $smwgNamespaceIndex + 8 );
	define( 'SMW_NS_CONCEPT_TALK',   $smwgNamespaceIndex + 9 );

	smwfInitContentLanguage( $wgLanguageCode );

	// Register namespace identifiers
	if ( !is_array( $wgExtraNamespaces ) ) {
		$wgExtraNamespaces = array();
	}
	$wgExtraNamespaces = $wgExtraNamespaces + $smwgContLang->getNamespaces();
	$wgNamespaceAliases = $wgNamespaceAliases + $smwgContLang->getNamespaceAliases();

	// Support subpages only for talk pages by default
	$wgNamespacesWithSubpages = $wgNamespacesWithSubpages + array(
				SMW_NS_PROPERTY_TALK => true,
				SMW_NS_TYPE_TALK => true
	);

	// not modified for Semantic MediaWiki
	/* $wgNamespacesToBeSearchedDefault = array(
		NS_MAIN           => true,
		);
	*/
}

/**********************************************/
/***** language settings                  *****/
/**********************************************/

/**
 * Initialise a global language object for content language. This must happen
 * early on, even before user language is known, to determine labels for
 * additional namespaces. In contrast, messages can be initialised much later
 * when they are actually needed.
 */
function smwfInitContentLanguage( $langcode ) {
	global $smwgIP, $smwgContLang;

	if ( !empty( $smwgContLang ) ) {
		return;
	}
	wfProfileIn( 'smwfInitContentLanguage (SMW)' );

	$smwContLangFile = 'SMW_Language' . str_replace( '-', '_', ucfirst( $langcode ) );
	$smwContLangClass = 'SMWLanguage' . str_replace( '-', '_', ucfirst( $langcode ) );

	if ( file_exists( $smwgIP . 'languages/' . $smwContLangFile . '.php' ) ) {
		include_once( $smwgIP . 'languages/' . $smwContLangFile . '.php' );
	}

	// Fallback if language not supported.
	if ( !class_exists( $smwContLangClass ) ) {
		include_once( $smwgIP . 'languages/SMW_LanguageEn.php' );
		$smwContLangClass = 'SMWLanguageEn';
	}

	$smwgContLang = new $smwContLangClass();

	wfProfileOut( 'smwfInitContentLanguage (SMW)' );
}
