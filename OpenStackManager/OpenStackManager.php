<?php
/**
 * OpenStackManager extension - lets users manage nova and swift
 *
 *
 * For more info see http://mediawiki.org/wiki/Extension:OpenStackManager
 *
 * @file
 * @ingroup Extensions
 * @author Ryan Lane <rlane@wikimedia.org>
 * @copyright © 2010 Ryan Lane
 * @license GNU General Public Licence 2.0 or later
 */

if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'OpenStackManager',
	'author' => 'Ryan Lane',
	'url' => 'http://mediawiki.org/wiki/Extension:OpenStackManager',
	'descriptionmsg' => 'openstackmanager-desc',
);

define( "NS_VM", 498 );
define( "NS_VM_TALK", 499 );
$wgExtraNamespaces[NS_VM] = 'VM';
$wgExtraNamespaces[NS_VM_TALK] = 'VM_talk';

$wgOpenStackManagerNovaDisableSSL = true;
$wgOpenStackManagerNovaServerName = 'localhost';
$wgOpenStackManagerNovaPort = 8773;
$wgOpenStackManagerNovaResourcePrefix = '/services/Cloud/';
$wgOpenStackManagerNovaAdminKeys = array( 'accessKey' => '', 'secretKey' => '' );

$dir = dirname(__FILE__) . '/';

$wgExtensionMessagesFiles['OpenStackManager'] = $dir . 'OpenStackManager.i18n.php';
$wgExtensionAliasesFiles['OpenStackManager'] = $dir . 'OpenStackManager.alias.php';
$wgAutoloadClasses['OpenStackNovaInstance'] = $dir . 'OpenStackNovaInstance.php';
$wgAutoloadClasses['OpenStackNovaKeypair'] = $dir . 'OpenStackNovaKeypair.php';
$wgAutoloadClasses['OpenStackNovaController'] = $dir . 'OpenStackNovaController.php';
$wgAutoloadClasses['OpenStackNovaUser'] = $dir . 'OpenStackNovaUser.php';
$wgAutoloadClasses['SpecialNovaInstance'] = $dir . 'SpecialNovaInstance.php';
$wgAutoloadClasses['SpecialNovaKey'] = $dir . 'SpecialNovaKey.php';
$wgAutoloadClasses['SpecialNovaProject'] = $dir . 'SpecialNovaProject.php';
$wgAutoloadClasses['AmazonEC2'] = $dir . 'aws-sdk/sdk.class.php';
$wgSpecialPages['NovaInstance'] = 'SpecialNovaInstance';
$wgSpecialPageGroups['NovaInstance'] = 'other';
$wgSpecialPages['NovaKey'] = 'SpecialNovaKey';
$wgSpecialPageGroups['NovaKey'] = 'other';
$wgSpecialPages['NovaProject'] = 'SpecialNovaProject';
$wgSpecialPageGroups['NovaProject'] = 'other';

$wgHooks['LDAPSetCreationValues'][] = 'OpenStackNovaUser::LDAPSetCreationValues';

require_once( "$IP/extensions/OpenStackManager/OpenStackNovaProject.php" );
