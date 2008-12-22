<?php
/**
 * MediaWiki is the to-be base class for this whole project
 */
class MediaWiki {

	var $GET; /* Stores the $_GET variables at time of creation, can be changed */
	var $params = array();

	/** Constructor. It just save the $_GET variable */
	function __construct() {
		$this->GET = $_GET;
	}

	/**
	 * Stores key/value pairs to circumvent global variables
	 * Note that keys are case-insensitive!
	 *
	 * @param $key String: key to store
	 * @param $value Mixed: value to put for the key
	 */
	function setVal( $key, &$value ) {
		$key = strtolower( $key );
		$this->params[$key] =& $value;
	}

	/**
	 * Retrieves key/value pairs to circumvent global variables
	 * Note that keys are case-insensitive!
	 *
	 * @param $key String: key to get
	 * @param $default Mixed: default value if if the key doesn't exist
	 */
	function getVal( $key, $default = '' ) {
		$key = strtolower( $key );
		if( isset( $this->params[$key] ) ) {
			return $this->params[$key];
		}
		return $default;
	}

	/**
	 * Initialization of ... everything
	 * Performs the request too
	 *
	 * @param $title Title ($wgTitle)
	 * @param $article Article
	 * @param $output OutputPage
	 * @param $user User
	 * @param $request WebRequest
	 */
	function initialize( &$title, &$article, &$output, &$user, $request ) {
		wfProfileIn( __METHOD__ );
		$this->preliminaryChecks( $title, $output, $request );
		if( !$this->initializeSpecialCases( $title, $output, $request ) ) {
			$new_article = $this->initializeArticle( $title, $request );
			if( is_object( $new_article ) ) {
				$article = $new_article;
				$this->performAction( $output, $article, $title, $user, $request );
			} elseif( is_string( $new_article ) ) {
				$output->redirect( $new_article );
			} else {
				wfProfileOut( __METHOD__ );
				throw new MWException( "Shouldn't happen: MediaWiki::initializeArticle() returned neither an object nor a URL" );
			}
		}
		wfProfileOut( __METHOD__ );
	}

	/**
	 * Check if the maximum lag of database slaves is higher that $maxLag, and
	 * if it's the case, output an error message
	 *
	 * @param $maxLag int: maximum lag allowed for the request, as supplied by
	 *                the client
	 * @return bool true if the request can continue
	 */
	function checkMaxLag( $maxLag ) {
		list( $host, $lag ) = wfGetLB()->getMaxLag();
		if( $lag > $maxLag ) {
			wfMaxlagError( $host, $lag, $maxLag );
			return false;
		} else {
			return true;
		}
	}


	/**
	 * Checks some initial queries
	 * Note that $title here is *not* a Title object, but a string!
	 *
	 * @param $title String
	 * @param $action String
	 * @return Title object to be $wgTitle
	 */
	function checkInitialQueries( $title, $action ) {
		global $wgOut, $wgRequest, $wgContLang;
		if( $wgRequest->getVal( 'printable' ) === 'yes' ) {
			$wgOut->setPrintable();
		}
		$ret = NULL;
		if( $curid = $wgRequest->getInt( 'curid' ) ) {
			# URLs like this are generated by RC, because rc_title isn't always accurate
			$ret = Title::newFromID( $curid );
		} elseif( '' == $title && 'delete' != $action ) {
			$ret = Title::newMainPage();
		} else {
			$ret = Title::newFromURL( $title );
			// check variant links so that interwiki links don't have to worry
			// about the possible different language variants
			if( !is_null($ret) && $wgContLang->hasVariants() && $ret->getArticleID() == 0 )
				$wgContLang->findVariantLink( $title, $ret );
		}
		if( ( $oldid = $wgRequest->getInt( 'oldid' ) )
			&& ( is_null( $ret ) || $ret->getNamespace() != NS_SPECIAL ) ) {
			// Allow oldid to override a changed or missing title.
			$rev = Revision::newFromId( $oldid );
			if( $rev ) {
				$ret = $rev->getTitle();
			}
		}
		return $ret;
	}

	/**
	 * Checks for search query and anon-cannot-read case
	 *
	 * @param $title Title
	 * @param $output OutputPage
	 * @param $request WebRequest
	 */
	function preliminaryChecks( &$title, &$output, $request ) {
		if( $request->getCheck( 'search' ) ) {
			// Compatibility with old search URLs which didn't use Special:Search
			// Just check for presence here, so blank requests still
			// show the search page when using ugly URLs (bug 8054).

			// Do this above the read whitelist check for security...
			$title = SpecialPage::getTitleFor( 'Search' );
		}
		# If the user is not logged in, the Namespace:title of the article must be in
		# the Read array in order for the user to see it. (We have to check here to
		# catch special pages etc. We check again in Article::view())
		if( !is_null( $title ) && !$title->userCanRead() ) {
			$output->loginToUse();
			$output->output();
			exit;
		}
	}

	/**
	 * Initialize some special cases:
	 * - bad titles
	 * - local interwiki redirects
	 * - redirect loop
	 * - special pages
	 *
	 * @param $title Title
	 * @param $output OutputPage
	 * @param $request WebRequest
	 * @return bool true if the request is already executed
	 */
	function initializeSpecialCases( &$title, &$output, $request ) {
		wfProfileIn( __METHOD__ );

		$action = $this->getVal( 'Action' );
		if( is_null($title) || $title->getDBkey() == '' ) {
			$title = SpecialPage::getTitleFor( 'Badtitle' );
			# Die now before we mess up $wgArticle and the skin stops working
			throw new ErrorPageError( 'badtitle', 'badtitletext' );
		} else if( $title->getInterwiki() != '' ) {
			if( $rdfrom = $request->getVal( 'rdfrom' ) ) {
				$url = $title->getFullURL( 'rdfrom=' . urlencode( $rdfrom ) );
			} else {
				$url = $title->getFullURL();
			}
			/* Check for a redirect loop */
			if( !preg_match( '/^' . preg_quote( $this->getVal('Server'), '/' ) . '/', $url ) && $title->isLocal() ) {
				$output->redirect( $url );
			} else {
				$title = SpecialPage::getTitleFor( 'Badtitle' );
				throw new ErrorPageError( 'badtitle', 'badtitletext' );
			}
		} else if( $action == 'view' && !$request->wasPosted() &&
			( !isset($this->GET['title']) || $title->getPrefixedDBKey() != $this->GET['title'] ) &&
			!count( array_diff( array_keys( $this->GET ), array( 'action', 'title' ) ) ) )
		{
			$targetUrl = $title->getFullURL();
			// Redirect to canonical url, make it a 301 to allow caching
			if( $targetUrl == $request->getFullRequestURL() ) {
				$message = "Redirect loop detected!\n\n" .
					"This means the wiki got confused about what page was " .
					"requested; this sometimes happens when moving a wiki " .
					"to a new server or changing the server configuration.\n\n";

				if( $this->getVal( 'UsePathInfo' ) ) {
					$message .= "The wiki is trying to interpret the page " .
						"title from the URL path portion (PATH_INFO), which " .
						"sometimes fails depending on the web server. Try " .
						"setting \"\$wgUsePathInfo = false;\" in your " .
						"LocalSettings.php, or check that \$wgArticlePath " .
						"is correct.";
				} else {
					$message .= "Your web server was detected as possibly not " .
						"supporting URL path components (PATH_INFO) correctly; " .
						"check your LocalSettings.php for a customized " .
						"\$wgArticlePath setting and/or toggle \$wgUsePathInfo " .
						"to true.";
				}
				wfHttpError( 500, "Internal error", $message );
				return false;
			} else {
				$output->setSquidMaxage( 1200 );
				$output->redirect( $targetUrl, '301' );
			}
		} else if( NS_SPECIAL == $title->getNamespace() ) {
			/* actions that need to be made when we have a special pages */
			SpecialPage::executePath( $title );
		} else {
			/* Try low-level file cache hit */
			if( $title->getNamespace() != NS_MEDIAWIKI && HTMLFileCache::useFileCache() ) {
				$cache = new HTMLFileCache( $title );
				if( $cache->isFileCacheGood( /* Assume up to date */ ) ) {
					global $wgOut, $wgDisableCounters;
					/* Check incoming headers to see if client has this cached */
					if( !$wgOut->checkLastModified( $cache->fileCacheTime() ) ) {
						wfDebug( "MediaWiki::initializeSpecialCases(): about to load file cache\n" );
						$cache->loadFromFileCache();
						# Tell $wgOut that output is taken care of
						$wgOut->disable();
						if( !$wgDisableCounters ) {
							# Do any stats increment/watchlist stuff
							$article = self::articleFromTitle( $title );
							$article->viewUpdates();
						}
					}
					wfProfileOut( __METHOD__ );
					$this->restInPeace();
					exit;
				}
			}
			/* No match to special cases */
			wfProfileOut( __METHOD__ );
			return false;
		}
		/* Did match a special case */
		wfProfileOut( __METHOD__ );
		return true;
	}

	/**
	 * Create an Article object of the appropriate class for the given page.
	 *
	 * @param $title Title
	 * @return Article object
	 */
	static function articleFromTitle( &$title ) {
		if( NS_MEDIA == $title->getNamespace() ) {
			// FIXME: where should this go?
			$title = Title::makeTitle( NS_FILE, $title->getDBkey() );
		}

		$article = null;
		wfRunHooks( 'ArticleFromTitle', array( &$title, &$article ) );
		if( $article ) {
			return $article;
		}

		switch( $title->getNamespace() ) {
			case NS_FILE:
				return new ImagePage( $title );
			case NS_CATEGORY:
				return new CategoryPage( $title );
			default:
				return new Article( $title );
		}
	}

	/**
	 * Initialize the object to be known as $wgArticle for "standard" actions
	 * Create an Article object for the page, following redirects if needed.
	 *
	 * @param $title Title ($wgTitle)
	 * @param $request WebRequest
	 * @return mixed an Article, or a string to redirect to another URL
	 */
	function initializeArticle( &$title, $request ) {
		wfProfileIn( __METHOD__ );

		$action = $this->getVal( 'action' );
		$article = self::articleFromTitle( $title );
		
		// Namespace might change when using redirects
		// Check for redirects ...
		$file = ($title->getNamespace() == NS_FILE) ? $article->getFile() : null;
		if( ( $action == 'view' || $action == 'render' ) 	// ... for actions that show content
			&& !$request->getVal( 'oldid' ) &&    // ... and are not old revisions
			$request->getVal( 'redirect' ) != 'no' &&	// ... unless explicitly told not to
			// ... and the article is not a non-redirect image page with associated file
			!( is_object( $file ) && $file->exists() && !$file->getRedirected() ) )
		{
			# Give extensions a change to ignore/handle redirects as needed
			$ignoreRedirect = $target = false;
			
			$dbr = wfGetDB( DB_SLAVE );
			$article->loadPageData( $article->pageDataFromTitle( $dbr, $title ) );

			wfRunHooks( 'InitializeArticleMaybeRedirect', 
				array(&$title,&$request,&$ignoreRedirect,&$target,&$article) );

			// Follow redirects only for... redirects
			if( !$ignoreRedirect && $article->isRedirect() ) {
				# Is the target already set by an extension?
				$target = $target ? $target : $article->followRedirect();
				if( is_string( $target ) ) {
					if( !$this->getVal( 'DisableHardRedirects' ) ) {
						// we'll need to redirect
						return $target;
					}
				}

				if( is_object( $target ) ) {
					// Rewrite environment to redirected article
					$rarticle = self::articleFromTitle( $target );
					$rarticle->loadPageData( $rarticle->pageDataFromTitle( $dbr, $target ) );
					if( $rarticle->exists() || ( is_object( $file ) && !$file->isLocal() ) ) {
						$rarticle->setRedirectedFrom( $title );
						$article = $rarticle;
						$title = $target;
					}
				}
			} else {
				$title = $article->getTitle();
			}
		}
		wfProfileOut( __METHOD__ );
		return $article;
	}

	/**
	 * Cleaning up by doing deferred updates, calling LBFactory and doing the output
	 *
	 * @param $deferredUpdates array of updates to do
	 * @param $output OutputPage
	 */
	function finalCleanup( &$deferredUpdates, &$output ) {
		wfProfileIn( __METHOD__ );
		# Now commit any transactions, so that unreported errors after output() don't roll back the whole thing
		$factory = wfGetLBFactory();
		$factory->commitMasterChanges();
		# Output everything!
		$output->output();
		# Do any deferred jobs
		$this->doUpdates( $deferredUpdates );
		$this->doJobs();
		# Commit and close up!
		$factory->shutdown();
		wfProfileOut( __METHOD__ );
	}

	/**
	 * Deferred updates aren't really deferred anymore. It's important to report
	 * errors to the user, and that means doing this before OutputPage::output().
	 * Note that for page saves, the client will wait until the script exits
	 * anyway before following the redirect.
	 *
	 * @param $updates array of objects that hold an update to do
	 */
	function doUpdates( &$updates ) {
		wfProfileIn( __METHOD__ );
		/* No need to get master connections in case of empty updates array */
		if( !$updates ) {
			wfProfileOut( __METHOD__ );
			return;
		}

		$dbw = wfGetDB( DB_MASTER );
		foreach( $updates as $up ) {
			$up->doUpdate();

			# Commit after every update to prevent lock contention
			if( $dbw->trxLevel() ) {
				$dbw->commit();
			}
		}
		wfProfileOut( __METHOD__ );
	}

	/**
	 * Do a job from the job queue
	 */
	function doJobs() {
		$jobRunRate = $this->getVal( 'JobRunRate' );

		if( $jobRunRate <= 0 || wfReadOnly() ) {
			return;
		}
		if( $jobRunRate < 1 ) {
			$max = mt_getrandmax();
			if( mt_rand( 0, $max ) > $max * $jobRunRate ) {
				return;
			}
			$n = 1;
		} else {
			$n = intval( $jobRunRate );
		}

		while ( $n-- && false != ( $job = Job::pop() ) ) {
			$output = $job->toString() . "\n";
			$t = -wfTime();
			$success = $job->run();
			$t += wfTime();
			$t = round( $t*1000 );
			if( !$success ) {
				$output .= "Error: " . $job->getLastError() . ", Time: $t ms\n";
			} else {
				$output .= "Success, Time: $t ms\n";
			}
			wfDebugLog( 'jobqueue', $output );
		}
	}

	/**
	 * Ends this task peacefully
	 */
	function restInPeace() {
		wfLogProfilingData();
		wfDebug( "Request ended normally\n" );
	}

	/**
	 * Perform one of the "standard" actions
	 *
	 * @param $output OutputPage
	 * @param $article Article
	 * @param $title Title
	 * @param $user User
	 * @param $request WebRequest
	 */
	function performAction( &$output, &$article, &$title, &$user, &$request ) {
		wfProfileIn( __METHOD__ );

		if( !wfRunHooks( 'MediaWikiPerformAction', array( $output, $article, $title, $user, $request, $this ) ) ) {
			wfProfileOut( __METHOD__ );
			return;
		}

		$action = $this->getVal( 'Action' );
		if( in_array( $action, $this->getVal( 'DisabledActions', array() ) ) ) {
			/* No such action; this will switch to the default case */
			$action = 'nosuchaction';
		}

		switch( $action ) {
			case 'view':
				$output->setSquidMaxage( $this->getVal( 'SquidMaxage' ) );
				$article->view();
				break;
			case 'raw': // includes JS/CSS
				$raw = new RawPage( $article );
				$raw->view();
				break;
			case 'watch':
			case 'unwatch':
			case 'delete':
			case 'revert':
			case 'rollback':
			case 'protect':
			case 'unprotect':
			case 'info':
			case 'markpatrolled':
			case 'render':
			case 'deletetrackback':
			case 'purge':
				$article->$action();
				break;
			case 'print':
				$article->view();
				break;
			case 'dublincore':
				if( !$this->getVal( 'EnableDublinCoreRdf' ) ) {
					wfHttpError( 403, 'Forbidden', wfMsg( 'nodublincore' ) );
				} else {
					$rdf = new DublinCoreRdf( $article );
					$rdf->show();
				}
				break;
			case 'creativecommons':
				if( !$this->getVal( 'EnableCreativeCommonsRdf' ) ) {
					wfHttpError( 403, 'Forbidden', wfMsg( 'nocreativecommons' ) );
				} else {
					$rdf = new CreativeCommonsRdf( $article );
					$rdf->show();
				}
				break;
			case 'credits':
				Credits::showPage( $article );
				break;
			case 'submit':
				if( session_id() == '' ) {
					/* Send a cookie so anons get talk message notifications */
					wfSetupSession();
				}
				/* Continue... */
			case 'edit':
			case 'editredlink':
				if( wfRunHooks( 'CustomEditor', array( $article, $user ) ) ) {
					$internal = $request->getVal( 'internaledit' );
					$external = $request->getVal( 'externaledit' );
					$section = $request->getVal( 'section' );
					$oldid = $request->getVal( 'oldid' );
					if( !$this->getVal( 'UseExternalEditor' ) || $action=='submit' || $internal ||
					   $section || $oldid || ( !$user->getOption( 'externaleditor' ) && !$external ) ) {
						$editor = new EditPage( $article );
						$editor->submit();
					} elseif( $this->getVal( 'UseExternalEditor' ) && ( $external || $user->getOption( 'externaleditor' ) ) ) {
						$mode = $request->getVal( 'mode' );
						$extedit = new ExternalEdit( $article, $mode );
						$extedit->edit();
					}
				}
				break;
			case 'history':
				if( $request->getFullRequestURL() == $title->getInternalURL( 'action=history' ) ) {
					$output->setSquidMaxage( $this->getVal( 'SquidMaxage' ) );
				}
				$history = new PageHistory( $article );
				$history->history();
				break;
			default:
				if( wfRunHooks( 'UnknownAction', array( $action, $article ) ) ) {
					$output->showErrorPage( 'nosuchaction', 'nosuchactiontext' );
				}
		}
		wfProfileOut( __METHOD__ );

	}

}; /* End of class MediaWiki */
