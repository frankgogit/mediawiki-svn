<?php

class GlobalCollectGatewayResult extends UnlistedSpecialPage {

	/**
	 * Defines the action to take on a PFP transaction.
	 *
	 * Possible values include 'process', 'challenge',
	 * 'review', 'reject'.  These values can be set during
	 * data processing validation, for instance.
	 *
	 * Hooks are exposed to handle the different actions.
	 *
	 * Defaults to 'process'.
	 * @var string
	 */
	public $action = 'process';

	/**
	 * An array of form errors
	 * @var array
	 */
	public $errors = array( );

	/**
	 * Constructor - set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'GlobalCollectGatewayResult' );
		$this->errors = $this->getPossibleErrors();

		$this->adapter = new GlobalCollectAdapter();
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the page or null
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgExtensionAssetsPath,
		$wgPayFlowProGatewayCSSVersion;

		$referrer = $wgRequest->getHeader( 'referer' );

		global $wgServer;
		//TODO: Whitelist! We only want to do this for servers we are configured to like!
		//I didn't do this already, because this may turn out to be backwards anyway. It might be good to do the work in the iframe, 
		//and then pop out. Maybe. We're probably going to have to test it a couple different ways, for user experience. 
		//However, we're _definitely_ going to need to pop out _before_ we redirect to the thank you or fail pages. 
		if ( strpos( $referrer, $wgServer ) === false ) {
			$wgOut->allowClickjacking();
			$wgOut->addModules( 'iframe.liberator' );
			return;
		}

		$wgOut->addExtensionStyle(
			$wgExtensionAssetsPath . '/DonationInterface/gateway_forms/css/gateway.css?284' .
			$wgPayFlowProGatewayCSSVersion );

		$this->setHeaders();


		// dispatch forms/handling
		if ( $this->adapter->checkTokens() ) {
			// Display form for the first time
			$oid = $wgRequest->getText( 'order_id' );
			$adapter_oid = $this->adapter->getData();
			$adapter_oid = $adapter_oid['order_id'];
			if ( $oid && !empty( $oid ) && $oid === $adapter_oid ) {
				if ( !array_key_exists( 'order_status', $_SESSION ) || !array_key_exists( $oid, $_SESSION['order_status'] ) ) {
					$_SESSION['order_status'][$oid] = $this->adapter->do_transaction( 'GET_ORDERSTATUS' );
					$_SESSION['order_status'][$oid]['data']['count'] = 0;
				} else {
					$_SESSION['order_status'][$oid]['data']['count'] = $_SESSION['order_status'][$oid]['data']['count'] + 1;
				}
				$result = $_SESSION['order_status'][$oid];
				$this->displayResultsForDebug( $result );
				//do the switching between the... stuff. 

				switch ( $result['data']['WMF_STATUS'] ) {
					case 'complete':
						$wgOut->addHTML( "Add successful stomp message, go to the thank you page..." );
						$go = $this->adapter->getThankYouPage();
						break;
					case 'pending':
						$wgOut->addHTML( "Add pending stomp message, go to the thank you page..." );
						$go = $this->adapter->getThankYouPage();
						break;
					case 'pending-poke':
						$wgOut->addHTML( "Add pending stomp message, go to the thank you page, add some indicator that we need to do something." );
						$go = $this->adapter->getThankYouPage();
						break;
					case 'failed':
						$wgOut->addHTML( "Toss it, go to fail page..." );
						$go = $this->adapter->getFailPage();
						break;
				}
				$this->adapter->doStompTransaction( $result['data'], $result['message'], $result['data']['WMF_STATUS'], true );

				$this->adapter->unsetAllGatewaySessionData();
				$wgOut->addHTML( "<br>Redirecting to page $go" );
				$wgOut->redirect( $go );
			}
			$this->adapter->log( "Not posted, or not processed. Showing the form for the first time." );
		} else {
			if ( !$this->adapter->isCache() ) {
				// if we're not caching, there's a token mismatch
				$this->errors['general']['token-mismatch'] = wfMsg( 'payflowpro_gateway-token-mismatch' );
			}
		}
	}

	function displayResultsForDebug( $results ) {
		global $wgOut;
		$wgOut->addHTML( $results['message'] );

		if ( !empty( $results['errors'] ) ) {
			$wgOut->addHTML( "<ul>" );
			foreach ( $results['errors'] as $code => $value ) {
				$wgOut->addHTML( "<li>Error $code: $value" );
			}
			$wgOut->addHTML( "</ul>" );
		}

		if ( !empty( $results['data'] ) ) {
			$wgOut->addHTML( "<ul>" );
			foreach ( $results['data'] as $key => $value ) {
				if ( is_array( $value ) ) {
					$wgOut->addHTML( "<li>$key:<ul>" );
					foreach ( $value as $key2 => $val2 ) {
						$wgOut->addHTML( "<li>$key2: $val2" );
					}
					$wgOut->addHTML( "</ul>" );
				} else {
					$wgOut->addHTML( "<li>$key: $value" );
				}
			}
			$wgOut->addHTML( "</ul>" );
		} else {
			$wgOut->addHTML( "Empty Results" );
		}
		if ( array_key_exists( 'Donor', $_SESSION ) ) {
			$wgOut->addHTML( "Session Donor Vars:<ul>" );
			foreach ( $_SESSION['Donor'] as $key => $val ) {
				$wgOut->addHTML( "<li>$key: $val" );
			}
			$wgOut->addHTML( "</ul>" );
		} else {
			$wgOut->addHTML( "No Session Donor Vars:<ul>" );
		}
	}

	/**
	 * Prepares the transactional message to be sent via Stomp to queueing service
	 * 
	 * @param array $data
	 * @param array $resposneArray
	 * @param array $responseMsg
	 * @return array
	 */
	public function prepareStompTransaction( $data, $responseArray, $responseMsg ) {
		$countries = GatewayForm::getCountries();

		$transaction = array( );

		// include response message
		$transaction['response'] = $responseMsg;

		// include date
		$transaction['date'] = time();

		// put all data into one array
		$optout = $this->determineOptOut( $data );
		$data['anonymous'] = $optout['anonymous'];
		$data['optout'] = $optout['optout'];

		$transaction += array_merge( $data, $responseArray );

		return $transaction;
	}

	public function getPossibleErrors() {
		return array(
			'general' => '',
			'retryMsg' => '',
			'invalidamount' => '',
			'card_num' => '',
			'card_type' => '',
			'cvv' => '',
			'fname' => '',
			'lname' => '',
			'city' => '',
			'country' => '',
			'street' => '',
			'state' => '',
			'zip' => '',
			'emailAdd' => '',
		);
	}

	/**
	 * Handle redirection of form content to PayPal
	 *
	 * @fixme If we can update contrib tracking table in ContributionTracking
	 * 	extension, we can probably get rid of this method and just submit the form
	 *  directly to the paypal URL, and have all processing handled by ContributionTracking
	 *  This would make this a lot less hack-ish
	 */
	public function paypalRedirect( &$data ) {
		global $wgPayflowProGatewayPaypalURL, $wgOut;

		// if we don't have a URL enabled throw a graceful error to the user
		if ( !strlen( $wgPayflowProGatewayPaypalURL ) ) {
			$this->errors['general']['nopaypal'] = wfMsg( 'payflow_gateway-error-msg-nopaypal' );
			return;
		}

		// update the utm source to set the payment instrument to pp rather than cc
		$utm_source_parts = explode( ".", $data['utm_source'] );
		$utm_source_parts[2] = 'pp';
		$data['utm_source'] = implode( ".", $utm_source_parts );
		$data['gateway'] = 'paypal';
		$data['currency_code'] = $data['currency'];
		/**
		 * update contribution tracking
		 */
		$this->updateContributionTracking( $data, true );

		$wgPayflowProGatewayPaypalURL .= "/" . $data['language'] . "?gateway=paypal";

		// submit the data to the paypal redirect URL
		$wgOut->redirect( $wgPayflowProGatewayPaypalURL . '&' . http_build_query( $data ) );
	}

	public static function log( $msg, $log_level=LOG_INFO ) {
		$this->adapter->log( $msg, $log_level );
	}

}

// end class
