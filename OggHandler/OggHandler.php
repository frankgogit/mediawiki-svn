<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "This is the OggHandler extension. Please see the README file for installation instructions.\n";
	exit( 1 );
}

$oggDir = dirname(__FILE__);
$wgAutoloadClasses['OggHandler'] = "$oggDir/OggHandler_body.php";
$wgMediaHandlers['application/ogg'] = 'OggHandler';
if ( !in_array( 'ogg', $wgFileExtensions ) ) {
	$wgFileExtensions[] = 'ogg';
}
if ( !in_array( 'ogv', $wgFileExtensions ) ) {
	$wgFileExtensions[] = 'ogv';
}
if ( !in_array( 'oga', $wgFileExtensions ) ) {
	$wgFileExtensions[] = 'oga';
}
ini_set( 'include_path', 
	"$oggDir/PEAR/File_Ogg" .
	PATH_SEPARATOR .
	ini_get( 'include_path' ) );

// Bump this when updating OggPlayer.js to help update caches
$wgOggScriptVersion = '10';

$wgExtensionMessagesFiles['OggHandler'] = "$oggDir/OggHandler.i18n.php";
$wgExtensionMessagesFiles['OggHandlerMagic'] = "$oggDir/OggHandler.i18n.magic.php";
$wgParserOutputHooks['OggHandler'] = array( 'OggHandler', 'outputHook' );
$wgHooks['LanguageGetMagic'][] = 'OggHandler::registerMagicWords';
$wgExtensionCredits['media'][] = array(
	'path'           => __FILE__,
	'name'           => 'OggHandler',
	'author'         => 'Tim Starling',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:OggHandler',
	'description'    => 'Handler for Ogg Theora and Vorbis files, with JavaScript player.',
	'descriptionmsg' => 'ogg-desc',
);

/******************* CONFIGURATION STARTS HERE **********************/

//set the supported ogg codecs:
$wgOggVideoTypes = array( 'Theora' );
$wgOggAudioTypes = array( 'Vorbis', 'Speex', 'FLAC' );

//if wgPlayerStats collection is enabled or not 
$wgPlayerStatsCollection=false;

//if $wgEnableJS2system = true  and the below variable is set to true 
// then we can output the <video> tag and its re-written by mv_embed  
$wgJs2VideoTagOut = true;

// Location of the FFmpeg binary
$wgFFmpegLocation = '/usr/bin/ffmpeg';

/**
 * enable oggz_chop support
 * if enabled the mv_embed player will use temporal urls
 * for helping with seeking with some plugin types
 */
$wgEnableTemporalOggUrls = false;

// Filename or URL path to the Cortado Java player applet.
//
// If no path is included, the path to this extension's
// directory will be used by default -- this should work
// on most local installations.
//
// You may need to include a full URL here if $wgUploadPath
// specifies a host different from where the wiki pages are
// served -- the applet .jar file must come from the same host
// as the uploaded media files or Java security rules will
// prevent the applet from loading them.
//
$wgCortadoJarFile = "cortado-ovt-stripped-wm_r38710.jar";
