<?php
/**
 * News extension - shows recent changes on a wiki page.
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Daniel Kinzler, brightbyte.de
 * @copyright © 2007 Daniel Kinzler
 * @licence GNU General Public Licence 2.0 or later
 */


if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array( 
	'name' => 'News', 
	'author' => 'Daniel Kinzler, brightbyte.de', 
	'url' => 'http://mediawiki.org/wiki/Extension:News',
	'description' => 'shows customized recent changes on a wiki pages or as RSS or Atom feed',
);

$wgNewsFeedURLPattern = false; // pattern for feed-URLs; useful when using rewrites for canonical feed URLs
$wgNewsFeedUserPattern = false; // pattern to use for the author-field in feed items.

$wgExtensionFunctions[] = "wfNewsExtension";

$wgAutoloadClasses['NewsRenderer'] = dirname( __FILE__ ) . '/NewsRenderer.php';
$wgAutoloadClasses['NewsFeedPage'] = dirname( __FILE__ ) . '/NewsRenderer.php';
$wgHooks['ArticleFromTitle'][] = 'wfNewsArticleFromTitle';
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'wfNewsSkinTemplateOutputPageBeforeExec';

//FIXME: find a way to override the feed URLs generated by OutputPage::getHeadLinks

function wfNewsExtension() {
    global $wgParser;
    $wgParser->setHook( "news", "wfNewsTag" );
    $wgParser->setHook( "newsfeed", "wfNewsFeedTag" );
    $wgParser->setHook( "newsfeedlink", "wfNewsFeedLinkTag" );
}

function wfNewsTag( $templatetext, $argv, &$parser ) {
    global $wgTitle;

    $parser->disableCache(); //TODO: use smart cache & purge...?
    $renderer = new NewsRenderer($wgTitle, $templatetext, $argv, $parser);

    return $renderer->renderNews();
}

function wfNewsFeedTag( $templatetext, $argv, &$parser ) {
    global $wgTitle, $wgOut;

    $parser->disableCache(); //TODO: use smart cache & purge...?
    $wgOut->setSyndicated( true );

    $renderer = new NewsRenderer($wgTitle, $templatetext, $argv, $parser);
    $html = $renderer->renderFeedPreview();
    return $html;
}

function wfNewsFeedLinkTag( $linktext, $argv, &$parser ) {
    return NewsRenderer::renderFeedLink($linktext, $argv, $parser);
}

function wfNewsArticleFromTitle( &$title, &$article ) {
    global $wgRequest, $wgFeedClasses, $wgUser, $wgOut;
    $fname = 'extension/News: wfNewsArticleFromTitle';

    $ns = $title->getNamespace();
    if ($ns < 0 || $ns == NS_SPECIAL || $ns == NS_MEDIAWIKI) return true;

    $format = $wgRequest->getVal( 'feed' );
    if (!$format) return true; 

    $format = strtolower( trim($format) );

    $action = strtolower( trim( $wgRequest->getVal( 'action', 'view' ) ) );
    if ($action != 'view' && $action != 'purge') return true;

    if ( !isset($wgFeedClasses[$format] ) ) {
        wfDebug("$fname: unknown feed format: $format\n");
        wfHttpError(400, "Bad Request", "unknown feed format: " . $format); //TODO: better code & text
        return false;
    }

    if (!$title->exists()) {
        wfDebug("$fname: feed page not found: " . $title->getPrefixedDBKey() . "\n");
        wfHttpError(404, "Not Found", "feed page not found: " . $title->getPrefixedText()); //TODO: better text
        return false;
    }

    wfDebug("$fname: handling feed request for " . $title->getPrefixedDBKey() . "\n");

    $article = new NewsFeedPage( $title, $format );
    return false;
}

function wfNewsSkinTemplateOutputPageBeforeExec( &$skin, &$tpl ) {
    $feeds = $tpl->data['feeds'];
    if (!$feeds) return true;

    $title = $skin->mTitle; //hack...

    foreach ($feeds as $format => $e) {
        $e['href'] = NewsRenderer::getFeedURL( $title, $format );
        $feeds[$format] = $e;
    }

    $tpl->setRef( 'feeds', $feeds );
    true;
}

?>