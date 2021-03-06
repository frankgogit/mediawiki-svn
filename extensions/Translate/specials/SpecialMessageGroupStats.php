<?php
/**
 * Contains logic for special page Special:MessageGroupStats.
 *
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2011 Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Implements includable special page Special:MessageGroupStats which provides
 * translation statistics for all languages for a group.
 *
 * @ingroup SpecialPage TranslateSpecialPage Stats
 */
class SpecialMessageGroupStats extends SpecialLanguageStats {
	/// Overwritten from SpecialLanguageStats
	protected $targetValueName = array( 'group' );
	/// Overwritten from SpecialLanguageStats
	protected $noComplete = false;
	/// Overwritten from SpecialLanguageStats
	protected $noEmpty = true;

	protected $names;

	protected $translate;

	public function __construct() {
		SpecialPage::__construct( 'MessageGroupStats' );
	}

	/// Overwritten from SpecialPage
	public function getDescription() {
		return wfMessage( 'translate-mgs-pagename' )->text();
	}

	/// Overwritten from SpecialLanguageStats
	protected function isValidValue( $value ) {
		$group = MessageGroups::getGroup( $value );
		if ( $group ) {
			$this->target = $group->getId();
		}
		return (bool) $group;
	}

	/// Overwritten from SpecialLanguageStats
	protected function invalidTarget() {
		global $wgOut;
		$wgOut->wrapWikiMsg( "<div class='error'>$1</div>", array( 'translate-mgs-invalid-group', $this->target ) );
	}

	/// Overwritten from SpecialLanguageStats
	protected function outputIntroduction() {
		global $wgRequest, $wgOut;
		$group = $wgRequest->getVal( 'group' );
		$priorityLangs = TranslateMetadata::get( $group, 'prioritylangs' );
		if ( $priorityLangs ) {
			$wgOut->addWikiMsg( 'tpt-priority-languages', $priorityLangs );
		}
	}

	/// Overwriten from SpecialLanguageStats
	function getform() {
		global $wgScript, $wgRequest;

		$out = Html::openElement( 'div' );
		$out .= Html::openElement( 'form', array( 'method' => 'get', 'action' => $wgScript ) );
		$out .= Html::hidden( 'title', $this->getTitle()->getPrefixedText() );
		$out .= Html::hidden( 'x', 'D' ); // To detect submission
		$out .= Html::openElement( 'fieldset' );
		$out .= Html::element( 'legend', null, wfMsg( 'translate-mgs-fieldset' ) );
		$out .= Html::openElement( 'table' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-label' ) );
		$out .= Xml::label( wfMsg( 'translate-mgs-group' ), 'group' );
		$out .= Html::closeElement( 'td' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-input' ) );
		$out .= TranslateUtils::groupSelector( $this->target )->getHTML();
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'colspan' => 2 ) );
		$out .= Xml::checkLabel( wfMsg( 'translate-mgs-nocomplete' ), 'suppresscomplete', 'suppresscomplete', $this->noComplete );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'colspan' => 2 ) );
		$out .= Xml::checkLabel( wfMsg( 'translate-mgs-noempty' ), 'suppressempty', 'suppressempty', $this->noEmpty );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::openElement( 'tr' );
		$out .= Html::openElement( 'td', array( 'class' => 'mw-input', 'colspan' => 2 ) );
		$out .= Xml::submitButton( wfMsg( 'translate-mgs-submit' ) );
		$out .= Html::closeElement( 'td' );
		$out .= Html::closeElement( 'tr' );

		$out .= Html::closeElement( 'table' );
		$out .= Html::closeElement( 'fieldset' );
		/* Since these pages are in the tabgroup with Special:Translate,
		 * it makes sense to retain the selected group/language parameter
		 * on post requests even when not relevant to the current page. */
		$val = $wgRequest->getVal( 'language' );
		if ( $val !== null ) {
			$out .= Html::hidden( 'language', $val );
		}
		$out .= Html::closeElement( 'form' );
		$out .= Html::closeElement( 'div' );

		return $out;
	}

	/**
	 * Overwriten from SpecialLanguageStats
	 *
	 * @return string
	 */
	function getTable() {
		$table = $this->table;

		$this->addWorkflowStatesColumn();
		$out = '';

		if ( $this->purge ) {
			MessageGroupStats::clearGroup( $this->target );
		}

		MessageGroupStats::setTimeLimit( $this->timelimit );
		$cache = MessageGroupStats::forGroup( $this->target );

		$languages = array_keys( Language::getLanguageNames( false ) );
		sort( $languages );
		$this->filterPriorityLangs( $languages,  $this->target, $cache );
		foreach ( $languages as $code ) {
			if ( $table->isBlacklisted( $this->target, $code ) !== null ) {
				continue;
			}
			$out .= $this->makeRow( $code, $cache );
		}

		if ( $out ) {
			$table->setMainColumnHeader( wfMessage( 'translate-mgs-column-language' ) );
			$out = $table->createHeader() . "\n" . $out;
			$out .= Html::closeElement( 'tbody' );

			$out .= Html::openElement( 'tfoot' );
			$out .= $table->makeTotalRow( wfMessage( 'translate-mgs-totals' ), $this->totals );
			$out .= Html::closeElement( 'tfoot' );

			$out .= Html::closeElement( 'table' );
			return $out;
		} else {
			$this->nothing = true;
			return '';
		}
	}

	/**
	 * Filter an array of languages based on whether a priority set of languages present for the passed group.
	 * If priority languages are present, to that list add languages with more than 0% translation.
	 * @param $languages Array of Languages to be filtered
	 * @param $group
	 * @param $cache
	 */
	protected function filterPriorityLangs( &$languages, $group, $cache ) {
		$filterLangs = TranslateMetadata::get( $group, 'prioritylangs' );
		if ( strlen( $filterLangs ) === 0 ) {
			// No restrictions, keep everything
			return;
		}
		$filter = array_flip( explode( ',', $filterLangs ) );
		foreach ( $languages as $id => $code ) {
			if ( isset( $filter[$code] ) ) {
				continue;
			}
			$translated = $cache[$code][1];
			if ( $translated === 0 ) {
				unset( $languages[$id] );
			}
		}
	}

	/**
	 * @param $code
	 * @param $cache
	 * @return string
	 */
	protected function makeRow( $code, $cache ) {
		$stats = $cache[$code];

		list( $total, $translated, $fuzzy ) = $stats;
		if ( $total === null ) {
			$this->incomplete = true;
			$extra = array();
		} else {
			if ( $total === 0 ) {
				error_log( __METHOD__ . ": $code has 0 messages." );
			}

			if ( $this->noComplete && $fuzzy === 0 && $translated === $total ) {
				return '';
			}

			if ( $this->noEmpty && $translated === 0 && $fuzzy === 0  ) {
				return '';
			}

			if ( $translated === $total ) {
				$extra = array( 'task' => 'reviewall' );
			} else {
				$extra = array();
			}
		}

		$this->totals = MessageGroupStats::multiAdd( $this->totals, $stats );

		$out  = "\t" . Html::openElement( 'tr' );
		$out .= "\n\t\t" . $this->getMainColumnCell( $code, $extra );
		$out .= $this->table->makeNumberColumns( $fuzzy, $translated, $total );
		$out .= $this->getWorkflowStateCell( $code );

		$out .= "\n\t" . Html::closeElement( 'tr' ) . "\n";
		return $out;
	}

	/**
	 * @param $code
	 * @param $params
	 * @return string
	 */
	protected function getMainColumnCell( $code, $params ) {
		if ( !isset( $this->names ) ) {
			global $wgLang;
			$this->names = TranslateUtils::getLanguageNames( $wgLang->getCode() );
			$this->translate = SpecialPage::getTitleFor( 'Translate' );
		}

		$queryParameters = $params + array(
			'group' => $this->target,
			'language' => $code
		);

		$text = htmlspecialchars( "$code: {$this->names[$code]}" );
		$link = Linker::link( $this->translate, $text, array(), $queryParameters );
		return Html::rawElement( 'td', array(), $link );
	}
}
