<?php

$dir = dirname( __FILE__ ) . '/';
require_once( $dir . '../gateway_common/gateway.adapter.php' );

class GlobalCollectAdapter extends GatewayAdapter {
	//Contains the map of THEIR var names, to OURS.
	//I'd have gone the other way, but we'd run into 1:many pretty quick. 

	const gatewayname = 'Global Collect';
	const identifier = 'globalcollect';
	const communicationtype = 'xml';
	const globalprefix = 'wgGlobalCollectGateway';

	/**
	 * Anything we need to do to the data coming in, before we send it off. 
	 */
	function stageData(){
		//TODO: Make a Thing in which we do things like this. 
		$this->postdata['amount'] = $this->postdata['amount'] * 100;
	}
	
	function __construct( ) {
		$this->classlocation = __FILE__;
		
		parent::__construct();

		$returnTitle = Title::newFromText( 'Donate-thanks/en' );
		$returnto = $returnTitle->getFullURL();

		//this DEFINITELY needs to be defined in the parent class, and contain everything anybody might want to know.
		$this->postdatadefaults = array(
			'order_id' => '112358' . rand(),
			'amount' => '11.38',
			'currency' => 'USD',
			'language' => 'en',
			'country' => 'US',
			'returnto' => $returnto,
			'user_ip' => ( self::getGlobal('Test') ) ? '12.12.12.12' : wfGetIP(), // current user's IP address
		);


		///ehh. Most of this should be broken up into functions for the sake of readibility. 

		$this->var_map = array(
			'ORDERID' => 'order_id',
			'AMOUNT' => 'amount',
			'CURRENCYCODE' => 'currency',
			'LANGUAGECODE' => 'language',
			'COUNTRYCODE' => 'country',
			'MERCHANTREFERENCE' => 'order_id',
			'RETURNURL' => 'returnto', //I think. It might not even BE here yet. Boo-urns. 
			'IPADDRESS' => 'user_ip', //TODO: Not sure if this should be OUR ip, or the user's ip. Hurm.
		);

		$this->return_value_map = array(
			'OK' => true,
			'NOK' => false,
		);

		global $wgDonationInterfaceTest; //this is so the forms can see it. 
		if ( !self::getGlobal('Test') ) {
			$this->url = self::getGlobal('URL');
			$wgDonationInterfaceTest = false;
		} else {
			$this->url = self::getGlobal('TestingURL');
			$wgDonationInterfaceTest = true;
		}

		$this->accountInfo = array(
			'MERCHANTID' => self::getGlobal('MerchantID'),
			//'IPADDRESS' => '', //TODO: Not sure if this should be OUR ip, or the user's ip. Hurm. 
			'VERSION' => "1.0",
		);

		//oof. This is getting a little long and unwieldy. Maybe we should build it. Or maybe that sucks. I can't tell yet.
		/* General idea here:
		 * This bad boy will (probably) contain the structure of all possible transactions as defined by the gateway. 
		 * First array key: Some way for us to id the transaction. Doesn't actually have to be the gateway's name for it, but
		 * I'm starting with that.
		 * Second array key: 
		 * 		'structure' contains the layout of that transaction.
		 * 		'defaults' contains default values for the leaf 'values' 
		 * 		I could put a 'type' in here, but I think we can assume that if 'structure' is multi-layer, we're XML.
		 * Array "leaves" in 'structure' will be assigned a value according to the var_map, and the posted data. 
		 * 	There should also be a mechanism for assigning defaults, but I'm not entirely sure what that would look like quite yet...
		 * 
		 */
		$this->transactions = array(
			'INSERT_ORDERWITHPAYMENT' => array(
				'request' => array(
					'REQUEST' => array(
						'ACTION',
						'META' => array(
							'MERCHANTID',
//							'IPADDRESS',
							'VERSION'
						),
						'PARAMS' => array(
							'ORDER' => array(
								'ORDERID',
								'AMOUNT',
								'CURRENCYCODE',
								'LANGUAGECODE',
								'COUNTRYCODE',
								'MERCHANTREFERENCE'
							),
							'PAYMENT' => array(
								'PAYMENTPRODUCTID',
								'AMOUNT',
								'CURRENCYCODE',
								'LANGUAGECODE',
								'COUNTRYCODE',
								'HOSTEDINDICATOR',
								'RETURNURL',
							)
						)
					)
				),
				'values' => array(
					'ACTION' => 'INSERT_ORDERWITHPAYMENT',
					'HOSTEDINDICATOR' => '1',
					'PAYMENTPRODUCTID' => '3',
				),
				'result' => array( //just like the rest: This is still in flux. But the idea here is that this is the sctucture you'd scan for. 
					'RESULT' => 'value'
				),
				'result_errors' => array(
					'ERROR' => array(
						'CODE' => 'value', //as opposed to "attribute", which would imply that it belongs to the parent...
						'MESSAGE' => 'value',
					)
				),
				'result_data' => array(
					'ROW' => array(
					//uhh... presumably we'd look for some Stuff in here. 
					)
				)
			),
			'TEST_CONNECTION' => array(
				'request' => array(
					'REQUEST' => array(
						'ACTION',
						'META' => array(
							'MERCHANTID',
//							'IPADDRESS',
							'VERSION'
						),
						'PARAMS' => array( )
					)
				),
				'values' => array(
					'ACTION' => 'TEST_CONNECTION'
				),
				'result' => array( //just like the rest: This is still in flux. But the idea here is that this is the sctucture you'd scan for. 
					'RESULT' => 'value'
				),
				'result_errors' => array(
					'ERROR' => array(
						'CODE' => 'value', //as opposed to "attribute", which would imply that it belongs to the parent...
						'MESSAGE' => 'value',
					)
				),
				'result_data' => array(
					'ROW' => array(
					//uhh... presumably we'd look for some Stuff in here. 
					)
				)
			),
		);
	}

	/**
	 * Take the entire response string, and strip everything we don't care about.
	 * For instance: If it's XML, we only want correctly-formatted XML. Headers must be killed off. 
	 * return a string.
	 */
	function getFormattedResponse( $rawResponse ){
		$xmlString = $this->stripXMLResponseHeaders($rawResponse);
		$displayXML = $this->formatXmlString( $xmlString );
		$realXML = new DomDocument( '1.0' );
		self::log( "Here is the Raw XML: " . $displayXML ); //I am apparently a huge fibber.
		$realXML->loadXML( trim( $xmlString ) );
		return $realXML;
	}
	
	/**
	 * Parse the response to get the status. Not sure if this should return a bool, or something more... telling.
	 */
	function getResponseStatus( $response ){

		$aok = true;

		foreach ( $response->getElementsByTagName( 'RESULT' ) as $node ) {
			if ( array_key_exists( $node->nodeValue, $this->return_value_map ) && $this->return_value_map[$node->nodeValue] !== true ) {
				$aok = false;
			}
		}
		
		return $aok;		
	}
	
	/**
	 * Parse the response to get the errors in a format we can log and otherwise deal with.
	 * return a key/value array of codes (if they exist) and messages. 
	 */
	function getResponseErrors( $response ){
		$errors = array();
		foreach ( $response->getElementsByTagName( 'ERROR' ) as $node ) {
			$code = '';
			$message = '';
			foreach ( $node->childNodes as $childnode ) {
				if ($childnode->nodeName === "CODE"){
					$code = $childnode->nodeValue;
				}
				if ($childnode->nodeName === "MESSAGE"){
					$message = $childnode->nodeValue;
				}
			}
			$errors[$code] = $message;
			self::log( "ON NOES! ERRORS: " . print_r($errors, true) );
		}
		return $errors;
	}
	
	/**
	 * Harvest the data we need back from the gateway. 
	 * return a key/value array
	 */
	function getResponseData( $response ){
		$data = array();
		foreach ( $response->getElementsByTagName( 'ROW' ) as $node ) {
			foreach ( $node->childNodes as $childnode ) {
				if (trim($childnode->nodeValue) != ''){
					$data[$childnode->nodeName] = $childnode->nodeValue;
				}
			}
		}
		self::log( "Returned Data: " . print_r($data, true));
		return $data;
	}

}
