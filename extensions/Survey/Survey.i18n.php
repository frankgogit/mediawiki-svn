<?php

/**
 * Internationalization file for the Survey extension.
 *
 * @since 0.1
 *
 * @file Survey.i18n.php
 * @ingroup Survey
 *
 * @licence GNU GPL v3+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

$messages = array();

/** English
 * @author Jeroen De Dauw
 */
$messages['en'] = array(
	'survey-desc' => 'Survey tool for MediaWiki',

	'right-surveyadmin' => 'Manage surveys',
	'right-surveysubmit' => 'Participate in surveys',

	'special-survey' => 'Survey admin',
	'special-surveys' => 'Surveys admin',
	'special-surveystats' => 'Survey statistics',
	'special-takesurvey' => 'Take survey',

	'survey-err-id-xor-name' => 'You need to provide either the id or the name of the survey to submit',
	'survey-err-survey-name-unknown' => 'There is no survey with the name "$1"',
	'survey-err-duplicate-name' => 'There already is a survey with name "$1"',

	'surveys-special-addnew' => 'Add a new survey',
	'surveys-special-namedoc' => 'Enter the name for the new survey.',
	'surveys-special-newname' => 'New survey name:',
	'surveys-special-add' => 'Add survey',

	'surveys-special-existing' => 'Existing surveys',
	'surveys-special-name' => 'Name',
	'surveys-special-status' => 'Status',
	'surveys-special-edit' => 'Edit',
	'surveys-special-delete' => 'Delete',
	'surveys-special-enabled' => 'Enabled',
	'surveys-special-disabled' => 'Disabled',
	'surveys-special-confirm-delete' => 'Are you sure you want to delete this survey?',
	'surveys-special-delete-failed' => 'Failed to delete survey.',
);
