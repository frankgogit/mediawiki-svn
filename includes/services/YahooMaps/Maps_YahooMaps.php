<?php

/**
 * Class holding information and functionallity specific to Yahoo! Maps.
 * This infomation and features can be used by any mapping feature. 
 * 
 * @file Maps_YahooMaps.php
 * @ingroup MapsYahooMaps
 * 
 * @author Jeroen De Dauw
 */
class MapsYahooMaps extends MapsMappingService {

	/**
	 * Mapping for Yahoo! Maps map types. 
	 * See http://developer.yahoo.com/maps/ajax
	 * 
	 * @since 0.7
	 * 
	 * @var array
	 */
	public static $mapTypes = array(
		'normal' => 'YAHOO_MAP_REG',
		'satellite' => 'YAHOO_MAP_SAT',
		'hybrid' => 'YAHOO_MAP_HYB',
	);
	
	/**
	 * Constructor.
	 * 
	 * @since 0.6.6
	 */
	function __construct( $serviceName ) {
		parent::__construct(
			$serviceName,
			array( 'yahoo', 'yahoomap', 'ymap', 'ymaps' )
		);
	}		
	
	/**
	 * @see MapsMappingService::addParameterInfo
	 * 
	 * @since 0.7
	 */		
	public function addParameterInfo( array &$params ) {
		global $egMapsYahooAutozoom, $egMapsYahooMapsType, $egMapsYahooMapsTypes, $egMapsYahooMapsZoom, $egMapsYMapControls;
		
		$params['zoom']->addCriteria( new CriterionInRange( 1, 13 ) );
		$params['zoom']->setDefault( self::getDefaultZoom() );		
		
		$params['controls'] = new ListParameter(
			'controls',
			ListParameter::DEFAULT_DELIMITER,
			Parameter::TYPE_STRING,
			$egMapsYMapControls,
			array(),
			array(
				new CriterionInArray( self::getControlNames() ),
			)			
		);
		$params['controls']->addManipulations( new ParamManipulationImplode( ',', "'" ) );		
		
		$params['type'] = new Parameter(
			'type',
			Parameter::TYPE_STRING,
			$egMapsYahooMapsType,// FIXME: default value should not be used when not present in types parameter.
			array(),
			array(
				new CriterionInArray( self::getTypeNames() ),
			),
			array( 'types' )
		);
		$params['type']->addManipulations( new MapsParamYMapType() );

		$params['types'] = new ListParameter(
			'types',
			ListParameter::DEFAULT_DELIMITER,
			Parameter::TYPE_STRING,
			$egMapsYahooMapsTypes,
			array(),
			array(
				new CriterionInArray( self::getTypeNames() ),
			)
		);
		$params['types']->addManipulations( new MapsParamYMapType(), new ParamManipulationImplode( ',', "'" ) );
		
		$params['autozoom'] = new Parameter(
			'autozoom',
			Parameter::TYPE_BOOLEAN,
			$egMapsYahooAutozoom
		);
		$params['autozoom']->addManipulations( new ParamManipulationBoolstr() );
	}
	
	/**
	 * @see iMappingService::getDefaultZoom
	 * 
	 * @since 0.6.5
	 */	
	public function getDefaultZoom() {
		global $egMapsYahooMapsZoom;
		return $egMapsYahooMapsZoom;
	}

	/**
	 * @see MapsMappingService::getMapId
	 * 
	 * @since 0.6.5
	 */
	public function getMapId( $increment = true ) {
		global $egMapsYahooMapsPrefix;
		static $mapsOnThisPage = 0;
		
		if ( $increment ) {
			$mapsOnThisPage++;
		}
		
		return $egMapsYahooMapsPrefix . '_' . $mapsOnThisPage;
	}		
	
	/**
	 * @see MapsMappingService::createMarkersJs
	 * 
	 * @since 0.6.5
	 */
	public function createMarkersJs( array $markers ) {
		$markerItems = array();
		
		foreach ( $markers as $marker ) {
			$markerItems[] = MapsMapper::encodeJsVar( (object)array(
				'lat' => $marker[0],
				'lon' => $marker[1],
				'title' => $marker[2],
				'label' =>$marker[3],
				'icon' => $marker[4]
			) );
		}
		
		// Create a string containing the marker JS.
		return '[' . implode( ',', $markerItems ) . ']';
	}	
	
	/**
	 * @see MapsMappingService::getDependencies
	 * 
	 * @return array
	 */
	protected function getDependencies() {
		global $egYahooMapsKey, $egMapsScriptPath, $egMapsStyleVersion;
		
		return array(
			Html::linkedScript( "http://api.maps.yahoo.com/ajaxymap?v=3.8&appid=$egYahooMapsKey" ),
			Html::linkedScript( "$egMapsScriptPath/includes/services/YahooMaps/YahooMapFunctions.js?$egMapsStyleVersion" ),
		);		
	}	
	
	/**
	 * Returns the names of all supported map types.
	 * 
	 * @return array
	 */
	public static function getTypeNames() {
		return array_keys( self::$mapTypes );
	}

	/**
	 * Returns the names of all supported controls. 
	 * This data is a copy of the one used to actually translate the names
	 * into the controls, since this resides client side, in YahooMapFunctions.js. 
	 * 
	 * @return array
	 */
	public static function getControlNames() {
		return array( 'scale', 'type', 'pan', 'zoom', 'zoom-short', 'auto-zoom' );
	}

}									