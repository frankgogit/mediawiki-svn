<?php

/**
 * @group GeoData
 */
class TagTest extends MediaWikiTestCase {
	/**
	 * @dataProvider getData
	 */
	public function testTagParsing( $input, $expected ) {
		$p = new Parser();
		$opt = new ParserOptions();
		$out = $p->parse( $input, Title::newMainPage(), $opt );
		$this->assertTrue( isset( $out->geoData ) );
		if ( !$expected ) {
			$this->assertFalse( $out->geoData['primary'] );
			$this->assertEmpty( $out->geoData['secondary'] );
			return;
		}
		$all = $out->geoData->getAll();
		$this->assertEquals( 1, count( $all ), 'A result was expected' );
		$coord = $all[0];
		foreach ( $expected as $field => $value ) {
			$this->assertEquals( $value, $coord->$field, "Checking field $field" );
		}
	}

	public function getData() {
		return array(
			array(
				'{{#coordinates: 10|20|primary}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'primary' => true ),
			),
			array(
				'{{#coordinates: 10| primary		|	20}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'primary' => true ),
			),
			array(
				'{{#coordinates: primary|10|20}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'primary' => true ),
			),
			array(
				'{{#coordinates: 10|20|type:city}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'type' => 'city' ),
			),
			array(
				'{{#coordinates: 10|20|type:city(666)}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'type' => 'city' ),
			),
			array( 
				'{{#coordinates:10|20|globe:Moon dim:10_region:RU-mos}}',
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'moon', 'country' => 'RU', 'region' => 'MOS' ),
			),
			array( 
				'{{#coordinates:10|20|globe:Moon dim:10_region:RU}}',
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'moon', 'country' => 'RU' ),
			),
			array(
				'{{#coordinates: 10|20|primary|_dim:3Km_}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'primary' => true, 'dim' => 3000 ),
			),
			array(
				'{{#coordinates: 10|20|primary|foo:bar dim:100m}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth', 'dim' => 100 ),
			),
			array(
				'{{#coordinates: 10|20|primary|dim:1L}}', 
				array( 'lat' => 10, 'lon' => 20, 'globe' => 'earth' ),
			),
		);
	}
}