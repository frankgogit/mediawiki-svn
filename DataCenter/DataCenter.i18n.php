<?php
/**
 * Internationalisation for DataCenter extension
 *
 * @file
 * @ingroup Extensions
 */

$messages = array();

/** English
 * @author Trevor Parscal
 */
$messages['en'] = array(
	// Groups
	'group-dc-admin' => 'DataCenter Administrators',
	'group-dc-admin-member' => 'DataCenter Administrator',
	'group-dc-viewer' => 'DataCenter Viewers',
	'group-dc-viewer-member' => 'DataCenter Viewer',
	// Page
	'datacenter' => 'DataCenter',
	// Description
	'datacenter-desc' => 'DataCenter Planing and Asset Tracking System',
	// Pages
	'datacenter-ui-page-assets' => 'Assets',
	'datacenter-ui-page-facilities' => 'Facilities',
	'datacenter-ui-page-models' => 'Models',
	'datacenter-ui-page-overview' => 'Overview',
	'datacenter-ui-page-plans' => 'Plans',
	'datacenter-ui-page-repairs' => 'Repairs',
	'datacenter-ui-page-search' => 'Search',
	'datacenter-ui-page-settings' => 'Settings',
	// Types
	'datacenter-ui-type-attachment' => 'Attachment',
	'datacenter-ui-type-field' => 'Field',
	'datacenter-ui-type-location' => 'Location',
	'datacenter-ui-type-model' => 'Model',
	'datacenter-ui-type-object' => 'Object',
	'datacenter-ui-type-plan' => 'Plan',
	'datacenter-ui-type-port' => 'Port',
	'datacenter-ui-type-rack' => 'Rack',
	'datacenter-ui-type-space' => 'Space',
	// Categories
	'datacenter-ui-category-asset' => 'Asset',
	'datacenter-ui-category-facility' => 'Facility',
	'datacenter-ui-category-link' => 'Link',
	'datacenter-ui-category-meta' => 'Meta',
	'datacenter-ui-category-model' => 'Model',
	// Actions
	'datacenter-ui-action-add-type' => 'Add $1',
	'datacenter-ui-action-apply-type' => 'Apply $1',
	'datacenter-ui-action-attach' => 'Attach',
	'datacenter-ui-action-attach-type' => 'Attach $1',
	'datacenter-ui-action-configure' => 'Configure',
	'datacenter-ui-action-create' => 'Create',
	'datacenter-ui-action-create-type' => 'Create $1',
	'datacenter-ui-action-deploy' => 'Deploy',
	'datacenter-ui-action-deploy-type' => 'Deploy $1',
	'datacenter-ui-action-design-type' => 'Design and Deploy $1',
	'datacenter-ui-action-edit' => 'Edit',
	'datacenter-ui-action-export' => 'Export',
	'datacenter-ui-action-history' => 'History',
	'datacenter-ui-action-manage' => 'Manage',
	'datacenter-ui-action-modify' => 'Modify',
	'datacenter-ui-action-remove' => 'Remove',
	'datacenter-ui-action-select-type' => 'Select and Attach $1',
	'datacenter-ui-action-view' => 'View',
	// Options
	'datacenter-ui-option-back' => 'Back',
	'datacenter-ui-option-boolean' => 'Boolean (yes/no)',
	'datacenter-ui-option-false' => 'False',
	'datacenter-ui-option-front' => 'Front',
	'datacenter-ui-option-future' => 'Future',
	'datacenter-ui-option-number' => 'Number',
	'datacenter-ui-option-past' => 'Past',
	'datacenter-ui-option-present' => 'Present',
	'datacenter-ui-option-string' => 'String (single-link)',
	'datacenter-ui-option-tag' => 'Tag',
	'datacenter-ui-option-text' => 'Text (multi-line)',
	'datacenter-ui-option-true' => 'True',
    'datacenter-ui-option-analog' => 'Analog',
    'datacenter-ui-option-audio' => 'Audio',
    'datacenter-ui-option-desktop' => 'Desktop',
    'datacenter-ui-option-digital' => 'Digital',
    'datacenter-ui-option-mixed' => 'Mixed',
    'datacenter-ui-option-module' => 'AddOn Module',
    'datacenter-ui-option-network' => 'Network',
    'datacenter-ui-option-none' => 'None',
    'datacenter-ui-option-other' => 'Other',
    'datacenter-ui-option-portable' => 'Portable',
    'datacenter-ui-option-power' => 'Power',
    'datacenter-ui-option-rackunit' => 'Rack Unit',
    'datacenter-ui-option-sensor' => 'Sensor',
    'datacenter-ui-option-serial' => 'Serial',
    'datacenter-ui-option-video' => 'Video',
    'datacenter-ui-option-virtual' => 'Virtual',
    'datacenter-ui-option-csv' => 'Comma Separated Values (.csv)',
	// Errors
	'datacenter-ui-error-insufficient-data' => 'You have provided insufficient data',
	'datacenter-ui-error-invalid-data' => 'You have provided invalid data',
	'datacenter-ui-error-no-components' => 'No components were provided',
	'datacenter-ui-error-no-fields' => 'No fields were provided',
	'datacenter-ui-error-no-rows' => 'No records found',
	'datacenter-ui-error-no-ui-widget' => 'The user-interface widget "$1" doesn\'t exist',
	// Fields
	'datacenter-ui-field-asset' => 'Asset Tag',
	'datacenter-ui-field-category' => 'Category',
	'datacenter-ui-field-change-summary' => 'Change Summary',
	'datacenter-ui-field-component' => 'Component',
	'datacenter-ui-field-component_type' => 'Component Type',
	'datacenter-ui-field-confirm' => 'Enter "yes" to confirm',
	'datacenter-ui-field-date' => 'Date',
	'datacenter-ui-field-depth' => 'Depth',
	'datacenter-ui-field-form-factor' => 'Form Factor',
	'datacenter-ui-field-format' => 'Format',
	'datacenter-ui-field-global-position' => 'Global Position',
	'datacenter-ui-field-grid-position' => 'Grid Position',
	'datacenter-ui-field-height' => 'Height',
	'datacenter-ui-field-id' => 'ID',
	'datacenter-ui-field-include-meta' => 'Include Meta',
	'datacenter-ui-field-interface' => 'Interface',
	'datacenter-ui-field-kind' => 'Kind',
	'datacenter-ui-field-latitude' => 'Latitude',
	'datacenter-ui-field-location' => 'Location',
	'datacenter-ui-field-longitude' => 'Longitude',
	'datacenter-ui-field-lookup' => 'LookUp',
	'datacenter-ui-field-manufacturer' => 'Manufacturer',
	'datacenter-ui-field-model' => 'Model',
	'datacenter-ui-field-name' => 'Name',
	'datacenter-ui-field-note' => 'Note',
	'datacenter-ui-field-object' => 'Object',
	'datacenter-ui-field-objects' => 'Objects',
	'datacenter-ui-field-orientation' => 'Orientation',
	'datacenter-ui-field-parent' => 'Parent',
	'datacenter-ui-field-ports' => 'Ports',
	'datacenter-ui-field-position' => 'Position',
	'datacenter-ui-field-position-x' => 'X',
	'datacenter-ui-field-position-y' => 'Y',
	'datacenter-ui-field-power' => 'Power',
	'datacenter-ui-field-quantity' => 'Quantity',
	'datacenter-ui-field-rack' => 'Rack',
	'datacenter-ui-field-racks' => 'Racks',
	'datacenter-ui-field-region' => 'Region',
	'datacenter-ui-field-serial' => 'Serial Number',
	'datacenter-ui-field-side' => 'Side',
	'datacenter-ui-field-size' => 'Size',
	'datacenter-ui-field-space' => 'Space',
	'datacenter-ui-field-spaces' => 'Spaces',
	'datacenter-ui-field-tense' => 'Tense',
	'datacenter-ui-field-type' => 'Type',
	'datacenter-ui-field-u-depth' => 'Depth',
	'datacenter-ui-field-u-height' => 'Height',
	'datacenter-ui-field-units' => 'Units',
	'datacenter-ui-field-username' => 'User Name',
	'datacenter-ui-field-uses' => 'Uses',
	'datacenter-ui-field-width' => 'Width',
	// Label
	'datacenter-ui-label-add' => 'Add',
	'datacenter-ui-label-add-type' => 'Add $1',
	'datacenter-ui-label-attach' => 'Attach',
	'datacenter-ui-label-browse-by' => 'Browse by:',
	'datacenter-ui-label-cancel' => 'Cancel',
	'datacenter-ui-label-change-blank-user' => 'System',
	'datacenter-ui-label-change-state-meta' => 'Meta Fields',
	'datacenter-ui-label-change-state-row' => 'Core Fields',
	'datacenter-ui-label-compare-changes' => 'Compare selected changes',
	'datacenter-ui-label-create' => 'Create',
	'datacenter-ui-label-degrees-value' => '$1&deg;',
	'datacenter-ui-label-deploy' => 'Deploy',
	'datacenter-ui-label-export' => 'Export',
	'datacenter-ui-label-export-type' => '$1 Export',
	'datacenter-ui-label-go' => 'Go',
	'datacenter-ui-label-lookup' => 'LookUp',
	'datacenter-ui-label-num-spaces' => '$1 {{PLURAL:$1|space|spaces}}',
	'datacenter-ui-label-num-uses' => '$1 {{PLURAL:$1|use|uses}}',
	'datacenter-ui-label-range' => '$1 {{PLURAL:$1|item|items}}',
	'datacenter-ui-label-remove' => 'Remove',
	'datacenter-ui-label-reset' => 'Reset',
	'datacenter-ui-label-save' => 'Save',
	'datacenter-ui-label-search' => 'Search',
	// Defaults
	'datacenter-ui-default-new-type' => 'New $1',
	// List Headings
	'datacenter-ui-heading-applied-components' => 'Applied Components',
	'datacenter-ui-heading-fields' => 'Fields',
	'datacenter-ui-heading-history' => 'History',
	'datacenter-ui-heading-locations' => 'Locations',
	'datacenter-ui-heading-objects' => 'Objects',
	'datacenter-ui-heading-overview' => 'Overview',
	'datacenter-ui-heading-plans' => 'Plans',
	'datacenter-ui-heading-racks' => 'Racks',
	'datacenter-ui-heading-search-results' => 'Search Results',
	'datacenter-ui-heading-settings' => 'Settings',
	'datacenter-ui-heading-spaces' => 'Spaces',
	// Information Headings
	'datacenter-ui-heading-asset' => 'Asset',
	'datacenter-ui-heading-configuration' => 'Configuration',
	'datacenter-ui-heading-details' => 'Details',
	'datacenter-ui-heading-export' => 'Export Data',
	'datacenter-ui-heading-facility' => 'Facility',
	'datacenter-ui-heading-field' => 'Field',
	'datacenter-ui-heading-location' => 'Location',
	'datacenter-ui-heading-model' => 'Model',
	'datacenter-ui-heading-model-attachments' => 'Model Attachments',
	'datacenter-ui-heading-space' => 'Space',
	// Type-based Headings
	'datacenter-ui-heading-adding-type' => 'Adding $1',
	'datacenter-ui-heading-asset-type' => '$1 Asset',
	'datacenter-ui-heading-assets-type' => '$1 Assets',
	'datacenter-ui-heading-attaching-type' => 'Attaching $1',
	'datacenter-ui-heading-configuring-type' => 'Configuring $1',
	'datacenter-ui-heading-creating-model-type' => 'Creating $1 Model',
	'datacenter-ui-heading-deploying-asset-type' => 'Deploying $1 Asset',
	'datacenter-ui-heading-editing-type' => 'Editing $1',
	'datacenter-ui-heading-history-type' => '$1 History',
	'datacenter-ui-heading-managing-asset-type' => 'Managing $1 Asset',
	'datacenter-ui-heading-model-type' => '$1 Model',
	'datacenter-ui-heading-models-type' => '$1 Models',
	'datacenter-ui-heading-modifying-model-type' => 'Modifying $1 Model',
	'datacenter-ui-heading-remove-type' => 'Remove $1?',
	'datacenter-ui-heading-select-attach-type' => 'Select $1 to Attach',
	'datacenter-ui-heading-select-deploy-type' => 'Select $1 to Deploy',
	// Bodies
	'datacenter-ui-body-error-invalid-request' => 'You have requested a page with an invalid path.',
	'datacenter-ui-body-important-configuring-field' => 'Changing the format of this field may cause related data to be interpreted incorectly, espcially when switching between textual, numeric and boolean formats.',
	'datacenter-ui-body-important-settings' => 'These settings may affect the system in irreversable ways. Please be careful when making adjustments.',
	'datacenter-ui-body-important-welcome' => 'Welcome to the beta-testing of DataCenter. Please poke around and give feedback to [http://www.mediawiki.org/wiki/User:Trevor_Parscal Trevor Parscal]. If want to help out, take a look at the MediaWiki extension page for [http://www.mediawiki.org/wiki/Extension:DataCenter DataCenter] which has a list of feature priorities.',
	'datacenter-ui-body-notice-removing-field' => 'Removing this field will result in the removal of the following links and all data associated with them and cannot be recovered from. Do you want to continue with the removal?',
	'datacenter-ui-body-notice-removing-type' => 'Removing this $1 will result in the removal of the following links and cannot be recovered from. Do you want to continue with the removal?',
	'datacenter-ui-body-notice-no-results' => 'Nothing was found that matched your search terms.',
	// Tabs
	'datacenter-ui-tab-details' => 'Details',
	'datacenter-ui-tab-future' => 'Future',
	'datacenter-ui-tab-interfaces' => 'Interfaces',
	'datacenter-ui-tab-local' => 'Local',
	'datacenter-ui-tab-objects' => 'Objects',
	'datacenter-ui-tab-past' => 'Past',
	'datacenter-ui-tab-plan' => 'Plan',
	'datacenter-ui-tab-plans' => 'Plans',
	'datacenter-ui-tab-present' => 'Present',
	'datacenter-ui-tab-racks' => 'Racks',
	'datacenter-ui-tab-remote' => 'Remote',
	'datacenter-ui-tab-space' => 'Space',
	'datacenter-ui-tab-spaces' => 'Spaces',
);
