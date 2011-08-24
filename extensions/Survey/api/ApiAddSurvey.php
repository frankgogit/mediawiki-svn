<?php

/**
 * API module to add surveys.
 *
 * @since 0.1
 *
 * @file ApiAddSurvey.php
 * @ingroup Survey
 * @ingroup API
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class ApiAddSurvey extends ApiBase {
	
	public function __construct( $main, $action ) {
		parent::__construct( $main, $action );
	}
	
	public function execute() {
		global $wgUser;
		
		if ( !$wgUser->isAllowed( 'surveyadmin' ) || $wgUser->isBlocked() ) {
			$this->dieUsageMsg( array( 'badaccess-groups' ) );
		}			
		
		$params = $this->extractRequestParams();
		
		foreach ( $params['questions'] as &$question ) {
			$question = SurveyQuestion::newFromUrlData( $question );
		}
		
		$survey = new Survey(
			null,
			$params['name'],
			$params['enabled'] == 1,
			$params['questions']
		);
		
		$this->getResult()->addValue(
			null,
			'success',
			$survey->writeToDB()
		);
		
		$this->getResult()->addValue(
			'survey',
			'id',
			$survey->getId()
		);
		
		$this->getResult()->addValue(
			'survey',
			'name',
			$survey->getName()
		);
	}

	public function getAllowedParams() {
		return array(
			'name' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true,
			),
			'enabled' => array(
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => true,
			),
			'questions' => array(
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_ISMULTI => true,
				ApiBase::PARAM_DFLT => '',
			),
		);
	}
	
	public function getParamDescription() {
		return array(
			'name' => 'The name of the survey',
			'enabled' => 'Enable the survey or not',
			'questions' => 'The questions that make up the survey',
		);
	}
	
	public function getDescription() {
		return array(
			'API module for adding surveys.'
		);
	}
	
	public function getPossibleErrors() {
		return array_merge( parent::getPossibleErrors(), array(
			array( 'missingparam', 'name' ),
			array( 'missingparam', 'enabled' ),
		) );
	}

	protected function getExamples() {
		return array(
			'api.php?action=addsurvey&name=My awesome survey&enabled=1&questions=',
		);
	}	
	
	public function getVersion() {
		return __CLASS__ . ': $Id$';
	}		
	
}
