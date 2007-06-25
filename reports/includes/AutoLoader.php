<?php

/* This defines autoloading handler for whole MediaWiki framework */

ini_set('unserialize_callback_func', '__autoload' );

function __autoload($className) {
	global $wgAutoloadClasses;

	static $localClasses = array(
		# Includes
		'AjaxDispatcher' => 'includes/AjaxDispatcher.php',
		'AjaxCachePolicy' => 'includes/AjaxFunctions.php',
		'AjaxResponse' => 'includes/AjaxResponse.php',
		'AlphabeticPager' => 'includes/Pager.php',
		'Article' => 'includes/Article.php',
		'AuthPlugin' => 'includes/AuthPlugin.php',
		'BagOStuff' => 'includes/BagOStuff.php',
		'HashBagOStuff' => 'includes/BagOStuff.php',
		'SqlBagOStuff' => 'includes/BagOStuff.php',
		'MediaWikiBagOStuff' => 'includes/BagOStuff.php',
		'TurckBagOStuff' => 'includes/BagOStuff.php',
		'APCBagOStuff' => 'includes/BagOStuff.php',
		'eAccelBagOStuff' => 'includes/BagOStuff.php',
		'XCacheBagOStuff' => 'includes/BagOStuff.php',
		'DBABagOStuff' => 'includes/BagOStuff.php',
		'Block' => 'includes/Block.php',
		'HTMLFileCache' => 'includes/HTMLFileCache.php',
		'DependencyWrapper' => 'includes/CacheDependency.php',
		'FileDependency' => 'includes/CacheDependency.php',
		'TitleDependency' => 'includes/CacheDependency.php',
		'TitleListDependency' => 'includes/CacheDependency.php',
		'CategoryPage' => 'includes/CategoryPage.php',
		'CategoryViewer' => 'includes/CategoryPage.php',
		'Categoryfinder' => 'includes/Categoryfinder.php',
		'RCCacheEntry' => 'includes/ChangesList.php',
		'ChangesList' => 'includes/ChangesList.php',
		'OldChangesList' => 'includes/ChangesList.php',
		'EnhancedChangesList' => 'includes/ChangesList.php',
		'CoreParserFunctions' => 'includes/CoreParserFunctions.php',
		'DBObject' => 'includes/Database.php',
		'Database' => 'includes/Database.php',
		'DatabaseMysql' => 'includes/Database.php',
		'ResultWrapper' => 'includes/Database.php',
		'DatabasePostgres' => 'includes/DatabasePostgres.php',
		'DatabaseOracle' => 'includes/DatabaseOracle.php',
		'DateFormatter' => 'includes/DateFormatter.php',
		'DifferenceEngine' => 'includes/DifferenceEngine.php',
		'_DiffOp' => 'includes/DifferenceEngine.php',
		'_DiffOp_Copy' => 'includes/DifferenceEngine.php',
		'_DiffOp_Delete' => 'includes/DifferenceEngine.php',
		'_DiffOp_Add' => 'includes/DifferenceEngine.php',
		'_DiffOp_Change' => 'includes/DifferenceEngine.php',
		'_DiffEngine' => 'includes/DifferenceEngine.php',
		'Diff' => 'includes/DifferenceEngine.php',
		'MappedDiff' => 'includes/DifferenceEngine.php',
		'DiffFormatter' => 'includes/DifferenceEngine.php',
		'DjVuImage' => 'includes/DjVuImage.php',
		'_HWLDF_WordAccumulator' => 'includes/DifferenceEngine.php',
		'WordLevelDiff' => 'includes/DifferenceEngine.php',
		'TableDiffFormatter' => 'includes/DifferenceEngine.php',
		'EditPage' => 'includes/EditPage.php',
		'MWException' => 'includes/Exception.php',
		'Exif' => 'includes/Exif.php',
		'FormatExif' => 'includes/Exif.php',
		'WikiExporter' => 'includes/Export.php',
		'XmlDumpWriter' => 'includes/Export.php',
		'DumpOutput' => 'includes/Export.php',
		'DumpFileOutput' => 'includes/Export.php',
		'DumpPipeOutput' => 'includes/Export.php',
		'DumpGZipOutput' => 'includes/Export.php',
		'DumpBZip2Output' => 'includes/Export.php',
		'Dump7ZipOutput' => 'includes/Export.php',
		'DumpFilter' => 'includes/Export.php',
		'DumpNotalkFilter' => 'includes/Export.php',
		'DumpNamespaceFilter' => 'includes/Export.php',
		'DumpLatestFilter' => 'includes/Export.php',
		'DumpMultiWriter' => 'includes/Export.php',
		'ExternalEdit' => 'includes/ExternalEdit.php',
		'ExternalStore' => 'includes/ExternalStore.php',
		'ExternalStoreDB' => 'includes/ExternalStoreDB.php',
		'ExternalStoreHttp' => 'includes/ExternalStoreHttp.php',
		'FakeTitle' => 'includes/FakeTitle.php',
		'FeedItem' => 'includes/Feed.php',
		'ChannelFeed' => 'includes/Feed.php',
		'RSSFeed' => 'includes/Feed.php',
		'AtomFeed' => 'includes/Feed.php',
		'FileStore' => 'includes/FileStore.php',
		'FSException' => 'includes/FileStore.php',
		'FSTransaction' => 'includes/FileStore.php',
		'HTMLForm' => 'includes/HTMLForm.php',
		'HistoryBlob' => 'includes/HistoryBlob.php',
		'ConcatenatedGzipHistoryBlob' => 'includes/HistoryBlob.php',
		'HistoryBlobStub' => 'includes/HistoryBlob.php',
		'HistoryBlobCurStub' => 'includes/HistoryBlob.php',
		'HTMLCacheUpdate' => 'includes/HTMLCacheUpdate.php',
		'Http' => 'includes/HttpFunctions.php',
		'IP' => 'includes/IP.php',
		'ThumbnailImage' => 'includes/Image.php',
		'ImageGallery' => 'includes/ImageGallery.php',
		'ImagePage' => 'includes/ImagePage.php',
		'ImageHistoryList' => 'includes/ImagePage.php',
		'ImageRemote' => 'includes/ImageRemote.php',
		'Job' => 'includes/JobQueue.php',
		'EmaillingJob' => 'includes/EmaillingJob.php',
		'EnotifNotifyJob' => 'includes/EnotifNotifyJob.php',
		'HTMLCacheUpdateJob' => 'includes/HTMLCacheUpdate.php',
		'RefreshLinksJob' => 'includes/RefreshLinksJob.php',
		'Licenses' => 'includes/Licenses.php',
		'License' => 'includes/Licenses.php',
		'LinkBatch' => 'includes/LinkBatch.php',
		'LinkCache' => 'includes/LinkCache.php',
		'LinkFilter' => 'includes/LinkFilter.php',
		'Linker' => 'includes/Linker.php',
		'LinksUpdate' => 'includes/LinksUpdate.php',
		'LoadBalancer' => 'includes/LoadBalancer.php',
		'LogPage' => 'includes/LogPage.php',
		'MacBinary' => 'includes/MacBinary.php',
		'MagicWord' => 'includes/MagicWord.php',
		'MathRenderer' => 'includes/Math.php',
		'MediaTransformOutput' => 'includes/MediaTransformOutput.php',
		'ThumbnailImage' => 'includes/MediaTransformOutput.php',
		'MediaTransformError' => 'includes/MediaTransformOutput.php',
		'TransformParameterError' => 'includes/MediaTransformOutput.php',
		'MessageCache' => 'includes/MessageCache.php',
		'MimeMagic' => 'includes/MimeMagic.php',
		'Namespace' => 'includes/Namespace.php',
		'FakeMemCachedClient' => 'includes/ObjectCache.php',
		'OutputPage' => 'includes/OutputPage.php',
		'PageHistory' => 'includes/PageHistory.php',
		'IndexPager' => 'includes/Pager.php',
		'ReverseChronologicalPager' => 'includes/Pager.php',
		'TablePager' => 'includes/Pager.php',
		'Parser' => 'includes/Parser.php',
		'ParserOutput' => 'includes/ParserOutput.php',
		'ParserOptions' => 'includes/ParserOptions.php',
		'ParserCache' => 'includes/ParserCache.php',
		'PatrolLog' => 'includes/PatrolLog.php',
		'ProfilerSimple' => 'includes/ProfilerSimple.php',
		'ProfilerSimpleUDP' => 'includes/ProfilerSimpleUDP.php',
		'Profiler' => 'includes/Profiler.php',
		'ProxyTools' => 'includes/ProxyTools.php',
		'ProtectionForm' => 'includes/ProtectionForm.php',
		'QueryPage' => 'includes/QueryPage.php',
		'PageQueryPage' => 'includes/PageQueryPage.php',
		'ImageQueryPage' => 'includes/ImageQueryPage.php',
		'RawPage' => 'includes/RawPage.php',
		'RecentChange' => 'includes/RecentChange.php',
		'Revision' => 'includes/Revision.php',
		'Sanitizer' => 'includes/Sanitizer.php',
		'SearchEngine' => 'includes/SearchEngine.php',
		'SearchResultSet' => 'includes/SearchEngine.php',
		'SearchResult' => 'includes/SearchEngine.php',
		'SearchEngineDummy' => 'includes/SearchEngine.php',
		'SearchMySQL' => 'includes/SearchMySQL.php',
		'MySQLSearchResultSet' => 'includes/SearchMySQL.php',
		'SearchMySQL4' => 'includes/SearchMySQL4.php',
		'SearchPostgres' => 'includes/SearchPostgres.php',
		'SearchUpdate' => 'includes/SearchUpdate.php',
		'SearchUpdateMyISAM' => 'includes/SearchUpdate.php',
		'SearchOracle' => 'includes/SearchOracle.php',
		'SiteConfiguration' => 'includes/SiteConfiguration.php',
		'SiteStats' => 'includes/SiteStats.php',
		'SiteStatsUpdate' => 'includes/SiteStats.php',
		'Skin' => 'includes/Skin.php',
		'MediaWiki_I18N' => 'includes/SkinTemplate.php',
		'SkinTemplate' => 'includes/SkinTemplate.php',
		'QuickTemplate' => 'includes/SkinTemplate.php',
		'SpecialAllpages' => 'includes/SpecialAllpages.php',
		'IPBlockForm' => 'includes/SpecialBlockip.php',
		'SpecialBookSources' => 'includes/SpecialBooksources.php',
		'EmailConfirmation' => 'includes/SpecialConfirmemail.php',
		'ContributionsPage' => 'includes/SpecialContributions.php',
		'DisambiguationsPage' => 'includes/SpecialDisambiguations.php',
		'EmailUserForm' => 'includes/SpecialEmailuser.php',
		'WikiRevision' => 'includes/SpecialImport.php',
		'WikiImporter' => 'includes/SpecialImport.php',
		'ImportStringSource' => 'includes/SpecialImport.php',
		'ImportStreamSource' => 'includes/SpecialImport.php',
		'IPUnblockForm' => 'includes/SpecialIpblocklist.php',
		'DBLockForm' => 'includes/SpecialLockdb.php',
		'LogReader' => 'includes/SpecialLog.php',
		'LogViewer' => 'includes/SpecialLog.php',
		'MIMEsearchPage' => 'includes/SpecialMIMEsearch.php',
		'MostcategoriesPage' => 'includes/SpecialMostcategories.php',
		'MostimagesPage' => 'includes/SpecialMostimages.php',
		'MostrevisionsPage' => 'includes/SpecialMostrevisions.php',
		'FewestrevisionsPage' => 'includes/SpecialFewestrevisions.php',
		'MovePageForm' => 'includes/SpecialMovepage.php',
		'NewbieContributionsPage' => 'includes/SpecialNewbieContributions.php',
		'SpecialNewPages' => 'includes/SpecialNewpages.php',
		'NewPagesPager' => 'includes/NewPagesPager.php',
		'SpecialPage' => 'includes/SpecialPage.php',
		'UnlistedSpecialPage' => 'includes/SpecialPage.php',
		'IncludableSpecialPage' => 'includes/SpecialPage.php',
		'SpecialRedirect' => 'includes/SpecialRedirect.php',
		'SpecialSpecialPages' => 'includes/SpecialSpecialpages.php',
		'PreferencesForm' => 'includes/SpecialPreferences.php',
		'SpecialPrefixindex' => 'includes/SpecialPrefixindex.php',
		'PasswordResetForm' => 'includes/SpecialResetpass.php',
		'RevisionDeleteForm' => 'includes/SpecialRevisiondelete.php',
		'RevisionDeleter' => 'includes/SpecialRevisiondelete.php',
		'SpecialSearch' => 'includes/SpecialSearch.php',
		'PageArchive' => 'includes/SpecialUndelete.php',
		'UndeleteForm' => 'includes/SpecialUndelete.php',
		'DBUnlockForm' => 'includes/SpecialUnlockdb.php',
		'UnusedCategoriesPage' => 'includes/SpecialUnusedcategories.php',
		'UnusedimagesPage' => 'includes/SpecialUnusedimages.php',
		'UnusedtemplatesPage' => 'includes/SpecialUnusedtemplates.php',
		'UploadForm' => 'includes/SpecialUpload.php',
		'UploadFormMogile' => 'includes/SpecialUploadMogile.php',
		'LoginForm' => 'includes/SpecialUserlogin.php',
		'UserrightsForm' => 'includes/SpecialUserrights.php',
		'SpecialVersion' => 'includes/SpecialVersion.php',
		'WhatLinksHerePage' => 'includes/SpecialWhatlinkshere.php',
		'SquidUpdate' => 'includes/SquidUpdate.php',
		'ReplacementArray' => 'includes/StringUtils.php',
		'Replacer' => 'includes/StringUtils.php',
		'RegexlikeReplacer' => 'includes/StringUtils.php',
		'DoubleReplacer' => 'includes/StringUtils.php',
		'HashtableReplacer' => 'includes/StringUtils.php',
		'StringUtils' => 'includes/StringUtils.php',
		'Title' => 'includes/Title.php',
		'User' => 'includes/User.php',
		'MailAddress' => 'includes/UserMailer.php',
		'EmailNotification' => 'includes/UserMailer.php',
		'WatchedItem' => 'includes/WatchedItem.php',
		'WebRequest' => 'includes/WebRequest.php',
		'WebResponse' => 'includes/WebResponse.php',
		'FauxRequest' => 'includes/WebRequest.php',
		'MediaWiki' => 'includes/Wiki.php',
		'WikiError' => 'includes/WikiError.php',
		'WikiErrorMsg' => 'includes/WikiError.php',
		'WikiXmlError' => 'includes/WikiError.php',
		'Xml' => 'includes/Xml.php',
		'ZhClient' => 'includes/ZhClient.php',
		'memcached' => 'includes/memcached-client.php',
		'EmaillingJob' => 'includes/JobQueue.php',

		# filerepo
		'ArchivedFile' => 'includes/filerepo/ArchivedFile.php',
		'File' => 'includes/filerepo/File.php',
		'FileRepo' => 'includes/filerepo/FileRepo.php',
		'ForeignDBFile' => 'includes/filerepo/ForeignDBFile.php',
		'ForeignDBRepo' => 'includes/filerepo/ForeignDBRepo.php',
		'FSRepo' => 'includes/filerepo/FSRepo.php',
		'Image' => 'includes/filerepo/LocalFile.php',
		'LocalFile' => 'includes/filerepo/LocalFile.php',
		'LocalRepo' => 'includes/filerepo/LocalRepo.php',
		'OldLocalFile' => 'includes/filerepo/OldLocalFile.php',
		'RepoGroup' => 'includes/filerepo/RepoGroup.php',
		'UnregisteredLocalFile' => 'includes/filerepo/UnregisteredLocalFile.php',

		# Media
		'BitmapHandler' => 'includes/media/Bitmap.php',
		'BmpHandler' => 'includes/media/BMP.php',
		'DjVuHandler' => 'includes/media/DjVu.php',
		'MediaHandler' => 'includes/media/Generic.php',
		'ImageHandler' => 'includes/media/Generic.php',
		'SvgHandler' => 'includes/media/SVG.php',

		# Normal
		'UtfNormal' => 'includes/normal/UtfNormal.php',

		# Templates
		'UsercreateTemplate' => 'includes/templates/Userlogin.php',
		'UserloginTemplate' => 'includes/templates/Userlogin.php',

		# Languages
		'Language' => 'languages/Language.php',
		'RandomPage' => 'includes/SpecialRandompage.php',
		
		# Reports
		'Report' => 'includes/reports/Report.php',
		'ReportCache' => 'includes/reports/ReportCache.php',
		'ReportPager' => 'includes/reports/ReportPager.php',
		'CachedReportPager' => 'includes/reports/CachedReportPager.php',
		
		'AncientPagesReport' => 'includes/reports/AncientPagesReport.php',
		'BrokenRedirectsReport' => 'includes/reports/BrokenRedirectsReport.php',
		'DeadEndPagesReport' => 'includes/reports/DeadEndPagesReport.php',
		'DoubleRedirectsReport' => 'includes/reports/DoubleRedirectsReport.php',
		'LargestCategoriesReport' => 'includes/reports/LargestCategoriesReport.php',
		'LongPagesReport' => 'includes/reports/LongPagesReport.php',
		'MostLinkedPagesReport' => 'includes/reports/MostLinkedPagesReport.php',
		'MostUsedTemplatesReport' => 'includes/reports/MostUsedTemplatesReport.php',
		'OrphanedPagesReport' => 'includes/reports/OrphanedPagesReport.php',
		'PopularPagesReport' => 'includes/reports/PopularPagesReport.php',
		'RedirectReport' => 'includes/reports/RedirectReport.php',
		'ShortPagesReport' => 'includes/reports/ShortPagesReport.php',
		'UncategorisedPagesReport' => 'includes/reports/UncategorisedPagesReport.php',
		'UnwatchedPagesReport' => 'includes/reports/UnwatchedPagesReport.php',
		'WantedCategoriesReport' => 'includes/reports/WantedCategoriesReport.php',
		'WantedPagesReport' => 'includes/reports/WantedPagesReport.php',
		'WithoutInterwikiReport' => 'includes/reports/WithoutInterwikiReport.php',

		# API
		'ApiBase' => 'includes/api/ApiBase.php',
		'ApiFormatFeedWrapper' => 'includes/api/ApiFormatBase.php',
		'ApiFeedWatchlist' => 'includes/api/ApiFeedWatchlist.php',
		'ApiFormatBase' => 'includes/api/ApiFormatBase.php',
		'Services_JSON' => 'includes/api/ApiFormatJson_json.php',
		'ApiFormatJson' => 'includes/api/ApiFormatJson.php',
		'ApiFormatPhp' => 'includes/api/ApiFormatPhp.php',
		'ApiFormatWddx' => 'includes/api/ApiFormatWddx.php',
		'ApiFormatXml' => 'includes/api/ApiFormatXml.php',
		'Spyc' => 'includes/api/ApiFormatYaml_spyc.php',
		'ApiFormatYaml' => 'includes/api/ApiFormatYaml.php',
		'ApiHelp' => 'includes/api/ApiHelp.php',
		'ApiLogin' => 'includes/api/ApiLogin.php',
		'ApiMain' => 'includes/api/ApiMain.php',
		'ApiOpenSearch' => 'includes/api/ApiOpenSearch.php',
		'ApiPageSet' => 'includes/api/ApiPageSet.php',
		'ApiQuery' => 'includes/api/ApiQuery.php',
		'ApiQueryAllpages' => 'includes/api/ApiQueryAllpages.php',
		'ApiQueryBase' => 'includes/api/ApiQueryBase.php',
		'ApiQueryGeneratorBase' => 'includes/api/ApiQueryBase.php',
		'ApiQueryBacklinks' => 'includes/api/ApiQueryBacklinks.php',
		'ApiQueryCategories' => 'includes/api/ApiQueryCategories.php',
		'ApiQueryCategoryMembers' => 'includes/api/ApiQueryCategoryMembers.php',
		'ApiQueryContributions' => 'includes/api/ApiQueryUserContributions.php',
		'ApiQueryExternalLinks' => 'includes/api/ApiQueryExternalLinks.php',
		'ApiQueryImages' => 'includes/api/ApiQueryImages.php',
		'ApiQueryInfo' => 'includes/api/ApiQueryInfo.php',
		'ApiQueryLangLinks' => 'includes/api/ApiQueryLangLinks.php',
		'ApiQueryLinks' => 'includes/api/ApiQueryLinks.php',
		'ApiQueryLogEvents' => 'includes/api/ApiQueryLogEvents.php',
		'ApiQueryRecentChanges'=> 'includes/api/ApiQueryRecentChanges.php',
		'ApiQueryRevisions' => 'includes/api/ApiQueryRevisions.php',
		'ApiQuerySiteinfo' => 'includes/api/ApiQuerySiteinfo.php',
		'ApiQueryWatchlist' => 'includes/api/ApiQueryWatchlist.php',
		'ApiResult' => 'includes/api/ApiResult.php',
	);
	
	wfProfileIn( __METHOD__ );
	if ( isset( $localClasses[$className] ) ) {
		$filename = $localClasses[$className];
	} elseif ( isset( $wgAutoloadClasses[$className] ) ) {
		$filename = $wgAutoloadClasses[$className];
	} else {
		# Try a different capitalisation
		# The case can sometimes be wrong when unserializing PHP 4 objects
		$filename = false;
		$lowerClass = strtolower( $className );
		foreach ( $localClasses as $class2 => $file2 ) {
			if ( strtolower( $class2 ) == $lowerClass ) {
				$filename = $file2;
			}
		}
		if ( !$filename ) {
			# Give up
			wfProfileOut( __METHOD__ );
			return;
		}
	}

	# Make an absolute path, this improves performance by avoiding some stat calls
	if ( substr( $filename, 0, 1 ) != '/' && substr( $filename, 1, 1 ) != ':' ) {
		global $IP;
		$filename = "$IP/$filename";
	}
	require( $filename );
	wfProfileOut( __METHOD__ );
}

function wfLoadAllExtensions() {
	global $wgAutoloadClasses;

	# It is crucial that SpecialPage.php is included before any special page 
	# extensions are loaded. Otherwise the parent class will not be available
	# when APC loads the early-bound extension class. Normally this is 
	# guaranteed by entering special pages via SpecialPage members such as 
	# executePath(), but here we have to take a more explicit measure.
	
	require_once( dirname(__FILE__) . '/SpecialPage.php' );
	
	foreach( $wgAutoloadClasses as $class => $file ) {
		if( !( class_exists( $class ) || interface_exists( $class ) ) ) {
			require( $file );
		}
	}
}

?>
