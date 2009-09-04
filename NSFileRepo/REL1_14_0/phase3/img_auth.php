<?php

/**
 * Image authorisation script
 *
 * To use this, see http://www.mediawiki.org/wiki/Manual:Image_Authorization
 *
 * - Set $wgUploadDirectory to a non-public directory (not web accessible)
 * - Set $wgUploadPath to point to this file
 *
 * Optional Parameters
 *
 * - Set $wgImgAuthDetails = true if you want the reason the access was denied messages to be displayed 
 *       instead of just the 403 error (doesn't work on IE anyway),  otherwise will only appear in error logs
 * - Set $wgImgAuthPublicTest false if you don't want to just check and see if all are public
 *       must be set to false if using specific restrictions such as LockDown or NSFileRepo
 *
 *  For security reasons, you usually don't want your user to know *why* access was denied, just that it was.
 *  If you want to change this, you can set $wgImgAuthDetails to 'true' in localsettings.php and it will give the user the reason
 *  why access was denied.
 *
 * Your server needs to support PATH_INFO; CGI-based configurations usually don't.
 *
 * @file
 *
 **/

define( 'MW_NO_OUTPUT_COMPRESSION', 1 );
require_once( dirname( __FILE__ ) . '/includes/WebStart.php' );
wfProfileIn( 'img_auth.php' );
require_once( dirname( __FILE__ ) . '/includes/StreamFile.php' );

$perms = User::getGroupPermissions( array( '*' ) );

// See if this is a public Wiki (no protections)
if ( $wgImgAuthPublicTest && in_array( 'read', $perms, true ) )
	wfForbidden('img-auth-accessdenied','img-auth-public');

// Extract path and image information
if( !isset( $_SERVER['PATH_INFO'] ) )
	wfForbidden('img-auth-accessdenied','img-auth-nopathinfo');

$path = $_SERVER['PATH_INFO'];
$filename = realpath( $wgUploadDirectory . $_SERVER['PATH_INFO'] );
$realUpload = realpath( $wgUploadDirectory );

// Basic directory traversal check
if( substr( $filename, 0, strlen( $realUpload ) ) != $realUpload )
	wfForbidden('img-auth-accessdenied','img-auth-notindir');

// Extract the file name and chop off the size specifier
// (e.g. 120px-Foo.png => Foo.png)
$name = wfBaseName( $path );
if( preg_match( '!\d+px-(.*)!i', $name, $m ) )
	$name = $m[1];

// Check to see if the file exists
if( !file_exists( $filename ) )
	wfForbidden('img-auth-accessdenied','img-auth-nofile',htmlspecialchars($filename));

// Check to see if tried to access a directory
if( is_dir( $filename ) )
	wfForbidden('img-auth-accessdenied','img-auth-isdir',htmlspecialchars($filename));


$title = Title::makeTitleSafe( NS_FILE, $name );

// See if could create the title object
if( !$title instanceof Title ) 
	wfForbidden('img-auth-accessdenied','img-auth-badtitle',htmlspecialchars($name));

// Run hook
if (!wfRunHooks( 'ImgAuthBeforeStream', array( &$title, &$path, &$name, &$result ) ) )
	call_user_func_array('wfForbidden',merge_array(array($result[0],$result[1]),array_slice($result,2)));
	
//  Check user authorization for this title
//  UserCanRead Checks Whitelist too
if( !$title->userCanRead() )
	wfForbidden('img-auth-accessdenied','img-auth-noread',htmlspecialchars($name));


// Stream the requested file
wfDebugLog( 'img_auth', "Streaming `".htmlspecialchars($filename)."`." );
wfStreamFile( $filename, array( 'Cache-Control: private', 'Vary: Cookie' ) );
wfLogProfilingData();

/**
 * Issue a standard HTTP 403 Forbidden header ($msg1-a message index, not a message) and an
 * error message ($msg2, also a message index), (both required) then end the script
 * subsequent arguments to $msg2 will be passed as parameters only for replacing in $msg2 
 */
function wfForbidden($msg1,$msg2) {
	global $wgImgAuthDetails,$wgExtensionMessagesFiles;
	require_once($wgExtensionMessagesFiles['img_auth']);
	$args = func_get_args();
	array_shift( $args );
	array_shift( $args );
	$MsgHdr = wfMsgHTML($msg1);
	$detailMsg = call_user_func_array('wfMsgHTML',array_merge(array($wgImgAuthDetails ? $msg2 : 'badaccess-group0'),$args));
	wfDebugLog('img_auth', "wfForbidden Hdr:".wfMsgExt( $msg1, array('language' => 'en'))." Msg: ".
				call_user_func_array('wfMsgExt',array_merge( array($msg2, array('language' => 'en')),$args)));
	header( 'HTTP/1.0 403 Forbidden' );
	header( 'Cache-Control: no-cache' );
	header( 'Content-Type: text/html; charset=utf-8' );
	echo <<<ENDS
<html>
<body>
<h1>$MsgHdr</h1>
<p>$detailMsg</p>
</body>
</html>
ENDS;
	wfLogProfilingData();
	exit();
}
