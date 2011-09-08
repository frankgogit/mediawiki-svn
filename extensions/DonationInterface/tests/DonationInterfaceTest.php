<?php

/**
 * TODO: Something. 
 * Something roughly test-shaped. Here.
 * ...to be more precise: Test that ALL the gateway adapters (Yes: All two of them)
 * are building the XML we think they are, and that they can process sample 
 * return XML the way we think they should. 
 * 
 * TODO: Then, write all the other tests as well. :|
 * 
 * @group Fundraising
 * @group Splunge
 * @group Gateways
 * @author Katie Horn <khorn@wikimedia.org>
 */
class DonationInterfaceTest extends MediaWikiTestCase {

	function testbuildRequestXML() {
		$gateway = new TestAdapter();
		$gateway->publicCurrentTransaction( 'Test1' );
		$built = $gateway->buildRequestXML();
		$expected = '<?xml version="1.0"?>' . "\n";
		$expected .= '<XML><REQUEST><ACTION>Donate</ACTION><ACCOUNT><MERCHANTID>128</MERCHANTID><PASSWORD>k4ftw</PASSWORD><VERSION>3.2</VERSION><RETURNURL>http://localhost/index.php/Donate-thanks/en</RETURNURL></ACCOUNT><DONATION><DONOR> </DONOR><AMOUNT>0</AMOUNT><CURRENCYCODE>USD</CURRENCYCODE><LANGUAGECODE>en</LANGUAGECODE><COUNTRYCODE>US</COUNTRYCODE></DONATION></REQUEST></XML>' . "\n";
		$this->assertEquals($built, $expected, "The constructed XML for transaction type Test1 does not match our expected.");
		
	}
	
	function testParseResponseXML() {
		$gateway = new TestAdapter();
		$returned = $gateway->do_transaction( 'Test2' );
		
		$expected_errors = array(
			128 => "Your shoe's untied...",
			45 => "Low clearance!"
		);
		
		$expected_data = array(
			'thing' => 'stuff',
			'otherthing' => 12,
		);
		
		$this->assertEquals($returned['status'], true, "Status should be true at this point.");
		
		$this->assertEquals($returned['errors'], $expected_errors, "Expected errors were not found.");
		
		$this->assertEquals($returned['data'], $expected_data, "Expected data was not found.");
		
		$this->assertEquals($returned['message'], "Test2 Transaction Successful!", "Expected message was not returned.");
				
	}

}

$dir = dirname( __FILE__ ) . '/';
require_once( $dir . '../gateway_common/gateway.adapter.php' );

class TestAdapter extends GatewayAdapter {

	const gatewayname = 'Test Gateway';
	const identifier = 'testgateway';
	const communicationtype = 'xml';
	const globalprefix = 'wgTestAdapterGateway';

	function stageData(){
		$this->postdata['amount'] = $this->postdata['amount'] * 1000;
		$this->postdata['name'] = $this->postdata['fname'] . " " . $this->postdata['lname'];
	}
	
	function __construct( ) {
		global $wgTestAdapterGatewayTestVar, $wgTestAdapterGatewayUseSyslog;
		$wgTestAdapterGatewayTestVar = "Hi there!";
		$wgTestAdapterGatewayUseSyslog = true;
		$this->classlocation = __FILE__;
		parent::__construct();
		
	}
	
	function defineAccountInfo(){
		$this->accountInfo = array(
			'MERCHANTID' => '128',
			'PASSWORD' => 'k4ftw',
			//'IPADDRESS' => '', //TODO: Not sure if this should be OUR ip, or the user's ip. Hurm. 
			'VERSION' => "3.2",
		);
	}
	
	function defineVarMap(){
		$this->var_map = array(
			'DONOR' => 'name',
			'AMOUNT' => 'amount',
			'CURRENCYCODE' => 'currency',
			'LANGUAGECODE' => 'language',
			'COUNTRYCODE' => 'country',
			'OID' => 'order_id',
			'RETURNURL' => 'returnto', //TODO: Fund out where the returnto URL is supposed to be coming from. 
		);
	}
	
	function defineReturnValueMap(){
		$this->return_value_map = array(
			'AOK' => true,
			'WRONG' => false,
		);
	}
	
	function defineTransactions(){
		$this->transactions = array();
		
		$this->transactions['Test1'] = array(
			'request' => array(
				'REQUEST' => array(
					'ACTION',
					'ACCOUNT' => array(
						'MERCHANTID',
						'PASSWORD',
						'VERSION',
						'RETURNURL',
					),
					'DONATION' => array(
						'DONOR',
						'AMOUNT',
						'CURRENCYCODE',
						'LANGUAGECODE',
						'COUNTRYCODE',
						//'OID', //move this to another test. It's different every time, dorkus.
					)
				)
			),
			'values' => array(
				'ACTION' => 'Donate',
			),
		);
		
		$this->transactions['Test2'] = array(
			'request' => array(
				'REQUEST' => array(
					'ACTION',
				)
			),
			'values' => array(
				'ACTION' => 'Donate2',
			),
		);
		self::log(print_r($this->transactions, true));
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
		foreach ( $response->getElementsByTagName( 'warning' ) as $node ) {
			$code = '';
			$message = '';
			foreach ( $node->childNodes as $childnode ) {
				if ($childnode->nodeName === "code"){
					$code = $childnode->nodeValue;
				}
				if ($childnode->nodeName === "message"){
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
		foreach ( $response->getElementsByTagName( 'ImportantData' ) as $node ) {
			foreach ( $node->childNodes as $childnode ) {
				if (trim($childnode->nodeValue) != ''){
					$data[$childnode->nodeName] = $childnode->nodeValue;
				}
			}
		}
		self::log( "Returned Data: " . print_r($data, true));
		return $data;
	}
	
	function processResponse( $response ) {
		//TODO: Stuff. 
	}
	
	function publicCurrentTransaction( $transaction = '' ){
		$this->currentTransaction( $transaction );
	}
	
	function curl_transaction($data) {
		$data = "";
		$data['result'] = 'BLAH BLAH BLAH BLAH whatever something blah blah<?xml version="1.0"?>' . "\n" . '<XML><Response><Status>AOK</Status><ImportantData><thing>stuff</thing><otherthing>12</otherthing></ImportantData><errorswarnings><warning><code>128</code><message>Your shoe\'s untied...</message></warning><warning><code>45</code><message>Low clearance!</message></warning></errorswarnings></Response></XML>';
		return $data;
	}
}

?>
