<?php

/**
 * This groupe contains all Google Maps v3 related files of the Maps extension.
 * 
 * @defgroup MapsGoogleMaps3 Google Maps v3
 * @ingroup Maps
 */

/**
 * This file holds the hook and initialization for the Google Maps v3 service. 
 *
 * @file GoogleMaps3.php
 * @ingroup MapsGoogleMaps3
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgResourceModules['ext.maps.googlemaps3'] = array(
	'dependencies' => array( 'ext.maps.common' ),
	'localBasePath' => dirname( __FILE__ ),
	'remoteBasePath' => $egMapsScriptPath .  '/includes/services/GoogleMaps3',	
	'group' => 'ext.maps',
	'scripts' => array(
		'jquery.googlemap.js',
		'ext.maps.googlemaps3.js',
	),/*
	'styles' => array(
		'ext.maps.googlemaps2.css',
	),*/
	'messages' => array(
		'maps-googlemaps3-incompatbrowser'
	)
);

$wgHooks['MappingServiceLoad'][] = 'efMapsInitGoogleMaps3';

/**
 * Initialization function for the Google Maps v3 service. 
 * 
 * @since 0.6.3
 * @ingroup MapsGoogleMaps3
 * 
 * @return true
 */
function efMapsInitGoogleMaps3() {
	global $wgAutoloadClasses;
	
	$wgAutoloadClasses['MapsGoogleMaps3'] 			= dirname( __FILE__ ) . '/Maps_GoogleMaps3.php';
	$wgAutoloadClasses['MapsGoogleMaps3DispMap'] 	= dirname( __FILE__ ) . '/Maps_GoogleMaps3DispMap.php';
	$wgAutoloadClasses['MapsGoogleMaps3DispPoint'] 	= dirname( __FILE__ ) . '/Maps_GoogleMaps3DispPoint.php';
	$wgAutoloadClasses['MapsParamGMap3Type']		= dirname( __FILE__ ) . '/Maps_ParamGMap3Type.php';
	$wgAutoloadClasses['MapsParamGMap3Typestyle']	= dirname( __FILE__ ) . '/Maps_ParamGMap3Typestyle.php';
	$wgAutoloadClasses['MapsParamGMap3Zoomstyle']	= dirname( __FILE__ ) . '/Maps_ParamGMap3Zoomstyle.php';

	MapsMappingServices::registerService( 'googlemaps3', 'MapsGoogleMaps3' );
	$googleMaps = MapsMappingServices::getServiceInstance( 'googlemaps3' );	
	$googleMaps->addFeature( 'display_map', 'MapsGoogleMaps3DispMap' );
	$googleMaps->addFeature( 'display_point', 'MapsGoogleMaps3DispPoint' );
	
	return true;
}