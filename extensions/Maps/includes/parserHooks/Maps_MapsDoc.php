<?php

/**
 * Class for the 'mapsdoc' parser hooks,
 * which displays documentation for a specified mapping service.
 *
 * @since 1.0
 *
 * @file Maps_MapsDoc.php
 * @ingroup Maps
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class MapsMapsDoc extends ParserHook {

	/**
	 * Field to store the value of the language parameter.
	 *
	 * @since 1.0.1
	 *
	 * @var string
	 */
	protected $language;

	/**
	 * No LSB in pre-5.3 PHP *sigh*.
	 * This is to be refactored as soon as php >=5.3 becomes acceptable.
	 */
	public static function staticInit( Parser &$parser ) {
		$instance = new self;
		return $instance->init( $parser );
	}

	/**
	 * Gets the name of the parser hook.
	 * @see ParserHook::getName
	 *
	 * @since 1.0
	 *
	 * @return string
	 */
	protected function getName() {
		return 'mapsdoc';
	}

	/**
	 * Returns an array containing the parameter info.
	 * @see ParserHook::getParameterInfo
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	protected function getParameterInfo( $type ) {
		$params = array();

		$params['service'] = new Parameter( 'service' );
		$params['service']->addCriteria( new CriterionInArray( $GLOBALS['egMapsAvailableServices'] ) );
		$params['service']->setMessage( 'maps-mapsdoc-par-service' );

		$params['language'] = new Parameter( 'language' );
		$params['language']->setDefault( $GLOBALS['wgLanguageCode'] );
		$params['language']->setMessage( 'maps-mapsdoc-par-language' );

		return $params;
	}

	/**
	 * Returns the list of default parameters.
	 * @see ParserHook::getDefaultParameters
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	protected function getDefaultParameters( $type ) {
		return array( 'service', 'language' );
	}

	/**
	 * Renders and returns the output.
	 * @see ParserHook::render
	 *
	 * @since 1.0
	 *
	 * @param array $parameters
	 *
	 * @return string
	 */
	public function render( array $parameters ) {
		$this->language = $parameters['language'];

		$params = $this->getServiceParameters( $parameters['service'] );

		return $this->getParameterTable( $params );
	}

	/**
	 * Message function that takes into account the language parameter.
	 *
	 * @since 1.0.1
	 *
	 * @param string $key
	 * @param ... $args
	 *
	 * @return string
	 */
	protected function msg() {
		$args = func_get_args();
		$key = array_shift( $args );
		return wfMsgReal( $key, $args, true, $this->language );
	}

	/**
	 * Returns the wikitext for a table listing the provided parameters.
	 *
	 * @since 1.0
	 *
	 * @param array $parameters
	 *
	 * @return string
	 */
	protected function getParameterTable( array $parameters ) {
		$tableRows = array();

		foreach ( $parameters as $parameter ) {
			$tableRows[] = $this->getDescriptionRow( $parameter );
		}

		$table = '';

		if ( count( $tableRows ) > 0 ) {
			$tableRows = array_merge( array(
			'!' . $this->msg( 'validator-describe-header-parameter' ) ."\n" .
			//'!' . $this->msg( 'validator-describe-header-aliases' ) ."\n" .
			'!' . $this->msg( 'validator-describe-header-type' ) ."\n" .
			'!' . $this->msg( 'validator-describe-header-default' ) ."\n" .
			'!' . $this->msg( 'validator-describe-header-description' )
			), $tableRows );

			$table = implode( "\n|-\n", $tableRows );

			$table =
					'{| class="wikitable sortable"' . "\n" .
					$table .
					"\n|}";
		}

		return $table;
	}

	/**
	 * Returns the wikitext for a table row describing a single parameter.
	 *
	 * @since 1.0
	 *
	 * @param Parameter $parameter
	 *
	 * @return string
	 */
	protected function getDescriptionRow( Parameter $parameter ) {
		$description = $parameter->getMessage();
		if ( $description === false ) {
			$description = $parameter->getDescription();
			if ( $description === false ) $description = '-';
		}
		else {
			$description = $this->msg( $description );
		}

		$type = $parameter->getTypeMessage();

		$default = $parameter->isRequired() ? "''" . $this->msg( 'validator-describe-required' ) . "''" : $parameter->getDefault();
		if ( is_array( $default ) ) {
			$default = implode( ', ', $default );
		}
		elseif ( is_bool( $default ) ) {
			$default = $default ? 'yes' : 'no';
		}

		if ( $default === '' ) $default = "''" . $this->msg( 'validator-describe-empty' ) . "''";

		return <<<EOT
| {$parameter->getName()}
| {$type}
| {$default}
| {$description}
EOT;
	}

	protected function getServiceParameters( $service ) {
		$service = MapsMappingServices::getServiceInstance( $service );

		$params = array();

		$params['zoom'] = new Parameter( 'zoom',  Parameter::TYPE_INTEGER );
		$params['zoom']->setMessage( 'maps-par-zoom' );

		$service->addParameterInfo( $params );

		return $params;
	}

	/**
	 * @see ParserHook::getDescription()
	 *
	 * @since 1.0
	 */
	public function getMessage() {
		return 'maps-mapsdoc-description';
	}

}