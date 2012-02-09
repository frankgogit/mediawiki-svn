<?php
if ( !defined( 'MEDIAWIKI' ) ) die();
/**
 * @file
 * @ingroup Extensions
 */

/**
 * Array mapping all editable settings to their type depending of their section
 * First two keys will be used to show sections
 * These settings are more or less in the same order as
 * http://www.mediawiki.org/wiki/Manual:Configuration_settings
 */
$settings = array(
	'site' => array(
		'site' => array(
			'wgSitename' => 'text',
			'wgLogo' => 'image-url',
			'wgSiteNotice' => 'text',
			'wgExtraSubtitle' => 'text',
			'wgSiteSupportPage' => 'text',
			'wgStyleVersion' => 'int',
		),
	),
	'features' => array(
		'features' => array(
			'wgUseExternalEditor' => 'bool',
			'wgUniversalEditButton' => 'bool',
			'wgPageShowWatchingUsers' => 'bool',
			'wgEdititis' => 'bool',
			'wgShowHostnames' => 'bool',
			'wgAllUnicodeFixes' => 'bool',
			'wgFixArabicUnicode' => 'bool',
			'wgFixMalayalamUnicode' => 'bool',
			'wgFixDoubleRedirects' => 'bool',
			'wgEnableAPI' => 'bool',
			'wgEnableWriteAPI' => 'bool',
			'wgUseAutomaticEditSummaries' => 'bool',
			'wgUseCombinedLoginLink' => 'bool',
			'wgUseTagFilter' => 'bool',
			'wgUseTrackbacks' => 'bool',
			'wgCommandLineDarkBg' => 'bool',
			'wgUpgradeKey' => 'text',
		),
		'ajax' => array(
			'wgUseAjax' => 'bool',
			'wgAjaxUploadDestCheck' => 'bool',
			'wgAjaxWatch' => 'bool',
			'wgCrossSiteAJAXdomains' => 'array',
			'wgCrossSiteAJAXdomainExceptions' => 'array',
			#'wgLivePreview' => 'bool', // Maybe this'll be back in a moment
		),
		'css-js' => array(
			'wgAllowUserCss' => 'bool',
			'wgAllowUserJs' => 'bool',
			'wgUseSiteCss' => 'bool',
			'wgUseSiteJs' => 'bool',
			'wgHandheldStyle' => 'text',
			'wgHandheldForIPhone' => 'bool',
			'wgIncludeLegacyJavaScript' => 'bool',
			'wgLegacyJavaScriptGlobals' => 'bool',
		),
		'resourceloader' => array(
			'wgResourceBasePath' => 'text',
			'wgResourceLoaderDebug' => 'bool',
			'wgResourceLoaderInlinePrivateModules' => 'bool',
			'wgResourceLoaderMaxage' => 'array',
			'wgResourceLoaderMaxQueryLength' => 'int',
			'wgResourceLoaderMinifierMaxLineLength' => 'int',
			'wgResourceLoaderMinifierStatementsOnOwnLine' => 'bool',
			'wgResourceLoaderUseESI' => 'bool',
			'wgResourceLoaderValidateJS' => 'bool',
			'wgResourceLoaderValidateStaticJS' => 'bool',
		),
		'performance' => array(
			'wgAPICacheHelpTimeout' => 'int',
			'wgAPIMaxDBRows' => 'int',
			'wgAPIMaxResultSize' => 'int',
			'wgAPIMaxUncachedDiffs' => 'int',
			'wgDisableQueryPages' => 'bool',
			'wgDisableQueryPageUpdate' => 'array',
			'wgDisableSearchUpdate' => 'bool',
			'wgDisableTextSearch' => 'bool',
			'wgMaximumMovedPages' => 'int',
			'wgMemoryLimit' => 'text',
			'wgMiserMode' => 'bool',
			'wgCompressRevisions' => 'bool',
			'wgUpdateRowsPerQuery' => 'int',
			'wgPoolCounterConf' => 'array',
		),
		'test' => array(
			'wgEnableSelenium' => 'bool',
			'wgSeleniumConfigFile' => 'text',
			'wgDBtestuser' => 'text',
			'wgDBtestpassword' => 'text',
			'wgEnableJavaScriptTest' => 'bool',
			'wgJavaScriptTestConfig' => 'array',
		),
	),
	'pages' => array(
		'pages' => array(
			'wgCapitalLinks' => 'bool',
			'wgMaxArticleSize' => 'int',
			'wgMaxRedirects' => 'int',
			'wgInvalidRedirectTargets' => 'array',
			'wgLegalTitleChars' => 'text',
		),
		'robots' => array(
			'wgArticleRobotPolicies' => 'array',
			'wgDefaultRobotPolicy' => 'text',
			'wgExemptFromUserRobotsControl' => 'array',
			'wgNoFollowLinks' => 'bool',
			'wgNoFollowDomainExceptions' => 'array',
		),
	),
	'namespaces' => array(
		'namespaces' => array(
			'wgCapitalLinkOverrides' => 'array',
			'wgContentNamespaces' => 'array',
			'wgExtraNamespaces' => 'array',
			'wgExtraGenderNamespaces' => 'array',
			'wgMetaNamespace' => 'text',
			'wgMetaNamespaceTalk' => 'text',
			'wgNamespaceAliases' => 'array',
			'wgNamespaceProtection' => 'array',
			'wgNamespaceRobotPolicies' => 'array',
			'wgNamespacesToBeSearchedDefault' => 'array',
			'wgNamespacesToBeSearchedHelp' => 'array',
			'wgNamespacesWithSubpages' => 'array',
			'wgNoFollowNsExceptions' => 'array',
			'wgNonincludableNamespaces' => 'array',
			'wgPreviewOnOpenNamespaces' => 'array',
			'wgSitemapNamespaces' => 'array',
			'wgSitemapNamespacesPriorities' => 'array',
		),
	),
	'groups' => array(
		'groups' => array(
			'wgAutopromote' => 'array',
			'wgAutopromoteOnce' => 'array',
			'wgImplicitGroups' => 'array',
			'wgGroupPermissions' => 'array',
			'wgRevokePermissions' => 'array',
			'wgAddGroups' => 'array',
			'wgRemoveGroups' => 'array',
			'wgGroupsAddToSelf' => 'array',
			'wgGroupsRemoveFromSelf' => 'array',
		),
	),
	'paths' => array(
		'paths' => array(
			'wgActionPaths' => 'array',
			'wgAppleTouchIcon' => 'text',
			'wgArticlePath' => 'text',
			'wgCanonicalServer' => 'text',
			'wgDeletedDirectory' => 'text',
			'wgFavicon' => 'text',
			'wgFooterIcons' => 'array',
			'wgLoadScript' => 'text',
			'wgRedirectScript' => 'text',
			'wgScript' => 'text',
			'wgScriptExtension' => 'text',
			'wgScriptPath' => 'text',
			'wgServer' => 'text',
			'wgStyleDirectory' => 'text',
			'wgStylePath' => 'text',
			'wgLocalStylePath' => 'text',
			'wgTmpDirectory' => 'text',
			'wgUploadBaseUrl' => 'text',
			'wgUploadDirectory' => 'text',
			'wgUploadNavigationUrl' => 'text',
			'wgUploadMissingFileUrl' => 'text',
			'wgUploadPath' => 'text',
			'wgUsePathInfo' => 'bool',
			'wgVariantArticlePath' => 'text',
			'wgUploadStashScalerBaseUrl' => 'text',
			'wgExtensionAssetsPath' => 'text',
		),
		'external-tools' => array(
			'wgDiff' => 'text',
			'wgDiff3' => 'text',
			'wgPhpCli' => 'text',
			'wgExternalDiffEngine' => 'text',
			'wgExiv2Command' => 'text',
		),
		'filesystem' => array(
			'wgDirectoryMode' => 'int',
			'wgMaxShellFileSize' => 'int',
			'wgMaxShellMemory' => 'int',
			'wgMaxShellTime' => 'int',
			'wgShellLocale' => 'text',
		),
	),
	'db' => array(
		'db' => array(
			'wgDBtype' => array( 'mysql' => 'MySQL', 'postgres' => 'PostreSQL' ),
			'wgDBname' => 'text',
			'wgDBuser' => 'text',
			'wgDBpassword' => 'text',
			'wgDBadminuser' => 'text',
			'wgDBadminpassword' => 'text',
			'wgDBserver' => 'text',
			'wgDBport' => 'int',
			'wgLocalDatabases' => 'array',
			'wgSearchType' => 'text',
			'wgSharedDB' => 'text',
			'wgSharedPrefix' => 'text',
			'wgSharedTables'  => 'array',
			'wgDBerrorLog' => 'text',
			'wgAntiLockFlags' => 'int',
			'wgAllDBsAreLocalhost' => 'bool',
			'wgDBAvgStatusPoll' => 'int',
			'wgUseDumbLinkUpdate' => 'bool',
			'wgExternalStores' => 'array',
			'wgSQLMode' => 'text',
			'wgAllowSchemaUpdates' => 'bool',
		),
		'load-balancing' => array(
			'wgDBClusterTimeout' => 'int',
			'wgDBservers' => 'array',
			'wgDefaultExternalStore' => 'array',
			'wgExternalServers' => 'array',
			'wgLBFactoryConf' => 'array',
			'wgMasterWaitTimeout' => 'int',
			'wgSlaveLagCritical' => 'int',
			'wgSlaveLagWarning' => 'int',
		),
		'mysql' => array(
			'wgDBmysql5' => 'bool',
			'wgDBprefix' => 'text',
			'wgDBTableOptions' => 'text',
			'wgDBtransactions' => 'bool',
		),
		'postgres' => array(
			'wgDBmwschema' => 'text',
		),
		'sqlite' => array(
			'wgSQLiteDataDir' => 'text',
		),
	),
	'email' => array(
		'email' => array(
			'wgEmailAuthentication' => 'bool',
			'wgEmergencyContact' => 'text',
			'wgEnableEmail' => 'bool',
			'wgEnableUserEmail' => 'bool',
			'wgNoReplyAddress' => 'text',
			'wgPasswordSender' => 'text',
			'wgPasswordSenderName' => 'text',
			'wgPasswordReminderResendTime' => 'int',
			'wgAdditionalMailParams' => 'text',
			'wgSMTP' => 'array',
			'wgUserEmailUseReplyTo' => 'bool',
			'wgUserEmailConfirmationTokenExpiry' => 'int',
		),
		'enotif' => array(
			'wgEnotifFromEditor' => 'bool',
			'wgEnotifImpersonal' => 'bool',
			'wgEnotifMaxRecips' => 'int',
			'wgEnotifMinorEdits' => 'bool',
			'wgEnotifRevealEditorAddress' => 'bool',
			'wgEnotifUseJobQ' => 'bool',
			'wgEnotifUseRealName' => 'bool',
			'wgEnotifUserTalk' => 'bool',
			'wgEnotifWatchlist' => 'bool',
			'wgUsersNotifiedOnAllChanges' => 'array',
		),
	),
	'localization' => array(
		'localization' => array(
			'wgLanguageCode' => 'lang',
			'wgDefaultLanguageVariant' => 'text',
			'wgExtraLanguageNames' => 'array',
			'wgDisabledVariants' => 'array',
			'wgBetterDirectionality' => 'bool',
			'wgCanonicalLanguageLinks' => 'bool',
			'wgDisableLangConversion' => 'bool',
			'wgDisableTitleConversion' => 'bool',
			'wgUseDatabaseMessages' => 'bool',
			'wgForceUIMsgAsContentMsg' => 'array',
			'wgLoginLanguageSelector' => 'bool',
			'wgLegacyEncoding' => 'text',
			'wgTranslateNumerals' => 'bool',
			'wgUseDynamicDates' => 'bool',
			'wgAmericanDates' => 'bool',
		),
		'timezone' => array(
			'wgLocaltimezone' => 'text',
			'wgLocalTZoffset' => 'int',
		),
	),
	'output' => array(
		'output' => array(
			'wgCleanupPresentationalAttributes' => 'bool',
			'wgEnableTooltipsAndAccesskeys' => 'bool',
			'wgHtml5' => 'bool',
			'wgWellFormedXml' => 'bool',
			'wgDocType' => 'text',
			'wgDTD' => 'text',
			'wgMimeType' => 'text',
			'wgXhtmlDefaultNamespace' => 'text',
			'wgXhtmlNamespaces' => 'array',
			'wgAllowMicrodataAttributes' => 'bool',
			'wgAllowRdfaAttributes' => 'bool',
			'wgHtml5Version' => 'text',
			'wgDisableOutputCompression' => 'bool',
			'wgSend404Code' => 'bool',
		),
	),
	'debug' => array(
		'debug' => array(
			'wgAPIRequestLog' => 'text',
			'wgDebugComments' => 'bool',
			'wgDebugDumpSql' => 'bool',
			'wgDebugLogFile' => 'text',
			'wgDebugLogGroups' => 'array',
			'wgDebugRawPage' => 'bool',
			'wgDebugLogPrefix' => 'text',
			'wgDebugRedirects' => 'bool',
			'wgDebugPrintHttpHeaders' => 'bool',
			'wgDebugTimestamps' => 'bool',
			'wgDebugToolbar' => 'bool',
			'wgDevelopmentWarnings' => 'bool',
			'wgDeprecationReleaseLimit' => 'text',
			'wgShowDebug' => 'bool',
			'wgShowExceptionDetails' => 'bool',
			'wgShowDBErrorBacktrace' => 'bool',
			'wgShowSQLErrors' => 'bool',
			'wgStatsMethod' => array( 'cache' => 'Cache', 'udp' => 'UDP', 0 => 'None' ),
			'wgAggregateStatsID' => 'text',
		),
		'profiling' => array(
			'wgDebugFunctionEntry' => 'bool',
			'wgDebugProfiling' => 'bool',
			'wgProfileCallTree' => 'bool',
			'wgProfileLimit' => 'int',
			'wgProfileOnly' => 'bool',
			'wgProfilePerHost' => 'bool',
			'wgProfileToDatabase' => 'bool',
			'wgUDPProfilerHost' => 'text',
			'wgUDPProfilerPort' => 'int',
		),
	),
	'stats' => array(
		'stats' => array(
			'wgActiveUserDays' => 'int',
			'wgCountCategorizedImagesAsUsed' => 'bool',
			'wgDisableCounters' => 'bool',
			'wgHitcounterUpdateFreq' => 'int',
			'wgArticleCountMethod' => array( 'all' => 'All', 'comma' => 'Comma', 'link' => 'Link' ),
			'wgUseCommaCount' => 'bool',
			'wgWantedPagesThreshold' => 'int',
		),
	),
	'skin' => array(
		'skin' => array(
			'wgDefaultSkin' => 'text',
			'wgSkipSkin' => 'text',
			'wgSkipSkins' => 'array',
		),
		'vector' => array(
			'wgVectorUseIconWatch' => 'bool',
			'wgVectorUseSimpleSearch' => 'bool',
			'wgVectorShowVariantName' => 'bool',
		),
	),
	'category' => array(
		'category' => array(
			'wgCategoryMagicGallery' => 'bool',
			'wgCategoryPagingLimit' => 'int',
			'wgUseCategoryBrowser' => 'bool',
			'wgCategoryCollation' => array( 'uppercase' => 'Uppercase' ),
		),
	),
	'cache' => array(
		'cache' => array(
			'wgMainCacheType' => array( -1 => 'Anything', 0 => 'None',
	                            1 => 'DB', 2 => 'Memcached',
	                            3 => 'Accel', 4 => 'DBA' ),
			'wgDBAhandler' => array( 'db3' => 'db3', 'db4' => 'db4' ),
			'wgCacheDirectory' => 'text',
			'wgCacheEpoch' => 'text',
			'wgCachePages' => 'bool',
			'wgCachePrefix' => 'text',
			'wgClockSkewFudge' => 'int',
			'wgInvalidateCacheOnLocalSettingsChange' => 'bool',
			'wgFileCacheDirectory' => 'text',
			'wgFileCacheDepth' => 'int',
			'wgForcedRawSMaxage' => 'int',
			'wgQueryCacheLimit' => 'int',
			'wgRevisionCacheExpiry' => 'int',
			'wgTranscludeCacheExpiry' => 'int',
			'wgUseFileCache' => 'bool',
			'wgUseGzip' => 'bool',
		),
		'pcache' => array(
			'wgParserCacheType' => array( -1 => 'Anything', 0 => 'None',
			                              1 => 'DB', 2 => 'Memcached',
			                              3 => 'Accel', 4 => 'DBA' ),
			'wgEnableParserCache' => 'bool',
			'wgEnableSidebarCache' => 'bool',
			'wgRenderHashAppend' => 'text',
			'wgSidebarCacheExpiry' => 'int',
			'wgUseETag' => 'bool',
		),
		'messagecache' => array(
			'wgLocalisationCacheConf' => 'array',
			'wgMessageCacheType' => array( -1 => 'Anything', 0 => 'None',
			                               1 => 'DB', 2 => 'Memcached',
			                               3 => 'Accel', 4 => 'DBA' ),
			'wgUseLocalMessageCache' => 'bool',
			'wgLocalMessageCacheSerialized' => 'bool',
			'wgAdaptiveMessageCache' => 'bool',
			'wgMsgCacheExpiry' => 'int',
			'wgMaxMsgCacheEntrySize' => 'int',
		),
		'memcached' => array(
#			'wgMemCachedDebug' => 'bool', # Does not appear to be a setting, just a global
			'wgMemCachedPersistent' => 'bool',
			'wgMemCachedServers' => 'array',
			'wgMemCachedTimeout' => 'int',
			'wgSessionsInMemcached' => 'bool',
		),
	),
	'interwiki' => array(
		'interwiki' => array(
			'wgImportSources' => 'array',
			'wgLocalInterwiki' => 'text',
			'wgHideInterlanguageLinks' => 'bool',
			'wgInterwikiMagic' => 'bool',
			'wgEnableScaryTranscluding' => 'bool',
			'wgDisableHardRedirects' => 'bool',
			'wgRedirectSources' => 'text',
			'wgInterwikiCache' => 'text',
			'wgInterwikiExpiry' => 'int',
			'wgInterwikiFallbackSite' => 'text',
			'wgInterwikiScopes' => 'int',
		),
	),
	'access' => array(
		'access' => array(
			'wgAccountCreationThrottle' => 'int',
			'wgAllowPageInfo' => 'bool',
			'wgDisabledActions' => 'array',
			'wgNewPasswordExpiry' => 'int',
			'wgEmailConfirmToEdit' => 'bool',
			'wgPasswordSalt' => 'bool',
			'wgReadOnly' => 'text',
			'wgReadOnlyFile' => 'text',
			'wgRestrictionTypes' => 'array',
			'wgRestrictionLevels' => 'array',
			'wgWhitelistRead' => 'array',
			'wgBreakFrames' => 'bool',
			'wgEditPageFrameOptions' => array(
				'DENY' => 'Deny',
				'SAMEORIGIN' => 'Same origin',
				0 => 'Allow',
			),
		),
		'block' => array(
			'wgBlockAllowsUTEdit' => 'bool',
			'wgBlockDisablesLogin' => 'bool',
			'wgBlockCIDRLimit' => 'int',
			'wgSysopEmailBans' => 'bool',
			'wgAutoblockExpiry' => 'int',
		),
		'filter' => array(
			'wgSpamRegex' => 'array',
			'wgSummarySpamRegex' => 'array',
			'wgDeleteRevisionsLimit' => 'int',
			'wgPasswordAttemptThrottle' => 'array',
		),
		'rates' => array(
			'wgRateLimitLog' => 'text',
			'wgRateLimits' => 'array',
			'wgRateLimitsExcludedGroups' => 'array',
			'wgRateLimitsExcludedIPs' => 'array',
		),
	),
	'upload' => array(
		'upload' => array(
			'wgEnableUploads' => 'bool',
			'wgUploadMaintenance' => 'bool',
			'wgAjaxLicensePreview' => 'bool',
			'wgAllowCopyUploads' => 'bool',
			'wgAllowAsyncCopyUploads' => 'bool',
			'wgCheckFileExtensions' => 'bool',
			'wgCopyUploadsDomains' => 'array',
			'wgDisableUploadScriptChecks' => 'bool',
			'wgAllowJavaUploads' => 'bool',
			'wgFileBlacklist' => 'array',
			'wgFileExtensions' => 'array',
			'wgFileStore' => 'array',
			'wgHashedUploadDirectory' => 'bool',
			'wgLocalFileRepo' => 'array',
			'wgStrictFileExtensions' => 'bool',
			'wgUploadSizeWarning' => 'int',
			'wgMaxUploadSize' => 'int',
			'wgUploadStashMaxAge' => 'int',
			'wgHTTPTimeout' => 'int',
			'wgHTTPProxy' => 'text',
			'wgAsyncHTTPTimeout' => 'int',
		),
		'sharedupload' => array(
			'wgForeignFileRepos' => 'array',
			'wgUseInstantCommons' => 'bool',
			'wgCacheSharedUploads' => 'bool',
			'wgFetchCommonsDescriptions' => 'bool',
			'wgHashedSharedUploadDirectory' => 'bool',
			'wgRepositoryBaseUrl' => 'text',
			'wgSharedThumbnailScriptPath' => 'text',
			'wgSharedUploadDBname' => 'text',
			'wgSharedUploadDBprefix' => 'text',
			'wgSharedUploadDirectory' => 'text',
			'wgSharedUploadPath' => 'text',
			'wgUseSharedUploads' => 'bool',
		),
		'mime' => array(
			'wgVerifyMimeType' => 'bool',
			'wgLoadFileinfoExtension' => 'bool',
			'wgMimeDetectorCommand' => 'text',
			'wgMimeInfoFile' => 'text',
			'wgMimeTypeFile' => 'text',
			'wgJsMimeType' => 'text',
			'wgMimeTypeBlacklist' => 'array',
			'wgXMLMimeTypes' => 'array',
		),
	),
	'images' => array(
		'images' => array(
			'wgAllowImageMoving' => 'bool',
			'wgCustomConvertCommand' => 'text',
			'wgIgnoreImageErrors' => 'bool',
			'wgIllegalFileChars' => 'text',
			'wgImageLimits' => 'array',
			'wgMaxAnimatedGifArea' => 'int',
			'wgMaxImageArea' => 'int',
			'wgMediaHandlers' => 'array',
			'wgShowEXIF' => 'bool',
			'wgUpdateCompatibleMetadata' => 'bool',
			'wgTrustedMediaFormats' => 'array',
			'wgImgAuthDetails' => 'bool',
			'wgImgAuthPublicTest' => 'bool',
		),
		'thumbnail' => array(
			'wgUseImageResize' => 'bool',
			'wgEnableAutoRotation' => 'bool',
			'wgTiffThumbnailType' => 'array',
			'wgThumbnailEpoch' => 'text',
			'wgThumbnailScriptPath' => 'text',
			'wgThumbUpright' => 'text',
			'wgGenerateThumbnailOnParse' => 'bool',
			'wgShowArchiveThumbnails' => 'bool',
			'wgThumbLimits' => 'array',
			'wgExcludeFromThumbnailPurge' => 'array',
		),
		'djvu' => array(
			'wgDjvuDump' => 'text',
			'wgDjvuOutputExtension' => 'text',
			'wgDjvuPostProcessor' => 'text',
			'wgDjvuRenderer' => 'text',
			'wgDjvuToXML' => 'text',
			'wgDjvuTxt' => 'text',
		),
		'imagemagick' => array(
			'wgImageMagickConvertCommand' => 'text',
			'wgImageMagickIdentifyCommand' => 'text',
			'wgImageMagickTempDir' => 'text',
			'wgSharpenParameter' => 'int',
			'wgSharpenReductionThreshold' => 'text',
			'wgUseImageMagick' => 'bool',
		),
		'svg' => array(
			'wgAllowTitlesInSVG' => 'bool',
			'wgSVGConverter' => 'text',
			'wgSVGConverterPath' => 'text',
			'wgSVGConverters' => 'array',
			'wgSVGMaxSize' => 'int',
			'wgSVGMetadataCutoff' => 'int',
		),
		'antivirus' => array(
			'wgAntivirus' => 'text',
			'wgAntivirusRequired' => 'bool',
			'wgAntivirusSetup' => 'array',
		),
	),
	'parser' => array(
		'parser' => array(
			'wgAllowDisplayTitle' => 'bool',
			'wgAllowSlowParserFunctions' => 'bool',
			'wgRestrictDisplayTitle' => 'bool',
			'wgAllowExternalImages' => 'bool',
			'wgAllowExternalImagesFrom' => 'text',
			'wgAllowImageTag' => 'bool',
			'wgEnableImageWhitelist' => 'bool',
			'wgExpensiveParserFunctionLimit' => 'int',
			'wgExternalLinkTarget' => 'text',
			'wgCleanSignatures' => 'bool',
			'wgGalleryOptions' => 'array',
			'wgGrammarForms' => 'array',
			'wgLinkHolderBatchSize' => 'int',
			'wgMaxPPExpandDepth' => 'int',
			'wgMaxPPNodeCount' => 'int',
			'wgMaxTemplateDepth' => 'int',
			'wgMaxTocLevel' => 'int',
			'wgParserConf' => 'array',
			'wgParserCacheExpireTime' => 'int',
			'wgParserTestRemote' => 'array',
			'wgPreprocessorCacheThreshold' => 'int',
			'wgRegisterInternalExternals' => 'bool',
			'wgUrlProtocols' => 'array',
		),
		'html' => array(
			'wgRawHtml' => 'bool',
		),
		'tidy' => array(
			'wgAlwaysUseTidy' => 'bool',
			'wgDebugTidy' => 'bool',
			'wgTidyBin' => 'text',
			'wgTidyConf' => 'text',
			'wgTidyInternal' => 'bool',
			'wgTidyOpts' => 'text',
			'wgUseTidy' => 'bool',
			'wgValidateAllHtml' => 'bool',
		),
	),
	'specialpages' => array(
		'specialpages' => array(
			'wgAllowSpecialInclusion' => 'bool',
			'wgExportAllowAll' => 'bool',
			'wgExportAllowHistory' => 'bool',
			'wgExportAllowListContributors' => 'bool',
			'wgExportFromNamespaces' => 'bool',
			'wgExportMaxHistory' => 'int',
			'wgExportMaxLinkDepth' => 'int',
			'wgExtraRandompageSQL' => 'text',
			'wgFilterLogTypes' => 'array',
			'wgImportTargetNamespace' => 'text',
			'wgLogRestrictions' => 'array',
			'wgMaxRedirectLinksRetrieved' => 'int',
			'wgQueryPageDefaultLimit' => 'int',
			'wgSecureLogin' => 'bool',
			'wgRedirectOnLogin' => 'text',
			'wgSortSpecialPages' => 'bool',
			'wgSpecialPageGroups' => 'array',
			'wgSpecialVersionShowHooks' => 'bool',
			'wgUseNPPatrol' => 'bool',
		),
		'recentchanges' => array(
			'wgAllowCategorizedRecentChanges' => 'bool',
			'wgPutIPinRC' => 'bool',
			'wgAutopromoteOnceLogInRC' => 'bool',
			'wgRCChangedSizeThreshold' => 'int',
			'wgRCFilterByAge' => 'bool',
			'wgRCLinkLimits' => 'array',
			'wgRCLinkDays' => 'array',
			'wgRCMaxAge' => 'int',
			'wgRCShowChangedSize' => 'bool',
			'wgRCShowWatchingUsers' => 'bool',
			'wgShowUpdatedMarker' => 'bool',
			'wgUseRCPatrol' => 'bool',
			'wgRC2UDPAddress' => 'text',
			'wgRC2UDPInterwikiPrefix' => 'bool',
			'wgRC2UDPOmitBots' => 'bool',
			'wgRC2UDPPort' => 'int',
			'wgRC2UDPPrefix' => 'text',
		),
	),
	'users' => array(
		'users' => array(
			'wgAutoConfirmAge' => 'int',
			'wgAutoConfirmCount' => 'int',
			'wgAllowRealName' => 'bool',
			'wgAllowUserCssPrefs' => 'bool',
			'wgDefaultUserOptions' => 'array',
			'wgDisableAnonTalk' => 'bool',
			'wgHiddenPrefs' => 'array',
			'wgInvalidUsernameCharacters' => 'text',
			'wgUserrightsInterwikiDelimiter' => 'text',
			'wgMaxNameChars' => 'int',
			'wgMaxSigChars' => 'int',
			'wgMinimalPasswordLength' => 'int',
			'wgLivePasswordStrengthChecks' => 'bool',
			'wgPasswordResetRoutes' => 'array',
			'wgNewUserLog' => 'bool',
			'wgReservedUsernames' => 'array',
			'wgShowIPinHeader' => 'bool',
			'wgBrowserBlackList' => 'array',
		),
		'externalauth' => array(
			'wgExternalAuthType' => 'text',
			'wgExternalAuthConf' => 'array',
			'wgAutocreatePolicy' => array(
				'never' => 'Never',
				'login' => 'Login',
				'view' => 'View',
			),
			'wgAllowPrefChange' => 'array',
		),
	),
	'cookie' => array(
		'cookie' => array(
			'wgCacheVaryCookies' => 'array',
			'wgCookieDomain' => 'text',
			'wgCookieExpiration' => 'int',
			'wgCookieHttpOnly' => 'bool',
			'wgCookiePath' => 'text',
			'wgCookiePrefix' => 'text',
			'wgCookieSecure' => 'bool',
			'wgDisableCookieCheck' => 'bool',
			'wgHttpOnlyBlacklist' => 'array',
			'wgSessionHandler' => 'text',
			'wgSessionName' => 'text',
		),
	),
	'feed' => array(
		'feed' => array(
			'wgFeed' => 'bool',
			'wgAdvertisedFeedTypes' => 'array',
			'wgFeedCacheTimeout' => 'int',
			'wgFeedDiffCutoff' => 'int',
			'wgFeedLimit' => 'int',
			'wgOverrideSiteFeed' => 'array',
		),
	),
	'copyright' => array(
		'copyright' => array(
			'wgCopyrightIcon' => 'text',
			'wgEnableCreativeCommonsRdf' => 'bool',
			'wgEnableDublinCoreRdf' => 'bool',
			'wgLicenseTerms' => 'array',
			'wgMaxCredits' => 'int',
			'wgRightsIcon' => 'text',
			'wgRightsPage' => 'text',
			'wgRightsText' => 'text',
			'wgRightsUrl' => 'text',
			'wgShowCreditsIfMax' => 'bool',
			'wgUseCopyrightUpload' => 'bool',
		),
	),
	'search' => array(
		'search' => array(
			'wgDisableInternalSearch' => 'bool',
			'wgAdvancedSearchHighlighting' => 'bool',
			'wgEnableMWSuggest' => 'bool',
			'wgEnableOpenSearchSuggest' => 'bool',
			'wgEnableSearchContributorsByIP' => 'bool',
			'wgGoToEdit' => 'bool',
			'wgMWSuggestTemplate' => 'text',
			'wgOpenSearchTemplate' => 'text',
			'wgSearchForwardUrl' => 'text',
			'wgSearchEverythingOnlyLoggedIn' => 'bool',
			'wgSearchHighlightBoundaries' => 'text',
			'wgSearchSuggestCacheExpiry' => 'int',
			'wgCountTotalSearchHits' => 'bool',
			'wgUseTwoButtonsSearchForm' => 'bool',
		),
	),
	'proxy' => array(
		'proxy' => array(
			'wgBlockOpenProxies' => 'bool',
#			'wgProxyKey' => 'text', # Deprecated
			'wgProxyList' => 'array',
			'wgProxyMemcExpiry' => 'int',
			'wgProxyPorts' => 'array',
			'wgProxyScriptPath' => 'text',
			'wgProxyWhitelist' => 'array',
			'wgSecretKey' => 'text',
			'wgEnableDnsBlacklist' => 'bool',
			'wgDnsBlacklistUrls' => 'array',
		),
	),
	'squid' => array(
		'squid' => array(
			'wgUseSquid' => 'bool',
			'wgSquidServers' => 'array',
			'wgSquidServersNoPurge' => 'array',
			'wgInternalServer' => 'text',
			'wgMaxSquidPurgeTitles' => 'int',
			'wgSquidMaxage' => 'int',
			'wgUseESI' => 'bool',
			'wgUsePrivateIPs' => 'bool',
			'wgUseXVO' => 'bool',
			'wgVaryOnXFP' => 'bool',
		),
		'htcp' => array(
			'wgHTCPMulticastAddress' => 'text',
			'wgHTCPMulticastTTL' => 'int',
			'wgHTCPPort' => 'int',
		),
	),
	'job' => array(
		'job' => array(
			'wgJobRunRate' => 'int',
			'wgUpdateRowsPerJob' => 'int',
		),
	),
);

/**
 * As there can be a lot of array types, try to define their type
 *
 * Types used:
 * - simple: single dimension array with numeric key
 * - assoc:  single dimension array with associative key => val
 * - ns-bool:   single dimension array with namespaces numbers in the key and a
 *              boolean value
 * - ns-text:   same as ns-bool but with a string in the value
 * - ns-simple: like simple, but values are restricted to namespaces index
 * - group-bool: two dimensions array with group name in first key, right name
 *               in the second and boolean value
 * - group-array: two dimensions array with group name in first key and then
 *                a 'simple' array
 * - array: other types of arrays not currenty supported
 */
$arrayDefs = array(
# Features
	'wgResourceLoaderInlinePrivateModules' => 'array',
	'wgCrossSiteAJAXdomains' => 'simple',
	'wgCrossSiteAJAXdomainExceptions' => 'simple',
	'wgDisableQueryPageUpdate' => 'simple',
	'wgPoolCounterConf' => 'array',
	'wgJavaScriptTestConfig' => 'array',
# Pages
	'wgInvalidRedirectTargets' => 'simple',
	'wgArticleRobotPolicies' => 'assoc',
	'wgExemptFromUserRobotsControl' => 'ns-simple',
	'wgNoFollowDomainExceptions' => 'simple',
# Namespaces
	'wgContentNamespaces' => 'ns-simple',
	'wgCapitalLinkOverrides' => 'ns-bool',
	'wgExtraNamespaces' => 'assoc',
	'wgExtraGenderNamespaces' => 'array',
	'wgNamespaceAliases' => 'assoc',
	'wgNamespaceProtection' => 'ns-array',
	'wgNamespaceRobotPolicies' => 'ns-text',
	'wgNamespacesToBeSearchedDefault' => 'ns-bool',
	'wgNamespacesToBeSearchedHelp' => 'ns-bool',
	'wgNamespacesWithSubpages' => 'ns-bool',
	'wgNoFollowNsExceptions' => 'ns-simple',
	'wgNonincludableNamespaces' => 'ns-simple',
	'wgPreviewOnOpenNamespaces' => 'ns-bool',
	'wgSitemapNamespaces' => 'ns-simple',
	'wgSitemapNamespacesPriorities' => 'array',
# Groups
	'wgAutopromote' => 'promotion-conds',
	'wgAutopromoteOnce' => 'array',
	'wgImplicitGroups' => 'simple',
	'wgGroupPermissions' => 'group-bool',
	'wgRevokePermissions' => 'group-bool',
	'wgAddGroups' => 'group-array',
	'wgRemoveGroups' => 'group-array',
	'wgGroupsAddToSelf' => 'group-array',
	'wgGroupsRemoveFromSelf' => 'group-array',
# Paths
	'wgActionPaths' => 'assoc',
	'wgFooterIcons' => 'array',
# Db
	'wgLocalDatabases' => 'simple',
	'wgSharedTables'  => 'simple',
	'wgDBservers' => 'array',
	'wgDefaultExternalStore' => 'simple',
	'wgLBFactoryConf' => 'array',
	'wgExternalServers' => 'array',
# Email
	'wgSMTP' => 'assoc',
	'wgUsersNotifiedOnAllChanges' => 'simple',
# Localization
	'wgExtraLanguageNames' => 'assoc',
	'wgDisabledVariants' => 'simple',
	'wgForceUIMsgAsContentMsg' => 'simple',
# Output
	'wgXhtmlNamespaces' => 'assoc',
# Debug
	'wgDebugLogGroups' => 'assoc',
# Skins
	'wgSkipSkins' => 'simple',
# Cache
	'wgLocalisationCacheConf' => 'assoc',
	'wgMemCachedServers' => 'simple',
# Interwiki
	'wgImportSources' => 'simple',
# Access
	'wgDisabledActions' => 'simple',
	'wgRestrictionLevels' => 'simple',
	'wgRestrictionTypes' => 'simple',
	'wgWhitelistRead' => 'simple',
	'wgSpamRegex' => 'simple',
	'wgSummarySpamRegex' => 'simple',
	'wgRateLimits' => 'rate-limits',
	'wgRateLimitsExcludedGroups' => 'simple',
	'wgRateLimitsExcludedIPs' => 'simple',
	'wgPasswordAttemptThrottle' => 'assoc',
# Uploads
	'wgFileBlacklist' => 'simple',
	'wgFileExtensions' => 'simple',
	'wgFileStore' => 'array',
	'wgCopyUploadsDomains' => 'simple',
	'wgLocalFileRepo' => 'assoc',
	'wgForeignFileRepos' => 'array',
	'wgMimeTypeBlacklist' => 'simple',
	'wgXMLMimeTypes' => 'assoc',
# Images
	'wgImageLimits' => 'simple-dual',
	'wgMediaHandlers' => 'assoc',
	'wgTrustedMediaFormats' => 'simple',
	'wgTiffThumbnailType' => 'simple',
	'wgThumbLimits' => 'simple',
	'wgExcludeFromThumbnailPurge' => 'simple',
	'wgSVGConverters' => 'assoc',
	'wgAntivirusSetup' => 'array',
# Parser
	'wgGalleryOptions' => 'assoc',
	'wgGrammarForms' => 'array',
	'wgParserConf' => 'assoc',
	'wgParserTestRemote' => 'assoc',
	'wgUrlProtocols' => 'simple',
# Special pages
	'wgFilterLogTypes' => 'assoc',
	'wgLogRestrictions' => 'assoc',
	'wgSpecialPageGroups' => 'assoc',
	'wgRCLinkLimits' => 'simple',
	'wgRCLinkDays' => 'simple',
# Users
	'wgDefaultUserOptions' => 'assoc',
	'wgPasswordResetRoutes' => 'array',
	'wgReservedUsernames' => 'simple',
	'wgBrowserBlackList' => 'simple',
	'wgExternalAuthConf' => 'array',
	'wgAllowPrefChange' => 'assoc',
	'wgHiddenPrefs' => 'simple',
# Feed
	'wgOverrideSiteFeed' => 'assoc',
# Copyright
	'wgLicenseTerms' => 'simple',
# Proxies
	'wgProxyList' => 'simple',
	'wgProxyPorts' => 'simple',
	'wgProxyWhitelist' => 'simple',
	'wgDnsBlacklistUrls' => 'simple',
# Squid
	'wgSquidServers' => 'simple',
	'wgSquidServersNoPurge' => 'simple',
# Cookie
	'wgCacheVaryCookies' => 'simple',
	'wgHttpOnlyBlacklist' => 'simple',
# Feed
	'wgAdvertisedFeedTypes' => 'simple',
# Extensions
	'wgExternalStores' => 'simple',
);

/**
 * Value to be used when setting matches empty()
 */
$emptyValues = array(
	'wgAppleTouchIcon' => false,
	'wgLoadScript' => false,
	'wgVariantArticlePath' => false,
	'wgUploadStashScalerBaseUrl' => false,
	'wgAdditionalMailParams' => false,
	'wgDeletedDirectory' => false,
	'wgDBerrorLog' => null,
	'wgSearchType' => null,
	'wgSharedDB' => null,
	'wgLegacyEncoding' => null,
	'wgDefaultLanguageVariant' => false,
	'wgExemptFromUserRobotsControl' => null,
	'wgExtraRandompageSQL' => false,
	'wgHandheldStyle' => false,
	'wgMetaNamespaceTalk' => false,
	'wgCacheDirectory' => false,
	'wgCachePrefix' => false,
	'wgInterwikiCache' => false,
	'wgReadOnly' => null,
	'wgRateLimitLog' => null,
	'wgSessionName' => false,
	'wgHTTPProxy' => false,
	'wgUploadMissingFileUrl' => false,
	'wgSharedThumbnailScriptPath' => false,
	'wgSharedUploadDBname' => false,
	'wgMimeDetectorCommand' => null,
	'wgCustomConvertCommand' => false,
	'wgTiffThumbnailType' => false,
	'wgThumbnailScriptPath' => false,
	'wgDjvuDump' => null,
	'wgDjvuRenderer' => null,
	'wgDjvuToXML' => null,
	'wgRedirectOnLogin' => null,
	'wgAntivirus' => null,
	'wgExternalLinkTarget' => false,
	'wgImportTargetNamespace' => null,
	'wgRC2UDPAddress' => false,
	'wgRC2UDPPort' => false,
	'wgSessionHandler' => null,
	'wgRightsUrl' => null,
	'wgMWSuggestTemplate' => false,
	'wgOpenSearchTemplate' => false,
	'wgSearchForwardUrl' => null,
	'wgHTCPMulticastAddress' => false,
	'wgExternalDiffEngine' => false,
	'wgSearchType' => null,
	'wgLocaltimezone' => null,
	'wgLocalTZoffset' => null,
	'wgReadOnly' => null,
	'wgDjvuDump' => null,
	'wgAntivirus' => null,
	'wgImportTargetNamespace' => null,
	'wgCopyrightIcon' => null,
	'wgSearchForwardUrl' => null,
	'wgExemptFromUserRobotsControl' => null,
	'wgArticlePath' => false,
	'wgAPIRequestLog' => false,
	'wgExternalAuthType' => null,
	'wgHtml5Version' => null,
	'wgAggregateStatsID' => false,
	'wgResourceBasePath' => null,
);

/**
 * Settings that can be modified only by users with 'configure-all' right
 */
$editRestricted = array(
	'wgUpgradeKey',
	'wgSeleniumConfigFile',
# General
	'wgActionPaths',
	'wgAppleTouchIcon',
	'wgArticlePath',
	'wgDeletedDirectory',
	'wgDirectoryMode',
	'wgDiff',
	'wgDiff3',
	'wgPhpCli',
	'wgExiv2Command',
	'wgFavicon',
	'wgLoadScript',
	'wgRedirectScript',
	'wgScript',
	'wgScriptExtension',
	'wgScriptPath',
	'wgServer',
	'wgStyleDirectory',
	'wgStylePath',
	'wgTmpDirectory',
	'wgUsePathInfo',
	'wgUploadBaseUrl',
	'wgUploadDirectory',
	'wgUploadNavigationUrl',
	'wgUploadMissingFileUrl',
	'wgUploadPath',
	'wgVariantArticlePath',
	'wgUploadStashScalerBaseUrl',
# Db
	'wgAllDBsAreLocalhost',
	'wgDBAvgStatusPoll',
	'wgDBClusterTimeout',
	'wgDBerrorLog',
	'wgDBmwschema',
	'wgDBmysql5',
	'wgDBname',
	'wgDBpassword',
	'wgDBadminpassword',
	'wgDBport',
	'wgDBprefix',
	'wgDBserver',
	'wgDBservers',
	'wgDBTableOptions',
	'wgDBtransactions',
	'wgDBts2schema',
	'wgDBtype',
	'wgDBuser',
	'wgDBadminuser',
	'wgSQLMode',
	'wgDefaultExternalStore',
	'wgExternalStores',
	'wgLBFactoryConf',
	'wgLocalDatabases',
	'wgMasterWaitTimeout',
	'wgSearchType',
	'wgSharedDB',
	'wgSharedPrefix',
	'wgSharedTables',
	'wgSlaveLagCritical',
	'wgSlaveLagWarning',
	'wgSQLiteDataDir',
	'wgExternalServers',
# Emal
	'wgSMTP',
# Debug
	'wgAPIRequestLog',
	'wgDebugLogFile',
	'wgDebugLogGroups',
	'wgUDPProfilerHost',
	'wgUDPProfilerPort',
# Cache
	'wgFileCacheDirectory',
	'wgLocalMessageCache',
	'wgMemCachedServers',
# Access
	'wgAddGroups',
	'wgGroupPermissions',
	'wgRevokePermissions',
	'wgGroupsAddToSelf',
	'wgGroupsRemoveFromSelf',
	'wgRemoveGroups',
	'wgReadOnlyFile',
# Rate limits
	'wgRateLimitLog',
# Proxies
	'wgProxyScriptPath',
	'wgSecretKey',
# Squid
	'wgInternalServer',
	'wgSquidServers',
	'wgSquidServersNoPurge',
# Img
	'wgFileStore',
	'wgHTTPProxy',
	'wgLocalFileRepo',
	'wgThumbnailScriptPath',
# Parser
	'wgTidyBin',
	'wgTidyConf',
# Special pages
	'wgRC2UDPAddress',
	'wgRC2UDPPort',
# Search
	'wgDisableInternalSearch',
	'wgMWSuggestTemplate',
	'wgOpenSearchTemplate',
# htcp
	'wgHTCPMulticastAddress',
	'wgHTCPPort',
);

/**
 * Settings that can be viewed only by users with 'viewconfig-all' right
 * because they can contain passwords
 */
$viewRestricted = array(
#
	'wgUpgradeKey',
	'wgDBtestpassword',
# Db
	'wgDBpassword',
	'wgDBadminpassword',
	'wgDBservers',
	'wgLBFactoryConf',
	'wgExternalServers',
# Emal
	'wgSMTP',
# Proxy
	'wgSecretKey',
);

/**
 * Array of settings that doesn't have to be modified, because they should only
 * be set by extensions, ...
 */
$notEditableSettings = array(
	'wgStyleVersion',
);

/**
 * Array of settings depending of the Core version
 */
$settingsVersion = array(
	# Added in 1.19
	'wgAllowSchemaUpdates' => array( array( '1.19alpha', '>=' ) ),
	'wgCachePrefix' => array( array( '1.19alpha', '>=' ) ),
	'wgCleanupPresentationalAttributes' => array( array( '1.19alpha', '>=' ) ),
	'wgCopyUploadsDomains' => array( array( '1.19alpha', '>=' ) ),
	'wgDebugToolbar' => array( array( '1.19alpha', '>=' ) ),
	'wgDeprecationReleaseLimit' => array( array( '1.19alpha', '>=' ) ),
	'wgDisableUploadScriptChecks' => array( array( '1.19alpha', '>=' ) ),
	'wgEnableAutoRotation' => array( array( '1.19alpha', '>=' ) ),
	'wgEnableJavaScriptTest' => array( array( '1.19alpha', '>=' ) ),
	'wgEnableSearchContributorsByIP' => array( array( '1.19alpha', '>=' ) ),
	'wgExportAllowAll' => array( array( '1.19alpha', '>=' ) ),
	'wgImageMagickIdentifyCommand' => array( array( '1.19alpha', '>=' ) ),
	'wgJavaScriptTestConfig' => array( array( '1.19alpha', '>=' ) ),
	'wgPasswordResetRoutes' => array( array( '1.19alpha', '>=' ) ),
	'wgQueryPageDefaultLimit' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceBasePath' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceLoaderMaxQueryLength' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceLoaderMinifierMaxLineLength' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceLoaderMinifierStatementsOnOwnLine' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceLoaderValidateJS' => array( array( '1.19alpha', '>=' ) ),
	'wgResourceLoaderValidateStaticJS' => array( array( '1.19alpha', '>=' ) ),
	'wgSend404Code' => array( array( '1.19alpha', '>=' ) ),
	'wgSitemapNamespacesPriorities' => array( array( '1.19alpha', '>=' ) ),
	'wgSVGMetadataCutoff' => array( array( '1.19alpha', '>=' ) ),
	'wgUpdateCompatibleMetadata' => array( array( '1.19alpha', '>=' ) ),
	'wgUploadStashMaxAge' => array( array( '1.19alpha', '>=' ) ),
	'wgVaryOnXFP' => array( array( '1.19alpha', '>=' ) ),

	# Removed in 1.19
	'wgEnableCreativeCommonsRdf' => array( array( '1.19alpha', '<' ) ),
	'wgEnableDublinCoreRdf' => array( array( '1.19alpha', '<' ) ),
	'wgExtraRandompageSQL' => array( array( '1.19alpha', '<' ) ),
	'wgRateLimitsExcludedGroups' => array( array( '1.19alpha', '<' ) ),
	'wgEnableTooltipsAndAccesskeys' => array( array( '1.19alpha', '<' ) ),
	'wgExcludeFromThumbnailPurge' => array( array( '1.19alpha', '<' ) ),
	'wgLivePasswordStrengthChecks' => array( array( '1.19alpha', '<' ) ),
	'wgUseTrackbacks' => array( array( '1.19alpha', '<' ) ),
	'wgVectorShowVariantName' => array( array( '1.19alpha', '<' ) ),
);
