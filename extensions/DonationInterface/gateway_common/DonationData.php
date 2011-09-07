<?php

/**
 * Description of DonationData
 *
 * @author khorn
 */
class DonationData {
	
	protected $normalized = array();
	
	public $boss;
	
	function __construct($owning_class){
		//TODO: Actually think about this bit.
		// ...and keep in mind we can re-populate if it's a test or whatever. (But that may not be a good idea either)
		//maybe we should just explicitly pass in where we get the data from. (Test, post, API...)
		$this->boss = $owning_class;
		$this->populateData();
	}
	
	function populateData($test = false, $testdata = false){
		$this->normalized = array();
		//TODO: Uh, the API should probably be able to get in this far, too... and have its own populate function. 
		//Maybe check for the boss class...
		if ($test){
			$this->populateData_Test($testdata = false);
		} else {
			$this->populateData_Form();
		}
		//TODO: Unit test the goodness out of this thing. 
		$this->doCacheStuff();
		
		
		if (!empty($this->normalized)){
			$this->setNormalizedAmount();
			$this->setNormalizedOrderIDs();
			$this->setGateway();
			array_walk( $this->normalized, array( $this, 'sanitizeInput' ) );
		}
		//TODO: determine if _nocache_ is still a thing anywhere.
		if ( !empty($this->normalized) && ( $this->getVal('numAttempt') == '0' && (( !$this->getVal('utm_source_id') == false ) || $this->getVal('_nocache_') == 'true' ) )) {
			$this->saveContributionTracking();
		}
		
		self::log("FORM DATA OBJECT: Data has been populated! " . print_r($this->normalized, true));
	}
	
	function getData(){
		return $this->normalized;
	}
	
	function isCache(){
		return $this->cache;
	}
	
	function populateData_Test($testdata = false){
		if (is_array($testdata)){
			$this->normalized = $testdata;
		} else {
			// define arrays of cc's and cc #s for random selection
			$cards = array( 'american' );
			$card_nums = array(
				'american' => array(
					378282246310005
				),
			);

			// randomly select a credit card
			$card_index = array_rand( $cards );

			// randomly select a credit card #
			$card_num_index = array_rand( $card_nums[ $cards[ $card_index ]] );
			
			global $wgRequest; //TODO: ARRRGHARGHARGH. That is all.

			$this->normalized = array(
				'amount' => ( $amount != "0.00" ) ? $amount : "35",
				'amountOther' => '',
				'email' => 'test@example.com',
				'fname' => 'Tester',
				'mname' => 'T.',
				'lname' => 'Testington',
				'street' => '548 Market St.',
				'city' => 'San Francisco',
				'state' => 'CA',
				'zip' => '94104',
				'country' => 'US',
				'fname2' => 'Testy',
				'lname2' => 'Testerson',
				'street2' => '123 Telegraph Ave.',
				'city2' => 'Berkeley',
				'state2' => 'CA',
				'zip2' => '94703',
				'country2' => 'US',
				'size' => 'small',
				'premium_language' => 'es',
				'card_num' => $card_nums[ $cards[ $card_index ]][ $card_num_index ],
				'card' => $cards[ $card_index ],
				'expiration' => date( 'my', strtotime( '+1 year 1 month' ) ),
				'cvv' => '001',
				'currency' => 'USD',
				'payment_method' => $wgRequest->getText( 'payment_method' ),
				'order_id' => $order_id,
				'i_order_id' => $i_order_id,
				'numAttempt' => $numAttempt,
				'referrer' => 'http://www.baz.test.com/index.php?action=foo&action=bar',
				'utm_source' => self::getUtmSource(),
				'utm_medium' => $wgRequest->getText( 'utm_medium' ),
				'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
				'language' => 'en',
				'comment-option' => $wgRequest->getText( 'comment-option' ),
				'comment' => $wgRequest->getText( 'comment' ),
				'email-opt' => $wgRequest->getText( 'email-opt' ),
				'test_string' => $wgRequest->getText( 'process' ),
				'token' => $token,
				'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
				'data_hash' => $wgRequest->getText( 'data_hash' ),
				'action' => $wgRequest->getText( 'action' ),
				'gateway' => 'payflowpro',
				'owa_session' => $wgRequest->getText( 'owa_session', null ),
				'owa_ref' => $owa_ref,
			);
		}
	}
	
	function populateData_Form(){
		global $wgRequest; //I'll let you have this one, because it makes sense. 
		$this->normalized = array(
			'posted' => 'true', //moderately sneaky. 
			'amount' => $wgRequest->getText( 'amount', null ),
			'amountGiven' => $wgRequest->getText( 'amountGiven', null ),
			'amountOther' => $wgRequest->getText( 'amountOther', null ),
			'email' => $wgRequest->getText( 'emailAdd' ),
			'fname' => $wgRequest->getText( 'fname' ),
			'mname' => $wgRequest->getText( 'mname' ),
			'lname' => $wgRequest->getText( 'lname' ),
			'street' => $wgRequest->getText( 'street' ),
			'city' => $wgRequest->getText( 'city' ),
			'state' => $wgRequest->getText( 'state' ),
			'zip' => $wgRequest->getText( 'zip' ),
			'country' => $wgRequest->getText( 'country' ),
			'fname2' => $wgRequest->getText( 'fname' ),
			'lname2' => $wgRequest->getText( 'lname' ),
			'street2' => $wgRequest->getText( 'street' ),
			'city2' => $wgRequest->getText( 'city' ),
			'state2' => $wgRequest->getText( 'state' ),
			'zip2' => $wgRequest->getText( 'zip' ),
			/**
			 * For legacy reasons, we might get a 0-length string passed into the form for country2.  If this happens, we need to set country2
			 * to be 'country' for downstream processing (until we fully support passing in two separate addresses).  I thought about completely
			 * disabling country2 support in the forms, etc but realized there's a chance it'll be resurrected shortly.  Hence this silly hack.
			 */
			'country2' => ( strlen( $wgRequest->getText( 'country2' ))) ? $wgRequest->getText( 'country2' ) : $wgRequest->getText( 'country' ),
			'size' => $wgRequest->getText( 'size' ),
			'premium_language' => $wgRequest->getText( 'premium_language', "en" ),
			'card_num' => str_replace( ' ', '', $wgRequest->getText( 'card_num' ) ),
			'card' => $wgRequest->getText( 'card' ),
			'expiration' => $wgRequest->getText( 'mos' ) . substr( $wgRequest->getText( 'year' ), 2, 2 ),
			'cvv' => $wgRequest->getText( 'cvv' ),
			'currency' => $wgRequest->getText( 'currency_code' ),
			'payment_method' => $wgRequest->getText( 'payment_method' ),
			'order_id' => $wgRequest->getText( 'order_id', null ), //as far as I know, this won't actually ever pull anything back.
			'i_order_id' => $wgRequest->getText( 'i_order_id', null ),
			'numAttempt' => $wgRequest->getVal( 'numAttempt', 0 ),
			'referrer' => ( $wgRequest->getVal( 'referrer' ) ) ? $wgRequest->getVal( 'referrer' ) : $wgRequest->getHeader( 'referer' ),
			'utm_source' => self::getUtmSource(), //TODO: yes. That.
			'utm_medium' => $wgRequest->getText( 'utm_medium' ),
			'utm_campaign' => $wgRequest->getText( 'utm_campaign' ),
			// try to honor the user-set language (uselang), otherwise the language set in the URL (language)
			'language' => $wgRequest->getText( 'uselang', $wgRequest->getText( 'language' ) ),
			'comment-option' => $wgRequest->getText( 'comment-option' ),
			'comment' => $wgRequest->getText( 'comment' ),
			'email-opt' => $wgRequest->getText( 'email-opt' ),
			'test_string' => $wgRequest->getText( 'process' ), // for showing payflow string during testing
			'_cache_' => $wgRequest->getText( '_cache_', null ),
			'token' => $wgRequest->getText( 'token', null ),
			'contribution_tracking_id' => $wgRequest->getText( 'contribution_tracking_id' ),
			'data_hash' => $wgRequest->getText( 'data_hash' ),
			'action' => $wgRequest->getText( 'action' ),
			'gateway' => $wgRequest->getText( 'gateway' ), //likely to be reset shortly by setGateway();
			'owa_session' => $wgRequest->getText( 'owa_session', null ),
			'owa_ref' => $wgRequest->getText( 'owa_ref', null ),
		);
		if (!$wgRequest->wasPosted()){
			$this->setVal('posted', false);
		}  
	}
	
	function isSomething($key){
		if (array_key_exists($key, $this->normalized) && !empty($this->normalized[$key])){
			return true;
		} else {
			return false;
		}
	}
	
	function getVal($key){
		if ($this->isSomething($key)){
			return $this->normalized[$key];
		} else {
			return null;
		}
	}
	
	function setVal($key, $val){
		$this->normalized[$key] = $val;
	}
	
	function expunge($key){ 
		if (array_key_exists($key, $this->normalized)){
			unset($this->normalized[$key]);
		}
	}
	
	function setNormalizedAmount(){
//		// find out if amount was a radio button or textbox, set amount
//		if ( isset( $_REQUEST['amount'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amount' ) ) ) {
//			$amount = $wgRequest->getText( 'amount' );
//		} elseif ( isset( $_REQUEST['amountGiven'] ) && preg_match( '/^\d+(\.(\d+)?)?$/', $wgRequest->getText( 'amountGiven' ) ) ) {
//			$amount = number_format( $wgRequest->getText( 'amountGiven' ), 2, '.', '' );
//		} elseif ( isset( $_REQUEST['amount'] ) ) {
//			$amount = '0.00';
//		} elseif ( $wgRequest->getText( 'amount' ) == '-1' ) {
//			$amount = $wgRequest->getText( 'amountOther' );
//		} else {
//			$amount = '0.00';
//		}
		
		if (!($this->isSomething('amount')) || !(preg_match( '/^\d+(\.(\d+)?)?$/', $this->getVal('amount') ) )){
			if ($this->isSomething('amountGiven') && preg_match( '/^\d+(\.(\d+)?)?$/', $this->getVal('amountGiven') ) ){
				$this->setVal('amount', number_format( $this->getVal('amountGiven'), 2, '.', '' ));
			} elseif ($this->isSomething('amount') && $this->getVal('amount') == '-1'){
				$this->setVal('amount', $this->getVal('amountOther'));
			} else {
				$this->setVal('amount', '0.00');
			}
		}
		
		$this->expunge('amountGiven');
		$this->expunge('amountOther');
	}
	
	function setOwaRefId(){
		//Our data should already be pulled and whatever. 
		if( $this->isSomething( 'owa_ref' ) && !is_numeric( $this->normalized['owa_ref'] )){
			$owa_ref = $this->get_owa_ref_id( $owa_ref );
		}
	}
	
	function setNormalizedOrderIDs(){
		//basically, we need a new order_id every time we come through here, but if there's an internal already there, 
		//we want to use that one internally. So. 
		$this->setVal('order_id', $this->generateOrderId());
		
		if (!$this->isSomething('i_order_id')){	
			$this->setVal('i_order_id', $this->generateOrderId());
		}
		
		//TODO: Take this out when you know it's okay. 
		//In fact: TODO: Clean up the logs all over. 
		
		$this->log("Internal Order ID = " . $this->getVal('i_order_id'));
		
	}
	
	/**
	 * Generate an order id exactly once for this go-round. 
	 */
	function generateOrderId() {
		static $order_id = null;
		if ($order_id === null){
			$order_id = ( double ) microtime() * 1000000 . mt_rand( 1000, 9999 );
		}
		return $order_id;
	}
	
	
	/**
	 * Sanitize user input
	 * 
	 * Intended to be used with something like array_walk
	 * 
	 * @param $value The value of the array
	 * @param $key The key of the array
	 * @param $flags The flag constant for htmlspecialchars
	 * @param $double_encode Whether or not to double-encode strings
	 */
	public function sanitizeInput( &$value, $key, $flags=ENT_COMPAT, $double_encode=false ) {
		$value = htmlspecialchars( $value, $flags, 'UTF-8', $double_encode );
	}
	
	function log($message, $log_level=LOG_INFO){
		if (class_exists($this->boss)){
			$c = $this->boss;
			$c::log($message, $log_level);
		}
	}
	
	function setGateway(){
		//TODO: Hum. If we have some other gateway in the form data, should we go crazy here? (Probably)
		if (class_exists($this->boss)){
			$c = $this->boss;
			$gateway = $c::getIdentifier();
			$this->setVal('gateway', $gateway);
		} 
	}
	
	function doCacheStuff(){
		//TODO: Wow, name.  
		global $wgRequest;
		
		// if _cache_ is requested by the user, do not set a session/token; dynamic data will be loaded via ajax
		if ( $this->isSomething( '_cache_' ) ) {
			self::log( $this->getAnnoyingOrderIDLogLinePrefix() . ' Cache requested', LOG_DEBUG );
			$this->cache = true; //TODO: If we don't need this, kill it in the face. 
			$this->setVal( 'token', 'cache' );

			// if we have squid caching enabled, set the maxage
			global $wgUseSquid, $wgOut;
			$g = $this->boss; //the 'g' is for "Gateway"!
			$maxAge = $g::getGlobal('SMaxAge');

			if ( $wgUseSquid ) {
				self::log( $this->getAnnoyingOrderIDLogLinePrefix() . ' Setting s-max-age: ' . $maxAge, LOG_DEBUG );
				$wgOut->setSquidMaxage( $maxAge );	
			}
		} else {
			$this->cache = false; //TODO: Kill this one in the face, too. (see above) 
		}
	}
	
	function getAnnoyingOrderIDLogLinePrefix(){
		//TODO: ...aww. But it's so descriptive. 
		return $this->getVal( 'order_id' ) .  ' ' . $this->getVal( 'i_order_id' ) . ': ';
	}
	
	
	/**
	 * Establish an 'edit' token to help prevent CSRF, etc
	 *
	 * We use this in place of $wgUser->editToken() b/c currently
	 * $wgUser->editToken() is broken (apparently by design) for
	 * anonymous users.  Using $wgUser->editToken() currently exposes
	 * a security risk for non-authenticated users.  Until this is
	 * resolved in $wgUser, we'll use our own methods for token
	 * handling.
	 *
	 * @var mixed $salt
	 * @return string
	 */
	public function getEditToken( $salt = '' ) {

		// make sure we have a session open for tracking a CSRF-prevention token
		self::ensureSession();
		
		$g = $this->boss;
		$gateway_ident = $g::getIdentifier();

		if ( !isset( $_SESSION[ $gateway_ident . 'EditToken' ] ) ) {
			// generate unsalted token to place in the session
			$token = self::generateToken();
			$_SESSION[ $gateway_ident . 'EditToken' ] = $token;
		} else {
			$token = $_SESSION[ $gateway_ident . 'EditToken' ];
		}

		if ( is_array( $salt ) ) {
			$salt = implode( "|", $salt );
		}
		return md5( $token . $salt ) . EDIT_TOKEN_SUFFIX;
	}

	/**
	 * Generate a token string
	 *
	 * @var mixed $salt
	 * @return string
	 */
	public static function generateToken( $salt = '' ) {
		$token = dechex( mt_rand() ) . dechex( mt_rand() );
		return md5( $token . $salt );
	}

	/**
	 * Determine the validity of a token
	 *
	 * @var string $val
	 * @var mixed $salt
	 * @return bool
	 */
	function matchEditToken( $val, $salt = '' ) {
		// fetch a salted version of the session token
		$sessionToken = $this->getEditToken( $salt );
		if ( $val != $sessionToken ) {
			wfDebug( "DonationData::matchEditToken: broken session data\n" );
		}
		$this->log("Val = $val");
		$this->log("Session Token = $sessionToken");
		return $val == $sessionToken;
	}

	/**
	 * Unset the payflow edit token from a user's session
	 */
	function unsetEditToken() {
		$g = $this->boss;
		$gateway_ident = $g::getIdentifier();
		unset( $_SESSION[ $gateway_ident . 'EditToken' ] );
	}

	/**
	 * Ensure that we have a session set for the current user
	 *
	 * If we do not have a session set for the current user,
	 * start the session.
	 */
	public static function ensureSession() {
		// if the session is already started, do nothing
		if ( session_id() ) return;

		// otherwise, fire it up using global mw function wfSetupSession
		wfSetupSession();
	}
	
	public function checkTokens() {
		static $match = null;
		
		if ($match === null) {
			
			$g = $this->boss;
			$salt = $g::getGlobal('Salt');
			
			// establish the edit token to prevent csrf
			$token = $this->getEditToken( $salt );
			
			$this->log( $this->getAnnoyingOrderIDLogLinePrefix() . ' editToken: ' . $token, LOG_DEBUG );
			
			// match token
			$token_check = ( $this->isSomething( 'token' ) ) ? $this->getVal( 'token' ) : $token; //TODO: does this suck as much as it looks like it does? 
			$match = $this->matchEditToken( $token_check, $salt );
			if ( $this->wasPosted() ) {
				$this->log( $this->getAnnoyingOrderIDLogLinePrefix() . ' Submitted edit token: ' . $this->getVal( 'token' ), LOG_DEBUG);
				$this->log( $this->getAnnoyingOrderIDLogLinePrefix() . ' Token match: ' . ($match ? 'true' : 'false' ), LOG_DEBUG );
			}
			
		}
		
		return $match;
	}
	
	function wasPosted(){
		//TODO: Get rid of these log statements. 
		if ( $this->isSomething('posted') ){
			$this->log("Posted = '" . $this->getVal('posted') . "'");
			return true;
		}
		$this->log("We were NOT Posted.");
		return false;
	}

	
	
	
	/**
	 * Get the utm_source string
	 *
	 * Checks to see if the utm_source is set properly for the credit card
	 * form including any cc form variants (identified by utm_source_id).  If
	 * anything cc form related is out of place for the utm_source, this
	 * will fix it.
	 *
	 * the utm_source is structured as: banner.landing_page.payment_instrument
	 *
	 * @param string $utm_source The utm_source for tracking - if not passed directly,
	 * 	we try to figure it out from the request object
	 * @param int $utm_source_id The utm_source_id for tracking - if not passed directly,
	 * 	we try to figure it out from the request object
	 * @return string The full utm_source
	 */
	public static function getUtmSource( $utm_source = null, $utm_source_id = null ) {
		global $wgRequest;

		/**
		 * fetch whatever was passed in as the utm_source
		 *
		 * if utm_source was not passed in as a param, we try to divine it from
		 * the request.  if it's not set there, no big deal, we'll just be
		 * missing some tracking data.
		 */
		if ( is_null( $utm_source ) ) {
			$utm_source = $wgRequest->getText( 'utm_source' );
		}

		/**
		 * if we have a utm_source_id, then the user is on a single-step credit card form.
		 * if that's the case, we treat the single-step credit card form as a landing page,
		 * which we label as cc#, where # = the utm_source_id
		 */
		if ( is_null( $utm_source_id ) ) {
			$utm_source_id = $wgRequest->getVal( 'utm_source_id', 0 );
		}

		// this is how the CC portion of the utm_source should be defined
		$correct_cc_source = ( $utm_source_id ) ? 'cc' . $utm_source_id . '.cc' : 'cc';

		// check to see if the utm_source is already correct - if so, return
		if ( preg_match( '/' . str_replace( ".", "\.", $correct_cc_source ) . '$/', $utm_source ) ) {
			return $utm_source;
		}

		// split the utm_source into its parts for easier manipulation
		$source_parts = explode( ".", $utm_source );

		// if there are no sourceparts element, then the banner portion of the string needs to be set.
		// since we don't know what it is, set it to an empty string
		if ( !count( $source_parts ) ) $source_parts[0] = '';

		// if the utm_source_id is set, set the landing page portion of the string to cc#
		$source_parts[1] = ( $utm_source_id ) ? 'cc' . $utm_source_id : ( isset( $source_parts[1] ) ? $source_parts[1] : '' );

		// the payment instrument portion should always be 'cc' if this method is being accessed
		$source_parts[2] = 'cc';

		// return a reconstructed string
		return implode( ".", $source_parts );
	}
	
	
	/**
	 * Determine proper opt-out settings for contribution tracking
	 *
	 * because the form elements for comment anonymization and email opt-out
	 * are backwards (they are really opt-in) relative to contribution_tracking
	 * (which is opt-out), we need to reverse the values
	 */
	public function getOptOuts() {
		$optout[ 'optout' ] = ( $this->isSomething('email-opt') && $this->getVal('email-opt') == "1" ) ? '0' : '1';
		$optout[ 'anonymous' ] = ( $this->isSomething('comment-option') && $this->getVal('comment-option') == "1" ) ? '0' : '1';
		return $optout;
	}
	

	/**
	 * Clean array of tracking data to contain valid fields
	 *
	 * Compares tracking data array to list of valid tracking fields and
	 * removes any extra tracking fields/data.  Also sets empty values to
	 * 'null' values.
	 * @param bool $clean_opouts 
	 */
	public function getCleanTrackingData( $clean_optouts = false ) {

		// define valid tracking fields
		$tracking_fields = array(
			'note',
			'referrer',
			'anonymous',
			'utm_source',
			'utm_medium',
			'utm_campaign',
			'optout',
			'language',
			'ts'
		);

		foreach ($tracking_fields as $value){
			if ($this->isSomething($value)){
				$tracking_data[$value] = $this->getVal($value);
			} else {
				$tracking_data[$value] = null;
			}
		}
		
		// clean up the optout values if necessary
		if ( $clean_optouts ) {
			$optouts = $this->getOptOuts();
			$tracking_data[ 'optout' ] = $optouts[ 'optout' ];
			$tracking_data[ 'anonymous' ] = $optouts[ 'anonymous' ];
		}

		return $tracking_data;
	}
	
	//if ( !empty($data) && ( $data[ 'numAttempt' ] == '0' && ( !$wgRequest->getText( 'utm_source_id', false ) || $wgRequest->getText( '_nocache_' ) == 'true' ) ) ) {
	//so, basically, if this is the first attempt. This seems to get called nowhere else. 
	function saveContributionTracking() {

		$tracked_contribution = $this->getCleanTrackingData(true);

		// insert tracking data and get the tracking id
		$result = self::insertContributionTracking( $tracked_contribution );
		
		$this->setVal('contribution_tracking_id', $result);

		if ( !$result ) {
			return false;
		}
		return true;
	}

	/**
	 * Insert a record into the contribution_tracking table
	 *
	 * @param array $tracking_data The array of tracking data to insert to contribution_tracking
	 * @return mixed Contribution tracking ID or false on failure
	 */
	public static function insertContributionTracking( $tracking_data ) {
		$db = ContributionTrackingProcessor::contributionTrackingConnection();

		if ( !$db ) { return false; }

		// set the time stamp if it's not already set
		if ( !isset( $tracking_data[ 'ts' ] ) || !strlen( $tracking_data[ 'ts' ] ) ) {
			$tracking_data[ 'ts' ] = $db->timestamp();
		}

		// Store the contribution data
		if ( $db->insert( 'contribution_tracking', $tracking_data ) ) {
		 	return $db->insertId();
		} else {
			return false;
		}
	}
	
	
	/**
	 * Update contribution_tracking table
	 *
	 * @param array $data Form data
	 * @param bool $force If set to true, will ensure that contribution tracking is updated
	 */
	//Looks like two places: Either right before a paypal redirect (if that's still a thing) or 
	//just prior to curling something up to some server somewhere. 
	//I took care of the one just prior to curling. 
	//TODO: Determine if that paypal redirect is still a thing or not. 
	public function updateContributionTracking( $force = false ) {
		// ony update contrib tracking if we're coming from a single-step landing page
		// which we know with cc# in utm_source or if force=true or if contribution_tracking_id is not set
		if ( !$force &&
				!preg_match( "/cc[0-9]/", $this->getVal('utm_source') ) &&
				is_numeric( $this->getVal('contribution_tracking_id') ) ) {
			return;
		}

		$db = ContributionTrackingProcessor::contributionTrackingConnection();

		if ( !$db ) { return true ; }  ///wait, what? TODO: This line was straight copied from the _gateway.body. Find out if there's a good reason we're not returning false here.

		$tracked_contribution = $this->getCleanTrackingData(true);

		// if contrib tracking id is not already set, we need to insert the data, otherwise update
		if ( !$this->getVal('contribution_tracking_id') ) {
			$this->setVal('contribution_tracking_id', $this->insertContributionTracking( $tracked_contribution ));
		} else {
			$db->update( 'contribution_tracking', $tracked_contribution, array( 'id' => $this->getVal('contribution_tracking_id') ) );
		}
	}
	
}

?>
