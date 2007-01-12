<?php

require_once("forms.php");
require_once("Transaction.php");
require_once("WiktionaryZAttributes.php");

interface WikidataApplication {
	public function view();
	public function edit();
	public function history();
	public function getTitle();
}

class DefaultWikidataApplication implements WikidataApplication {
	protected $showRecordLifeSpan;
	protected $transaction;
	protected $queryTransactionInformation;
	protected $viewQueryTransactionInformation;
	protected $shouldShowAuthorities;
	
	// The following member variables control some application specific preferences
	protected $availableAuthorities = array();  // A map containing (userId => displayName) combination for authoritative contribution view 
	protected $filterLanguageId = 0;            // Filter pages on this languageId, set to 0 to show all languages
	protected $showLanguageSelector = true;     // Show language selector at the top of each wiki data page
	protected $showClassicPageTitles = true;    // Show classic page titles instead of prettier page titles

	public function __construct() {
		global 
			$wgMessageCache;
		
		$wgMessageCache->addMessages(
			array(
				'wz_uilang'=>'Your user interface language: $1',
				'wz_uilang_set'=>'Set your preferences',
				'wz_save' => 'Save',
				'wz_history' => 'History'
			)
		);
	}

	function getLanguageSelector() {
		global 
			$wgUser;
		
		$userlang=$wgUser->getOption('language');
		$skin = $wgUser->getSkin();
			
		return wfMsg('wz_uilang',"<b>$userlang</b>").  " &mdash; " . $skin->makeLink("Special:Preferences", wfMsg('wz_uilang_set'));
	}

	public function view() {
		global
			$wgOut, $wgTitle;
			
		$wgOut->enableClientCache(false);
		
		$titleArray = $wgTitle->getTitleArray();

		if (!$this->showClassicPageTitles) {
			$titleArray["mainpart"] = $this->getTitle();
			$titleArray["namespace"] = ""; 
		}

		$wgOut->setPageTitleArray($titleArray);

		if ($this->showLanguageSelector)
			$wgOut->addHTML($this->getLanguageSelector());

		$this->shouldShowAuthorities = count($this->availableAuthorities) > 0; 

		if ($this->shouldShowAuthorities) {
			$showCommunityContribution = isset($_GET['authority-community']);
			
			$authoritiesToShow = array();
			$authorityOptions = array(
				"Show contribution by the community" => getCheckBox('authority-community', $showCommunityContribution)
			);
			
			foreach($this->availableAuthorities as $authority) {
				$showAuthority = isset($_GET['authority-' . $authority]); 
				
				if ($showAuthority)
					$authoritiesToShow[] = $authority;

				$authorityOptions["Show contribution by " . getUserName($authority)] = getCheckBox('authority-' . $authority, $showAuthority);
			}
	
			$wgOut->addHTML(getOptionPanel($authorityOptions));
		}
		else
			$showCommunityContribution = false;
		
		$this->shouldShowAuthorities = count($authoritiesToShow) > 0 || $showCommunityContribution;
		initializeWiktionaryZAttributes($this->filterLanguageId != 0, $this->shouldShowAuthorities);	
		initializeObjectAttributeEditors($this->filterLanguageId, false, $this->shouldShowAuthorities);
		
		if ($this->shouldShowAuthorities) 
			$this->viewQueryTransactionInformation = new QueryAuthoritativeContributorTransactionInformation($this->availableAuthorities, $authoritiesToShow, $showCommunityContribution);
		else
			$this->viewQueryTransactionInformation = new QueryLatestTransactionInformation();
	}
	
	protected function save($referenceTransaction) {
		initializeWiktionaryZAttributes($this->filterLanguageId != 0, false);	
		initializeObjectAttributeEditors($this->filterLanguageId, false, false);
	}
	
	public function saveWithinTransaction() {
		global
			$wgTitle, $wgUser, $wgRequest;

		$summary = $wgRequest->getText('summary');

		startNewTransaction($wgUser->getID(), wfGetIP(), $summary);
		$this->save(new QueryAtTransactionInformation($wgRequest->getInt('transaction'), false));

		Title::touchArray(array($wgTitle));
		$now = wfTimestampNow();
		RecentChange::notifyEdit($now, $wgTitle, false, $wgUser, $summary, 0, $now, false, '', 0, 0, 0);
	}
	
	public function edit() {
		global
			$wgOut, $wgRequest;
			
		if ($wgRequest->getText('save') != '') 
			$this->saveWithinTransaction();

		if ($this->showLanguageSelector)
			$wgOut->addHTML($this->getLanguageSelector());
			
		initializeWiktionaryZAttributes($this->filterLanguageId != 0, false);	
		initializeObjectAttributeEditors($this->filterLanguageId, false, false);
	}
	
	public function history() {
		global
			$wgOut, $wgTitle, $wgRequest;
			
		$titleArray = $wgTitle->getTitleArray();
		$titleArray["actionprefix"] = wfMsg('wz_history');

		if (!$this->showClassicPageTitles) {
			$titleArray["mainpart"] = $this->getTitle();
			$titleArray["namespace"] = ""; 
		}

		$wgOut->setPageTitleArray($titleArray);
		
		if (isset($_GET['show'])) {
			$this->showRecordLifeSpan = isset($_GET["show-record-life-span"]);
			$this->transaction = (int) $_GET["transaction"];
		}	
		else {
			$this->showRecordLifeSpan = true;
			$this->transaction = 0;
		}
		
		if ($this->transaction == 0)
			$this->queryTransactionInformation = new QueryHistoryTransactionInformation();
		else
			$this->queryTransactionInformation = new QueryAtTransactionInformation($this->transaction, $this->showRecordLifeSpan);
			
		$transactionId = $wgRequest->getInt('transaction');

		if ($this->showLanguageSelector)
			$wgOut->addHTML($this->getLanguageSelector());
			
		$wgOut->addHTML(getOptionPanel(
			array(
				'Transaction' => getSuggest('transaction','transaction', array(), $transactionId, getTransactionLabel($transactionId), array(0, 2, 3)),
				'Show record life span' => getCheckBox('show-record-life-span',$this->showRecordLifeSpan)
			),
			'history'
		));

		initializeWiktionaryZAttributes($this->filterLanguageId != 0, true);	
		initializeObjectAttributeEditors($this->filterLanguageId, $this->showRecordLifeSpan, false);
	}
	
	protected function outputEditHeader() {
		global
			$wgOut, $wgTitle;
			
		$titleArray = $wgTitle->getTitleArray();
		if (!$this->showClassicPageTitles) {
			$titleArray["mainpart"] = $this->getTitle();
			$titleArray["namespace"] = ""; 
		}
			 
		$titleArray["actionprefix"] = wfMsg('editing');
		$wgOut->setPageTitleArray($titleArray);

		$wgOut->addHTML(
			'<form method="post" action="">' .
				'<input type="hidden" name="transaction" value="'. getLatestTransactionId() .'"/>'
		);
	}
	
	protected function outputEditFooter() {
		global
			$wgOut;
		
		$wgOut->addHTML(
			'<div class="option-panel">'.
				'<table cellpadding="0" cellspacing="0"><tr>' .
					'<th>' . wfMsg('summary') . ': </th>' .
					'<td class="option-field">' . getTextBox("summary") .'</td>' .
				'</tr></table>' .
				getSubmitButton("save", wfMsg('wz_save')).
			'</div>'
		);
		
		$wgOut->addHTML('</form>');
		$wgOut->addHTML(DefaultEditor::getExpansionCss());
		$wgOut->addHTML("<script language='javascript'><!--\nexpandEditors();\n--></script>");
	}
	
	public function getTitle() {
		global
			$wgTitle;
			
		return $wgTitle->getText();
	}
}

?>
