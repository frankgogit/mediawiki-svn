<?php
/**
 * Contains class with page translation feature hooks.
 *
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2008-2012, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Hooks for page translation.
 *
 * @ingroup PageTranslation
 */
class PageTranslationHooks {
	// Uuugly hack
	static $allowTargetEdit = false;

	/**
	 * Hook: ParserBeforeStrip
	 * @param $parser Parser
	 * @param $text
	 * @param $state
	 * @return bool
	 */
	public static function renderTagPage( $parser, &$text, $state ) {
		$title = $parser->getTitle();

		if ( strpos( $text, '<translate>' ) !== false ) {
			try {
				$parse = TranslatablePage::newFromText( $parser->getTitle(), $text )->getParse();
				$text = $parse->getTranslationPageText( null );
			} catch ( TPException $e ) {
				// Show ugly preview without processed <translate> tags
			}
		}

		// Set display title
		$page = TranslatablePage::isTranslationPage( $title );
		if ( !$page ) {
			return true;
		}

		list( , $code ) = TranslateUtils::figureMessage( $title->getText() );
		$name = $page->getPageDisplayTitle( $code );

		if ( $name ) {
			// BC for MW < 1.19
			if ( is_callable( array( $parser, 'recursivePreprocess' ) ) ) {
				$name = $parser->recursivePreprocess( $name );
			} else {
				$newParser = new Parser();
				$name = $newParser->preprocess( $name, $parser->getTitle(), $parser->getOptions() );
			}
			$name = $parser->recursivePreprocess( $name );
			$parser->getOutput()->setDisplayTitle( $name );
		}

		return true;
	}

	/**
	 * Set the right page content language for translated pages ("Page/xx").
	 * Hook: PageContentLanguage
	 */
	public static function onPageContentLanguage( Title $title, /*string*/ &$pageLang ) {
		// For translation pages, parse plural, grammar etc with correct language, and set the right direction
		if ( TranslatablePage::isTranslationPage( $title ) ) {
			list( , $code ) = TranslateUtils::figureMessage( $title->getText() );
			$pageLang = $code;
		}

		return true;
	}

	/// Hook: OutputPageBeforeHTML
	public static function injectCss( OutputPage $outputpage, /*string*/ $text ) {
		$outputpage->addModules( 'ext.translate' );

		return true;
	}

	/// Hook: ArticleSaveComplete
	public static function onSectionSave( $article, User $user, $text, $summary,
		$minor, $_, $_, $flags, $revision ) {
		$title = $article->getTitle();

		// Some checks
		$handle = new MessageHandle( $title );

		// We are only interested in the translations namespace
		if ( !$handle->isPageTranslation() || !$handle->isValid() ) {
			return true;
		}

		// Do not trigger renders for fuzzy
		if ( strpos( $text, TRANSLATE_FUZZY ) !== false ) {
			return true;
		}

		$group = $handle->getGroup();
		if ( !$group instanceof WikiPageMessageGroup ) {
			return true;
		}

		// Finally we know the title and can construct a Translatable page
		$page = TranslatablePage::newFromTitle( $group->getTitle() );

		// Add a tracking mark
		if ( $revision !== null ) {
			self::addSectionTag( $title, $revision->getId(), $page->getMarkedTag() );
		}

		// Update the target translation page
		if ( !$handle->isDoc() ) {
			$code = $handle->getCode();
			self::updateTranslationPage( $page, $code, $user, $flags, $summary );
		}

		return true;
	}

	protected static function addSectionTag( Title $title, $revision, $pageRevision ) {
		if ( $pageRevision === null ) {
			throw new MWException( 'Page revision is null' );
		}

		$dbw = wfGetDB( DB_MASTER );

		$conds = array(
			'rt_page' => $title->getArticleId(),
			'rt_type' => RevTag::getType( 'tp:transver' ),
			'rt_revision' => $revision
		);
		$dbw->delete( 'revtag', $conds, __METHOD__ );

		$conds['rt_value'] = $pageRevision;

		$dbw->insert( 'revtag', $conds, __METHOD__ );
	}

	public static function updateTranslationPage( TranslatablePage $page,
		$code, $user, $flags, $summary ) {

		$source = $page->getTitle();
		$target = Title::makeTitle( $source->getNamespace(), $source->getDBkey() . "/$code" );

		// We don't know and don't care
		$flags &= ~EDIT_NEW & ~EDIT_UPDATE;

		// Update the target page
		$job = RenderJob::newJob( $target );
		$job->setUser( $user );
		$job->setSummary( $summary );
		$job->setFlags( $flags );
		$job->run();

		// Regenerate translation caches
		$page->getTranslationPercentages( 'force' );

		// Invalidate caches
		$pages = $page->getTranslationPages();
		foreach ( $pages as $title ) {
			$article = new Article( $title, 0 );
			$article->doPurge();
		}

		// And the source page itself too
		$article = new Article( $page->getTitle(), 0 );
		$article->doPurge();
	}

	/**
	 * @param $data
	 * @param $params
	 * @param $parser Parser
	 * @return string
	 */
	public static function languages( $data, $params, $parser ) {
		$title = $parser->getTitle();

		// Check if this is a source page or a translation page
		$page = TranslatablePage::newFromTitle( $title );
		if ( $page->getMarkedTag() === false ) {
			$page = TranslatablePage::isTranslationPage( $title );
		}

		if ( $page === false || $page->getMarkedTag() === false ) {
			return '';
		}

		$status = $page->getTranslationPercentages();
		if ( !$status ) {
			return '';
		}

		// If priority languages have been set always show those languages
		$priorityLangs = TranslateMetadata::get( $page->getMessageGroupId(), 'prioritylangs' );
		$priorityForce = TranslateMetadata::get( $page->getMessageGroupId(), 'priorityforce' );
		$filter = null;
		if ( strlen( $priorityLangs ) > 0 ) {
			$filter = array_flip( explode( ',', $priorityLangs ) );
		}
		if ( $filter !== null ) {
			// If translation is restricted to some languages, only show them
			if ( $priorityForce === 'on' ) {
				// Do not filter the source language link
				$filter[$page->getMessageGroup()->getSourceLanguage()] = true;
				$status = array_intersect_key( $status, $filter );
			}
			foreach ( $filter as $langCode => $value ) {
				if ( !isset( $status[$langCode] ) ) {
					// We need to show all priority languages even if no translation started
					$status[$langCode] = 0;
				}
			}
		}

		// Fix title
		$title = $page->getTitle();

		// Sort by language code, which seems to be the only sane method
		ksort( $status );

		// This way the parser knows to fragment the parser cache by language code
		$userLangCode = $parser->getOptions()->getUserLang();

		$languages = array();
		foreach ( $status as $code => $percent ) {
			$name = TranslateUtils::getLanguageName( $code, false, $userLangCode );
			$name = htmlspecialchars( $name ); // Unlikely, but better safe

			/* Percentages are too accurate and take more
			 * space than simple images */
			$percent *= 100;
			if     ( $percent < 20 ) { $image = 1; }
			elseif ( $percent < 40 ) { $image = 2; }
			elseif ( $percent < 60 ) { $image = 3; }
			elseif ( $percent < 80 ) { $image = 4; }
			else                     { $image = 5; }

			$percentImage = Xml::element( 'img', array(
				'src'   => TranslateUtils::assetPath( "resources/images/prog-$image.png" ),
				'alt'   => "$percent%", // @todo i18n missing.
				'title' => "$percent%", // @todo i18n missing.
				'width' => '9',
				'height' => '9',
			) );

			// Add links to other languages
			// @FIXME: 'en' should be the source language, not hardcoded
			$suffix = ( $code === 'en' ) ? '' : "/$code";
			$_title = Title::makeTitle( $title->getNamespace(), $title->getDBkey() . $suffix );
			if ( intval( $percent ) === 0 ) {
				/* When language is included because it is a priority language,
				 * but translation does not yet exists, link directly to the
				 * translation view. */
				$translate = SpecialPage::getTitleFor( 'Translate' );
				$params = array(
					'group' => $page->getMessageGroupId(),
					'language' => $code,
					'task' => 'view'
				);
				$attribs = array(
					'title' => wfMessage( 'tpt-languages-zero' )->text(),
					'class' => 'new', // For red link color
				);
				$languages[] = Linker::link( $translate, "$name $percentImage", $attribs, $params );
			} elseif ( $parser->getTitle()->getText() === $_title->getText() ) {
				// The page we are currently on
				$name = Html::rawElement( 'span', array( 'class' => 'mw-pt-languages-selected' ), $name );
				$languages[] = "$name $percentImage";
			} else {
				if ( $code === $userLangCode ) {
					$name = Html::rawElement( 'span', array( 'class' => 'mw-pt-languages-ui' ), $name );
				}
				$languages[] = Linker::linkKnown( $_title, "$name $percentImage" );
			}
		}

		$legend = wfMsg( 'tpt-languages-legend' );
		$languages = implode( wfMsg( 'tpt-languages-separator' ), $languages );

		return <<<FOO
<div class="mw-pt-languages">
<table><tbody>

<tr valign="top">
<td class="mw-pt-languages-label"><b>$legend</b></td>
<td class="mw-pt-languages-list">$languages</td></tr>

</tbody></table>
</div>
FOO;
	}

	/**
	 * Display nice error for editpage.
	 * Hook: EditFilterMerged
	 */
	public static function tpSyntaxCheckForEditPage( $editpage, $text, &$error, $summary ) {
		if ( strpos( $text, '<translate>' ) === false ) {
			return true;
		}

		$page = TranslatablePage::newFromText( $editpage->mTitle, $text );
		try {
			$page->getParse();
		} catch ( TPException $e ) {
			$error .= Html::rawElement( 'div', array( 'class' => 'error' ), $e->getMessage() );
		}

		return true;
	}

	/**
	 * When attempting to save, last resort. Edit page would only display
	 * edit conflict if there wasn't tpSyntaxCheckForEditPage
	 * Hook: ArticleSave
	 */
	public static function tpSyntaxCheck( $article, $user, $text, $summary,
			$minor, $_, $_, $flags, $status ) {
		// Quick escape on normal pages
		if ( strpos( $text, '<translate>' ) === false ) {
			return true;
		}

		$page = TranslatablePage::newFromText( $article->getTitle(), $text );
		try {
			$page->getParse();
		} catch ( TPException $e ) {
			call_user_func_array( array( $status, 'fatal' ), $e->getMsg() );
			return false;
		}

		return true;
	}

	/// Hook: ArticleSaveComplete
	public static function addTranstag( $article, $user, $text, $summary,
			$minor, $_, $_, $flags, $revision ) {
		// We are not interested in null revisions
		if ( $revision === null ) {
			return true;
		}

		// Quick escape on normal pages
		if ( strpos( $text, '</translate>' ) === false ) {
			return true;
		}

		// Add the ready tag
		$page = TranslatablePage::newFromTitle( $article->getTitle() );
		if ( $page->getParse()->countSections() > 0 ) {
			$page->addReadyTag( $revision->getId() );
		}

		return true;
	}

	/**
	 * Prevent editing of unknown pages in Translations namespace.
	 * Hook: getUserPermissionsErrorsExpensive
	 */
	public static function preventUnknownTranslations( Title $title, User $user, $action, &$result ) {
		$handle = new MessageHandle( $title );
		if ( $handle->isPageTranslation() && $action === 'edit' ) {
			if ( !$handle->isValid() ) {
				$result = array( 'tpt-unknown-page' );
				return false;
			}
		}
		return true;
	}

	/**
	 * Prevent editing of restricted languages
	 * Hook: getUserPermissionsErrorsExpensive
	 * @since 2012-03-01
	 */
	public static function preventRestrictedTranslations( Title $title, User $user, $action, &$result ) {
		$handle = new MessageHandle( $title );
		if ( !$handle->isValid() ) {
			return true;
		}

		$groupId = $handle->getGroup()->getId();
		$priorityForce = TranslateMetadata::get( $groupId, 'priorityforce' );
		$priorityLangs = TranslateMetadata::get( $groupId, 'prioritylangs' );
		$priorityReason = TranslateMetadata::get( $groupId, 'priorityreason' );
		$filter = array_flip( explode( ',', $priorityLangs ) );
		if ( !isset( $filter[$handle->getCode()] ) && $priorityForce === 'on' ) {
			$result = array( 'tpt-translation-restricted', $priorityReason );
			return false;
		}

		return true;
	}



	/**
	 * Prevent editing of translation pages directly.
	 * Hook: getUserPermissionsErrorsExpensive
	 */
	public static function preventDirectEditing( Title $title, User $user, $action, &$result ) {
		$page = TranslatablePage::isTranslationPage( $title );
		if ( $page !== false && $action !== 'delete' && $action !== 'read' ) {
			if ( self::$allowTargetEdit ) {
				return true;
			}

			if ( $page->getMarkedTag() ) {
				list( , $code ) = TranslateUtils::figureMessage( $title->getText() );
				$result = array(
					'tpt-target-page',
					$page->getTitle()->getPrefixedText(),
					$page->getTranslationUrl( $code )
				);

				return false;
			}
		}

		return true;
	}

	/**
	 * Redirects the delete action to our own for translatable pages.
	 * Hook: ArticleConfirmDelete
	 */
	public static function disableDelete( $article, $out, &$reason ) {
		$title = $article->getTitle();
		if ( TranslatablePage::isSourcePage( $title ) || TranslatablePage::isTranslationPage( $title ) ) {
			$new = SpecialPage::getTitleFor( 'PageTranslationDeletePage', $title->getPrefixedText() );
			$out->redirect( $new->getFullUrl() );
		}
		return true;
	}

	/// Hook: ArticleViewHeader
	public static function translatablePageHeader( &$article, &$outputDone, &$pcache ) {
		if ( $article->getOldID() ) {
			return true;
		}

		$title = $article->getTitle();

		if ( TranslatablePage::isTranslationPage( $title ) )  {
			self::translationPageHeader( $title );
		} else {
			// Check for pages that are tagged or marked
			self::sourcePageHeader( $title );
		}

		return true;
	}

	protected static function sourcePageHeader( Title $title ) {
		global $wgUser, $wgLang;

		$page = TranslatablePage::newFromTitle( $title );

		$marked = $page->getMarkedTag();
		$ready = $page->getReadyTag();

		$title = $page->getTitle();

		$latest = $title->getLatestRevId();
		$canmark = $ready === $latest && $marked !== $latest;

		$actions = array();

		if ( $marked && $wgUser->isAllowed( 'translate' ) ) {
			$par = array(
				'group' => $page->getMessageGroupId(),
				'language' => $wgLang->getCode(),
				'task' => 'view'
			);

			$translate = SpecialPage::getTitleFor( 'Translate' );
			$linkDesc  = wfMsgHtml( 'translate-tag-translate-link-desc' );
			$actions[] = Linker::link( $translate, $linkDesc, array(), $par );
		}

		if ( $canmark ) {
			$diffUrl = $title->getFullUrl( array( 'oldid' => $marked, 'diff' => $latest ) );
			$par = array( 'target' => $title->getPrefixedText() );
			$translate = SpecialPage::getTitleFor( 'PageTranslation' );

			if ( $wgUser->isAllowed( 'pagetranslation' ) ) {
				// This page has never been marked
				if ( $marked === false ) {
					$linkDesc  = wfMsgHtml( 'translate-tag-markthis' );
					$actions[] = Linker::link( $translate, $linkDesc, array(), $par );
				} else {
					$markUrl = $translate->getFullUrl( $par );
					$actions[] = wfMsgExt( 'translate-tag-markthisagain', 'parseinline', $diffUrl, $markUrl );
				}
			} else {
				$actions[] = wfMsgExt( 'translate-tag-hasnew', 'parseinline', $diffUrl );
			}
		}

		if ( !count( $actions ) ) {
			return;
		}

		$legend  = Html::rawElement(
			'div',
			array( 'class' => 'mw-pt-translate-header' ),
			$wgLang->semicolonList( $actions )
		) . Html::element( 'hr' );

		global $wgOut;

		$wgOut->addHTML( $legend );
	}

	protected static function translationPageHeader( Title $title ) {
		global $wgOut;

		if ( !$title->exists() ) {
			return;
		}

		// Check if applicable
		$page = TranslatablePage::isTranslationPage( $title );
		if ( $page === false ) {
			return;
		}

		list( , $code ) = TranslateUtils::figureMessage( $title->getText() );

		// Get the translation percentage
		$pers = $page->getTranslationPercentages();
		$per = 0;
		if ( isset( $pers[$code] ) ) {
			$per = $pers[$code] * 100;
		}
		$titleText = $page->getTitle()->getPrefixedText();
		$url = $page->getTranslationUrl( $code );

		// Output
		$wrap = '<div class="mw-translate-page-info">$1</div>';
		$wgOut->wrapWikiMsg( $wrap, array( 'tpt-translation-intro', $url, $titleText, $per ) );

		if ( floor( $per ) < 100 ) {
			$groupId = $page->getMessageGroup()->getId();
			$stats = MessageGroupStats::forItem( $groupId, $code );
			$fuzzy = $stats[MessageGroupStats::FUZZY];
			if ( $fuzzy ) {
				// Only show if there is fuzzy messages
				$wrap = '<div class="mw-translate-page-info mw-translate-fuzzy">$1</div>';
				$wgOut->wrapWikiMsg( $wrap, array( 'tpt-translation-intro-fuzzy' ) );
			}
		}

		$wgOut->addHTML( '<hr />' );
	}

	/// Hook: LinksUpdate
	public static function preventCategorization( $updater ) {
		$handle = new MessageHandle( $updater->getTitle() );
		if ( $handle->isPageTranslation() && !$handle->isDoc() ) {
			$updater->mCategories = array();
		}
		return true;
	}

	/**
	 * @return string
	 */
	public static function formatLogEntry( $type, $action, $title, $forUI, $params ) {
		global $wgLang, $wgContLang;

		$language = $forUI === null ? $wgContLang : $wgLang;
		$opts = array( 'parseinline', 'language' => $language );

		// New logging system already unserializes it for us
		if ( isset( $params['user'] ) ) {
			$_ = $params;
		} else {
			$_ = unserialize( $params[0] );
		}
		$user =  $_['user'];

		if ( $action === 'mark' ) {
			return wfMsgExt( 'pt-log-mark', $opts, $title->getPrefixedText(), $user, $_['revision'] );
		} elseif ( $action === 'unmark' ) {
			return wfMsgExt( 'pt-log-unmark', $opts, $title->getPrefixedText(), $user );
		} elseif ( $action === 'moveok' ) {
			// Old entries are missing the target
			$target = isset( $_['target'] ) ? $_['target'] : '[[]]';
			return wfMsgExt( 'pt-log-moveok', $opts, $title->getPrefixedText(), $user, $target );
		} elseif ( $action === 'movenok' ) {
			return wfMsgExt( 'pt-log-movenok', $opts, $title->getPrefixedText(), $user, $_['target'] );
		} elseif ( $action === 'deletefnok' ) {
			return wfMsgExt( 'pt-log-delete-full-nok', $opts, $title->getPrefixedText(), $user, $_['target'] );
		} elseif ( $action === 'deletelnok' ) {
			return wfMsgExt( 'pt-log-delete-lang-nok', $opts, $title->getPrefixedText(), $user, $_['target'] );
		} elseif ( $action === 'deletefok' ) {
			return wfMsgExt( 'pt-log-delete-full-ok', $opts, $title->getPrefixedText(), $user );
		} elseif ( $action === 'deletelok' ) {
			return wfMsgExt( 'pt-log-delete-lang-ok', $opts, $title->getPrefixedText(), $user );
		} elseif ( $action === 'encourage' ) {
			return wfMsgExt( 'pt-log-encourage', $opts, $title->getPrefixedText(), $user );
		} elseif ( $action === 'discourage' ) {
			return wfMsgExt( 'pt-log-discourage', $opts, $title->getPrefixedText(), $user );
		} elseif ( $action === 'prioritylanguages' ) {
			if ( $_['languages'] === false ) {
				return wfMsgExt( 'pt-log-priority-langs-unset', $opts, $title->getPrefixedText(), $user );
			} elseif ( $_['force'] === 'on' ) {
				return wfMsgExt( 'pt-log-priority-langs-force', $opts, $title->getPrefixedText(), $user, $_['languages'], $_['reason'] );
			} else {
				return wfMsgExt( 'pt-log-priority-langs', $opts, $title->getPrefixedText(), $user , $_['languages'], $_['reason'] );
			}
		}
		return '';
	}

	/// Hook: SpecialPage_initList
	public static function replaceMovePage( &$list ) {
		$old = is_array( $list['Movepage'] );
		$list['Movepage'] = array( 'SpecialPageTranslationMovePage', $old );
		return true;
	}

	/// Hook: getUserPermissionsErrorsExpensive
	public static function lockedPagesCheck( Title $title, User $user, $action, &$result ) {
		if ( $action == 'read' ) {
			return true;
		}

		$cache = wfGetCache( CACHE_ANYTHING );
		$key = wfMemcKey( 'pt-lock', $title->getPrefixedText() );
		// At least memcached mangles true to "1"
		if ( $cache->get( $key ) == true ) {
			$result = array( 'pt-locked-page' );
			return false;
		}

		return true;
	}

	/// Hook: SkinSubPageSubtitle
	public static function replaceSubtitle( &$subpages, $skin = null , $out = null ) {
		global $wgOut;
		// $out was only added in some MW version
		if ( $out === null ) {
			$out = $wgOut;
		}

		if ( !TranslatablePage::isTranslationPage( $out->getTitle() )
				&& !TranslatablePage::isSourcePage( $out->getTitle() ) ) {
			return true;
		}

		// Copied from Skin::subPageSubtitle()
		if ( $out->isArticle() && MWNamespace::hasSubpages( $out->getTitle()->getNamespace() ) ) {
			$ptext = $out->getTitle()->getPrefixedText();
			if ( preg_match( '/\//', $ptext ) ) {
				$links = explode( '/', $ptext );
				array_pop( $links );
				// Also pop of one extra for language code is needed
				if ( TranslatablePage::isTranslationPage( $out->getTitle() ) ) {
					array_pop( $links );
				}
				$c = 0;
				$growinglink = '';
				$display = '';

				foreach ( $links as $link ) {
					$growinglink .= $link;
					$display .= $link;
					$linkObj = Title::newFromText( $growinglink );

					if ( is_object( $linkObj ) && $linkObj->exists() ) {
						$getlink = Linker::linkKnown(
							SpecialPage::getTitleFor( 'MyLanguage', $growinglink ),
							htmlspecialchars( $display )
						);

						$c++;

						if ( $c > 1 ) {
							$subpages .= wfMsgExt( 'pipe-separator', 'escapenoentities' );
						} else  {
							// This one is stupid imho, doesn't work with chihuahua
							// $subpages .= '&lt; ';
						}

						$subpages .= $getlink;
						$display = '';
					} else {
						$display .= '/';
					}
					$growinglink .= '/';
				}
			}
			return false;
		}

		return true;
	}
}
