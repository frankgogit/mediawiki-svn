<?php

/**
 * Parameter definition class.
 * 
 * @since 0.4
 * 
 * @file Parameter.php
 * @ingroup Validator
 * 
 * @author Jeroen De Dauw
 */
class Parameter {
	
	const TYPE_STRING = 'string';
	const TYPE_NUMBER = 'number';
	const TYPE_INTEGER = 'integer';
	const TYPE_FLOAT = 'float';
	const TYPE_BOOLEAN = 'boolean';
	const TYPE_CHAR = 'char';
	
	/**
	 * Indicates whether parameters that are provided more then once  should be accepted,
	 * and use the first provided value, or not, and generate an error.
	 * 
	 * @since 0.4
	 * 
	 * @var boolean  
	 */
	public static $acceptOverriding = false;	
	
	/**
	 * Indicates whether parameters not found in the criteria list
	 * should be stored in case they are not accepted. The default is false.
	 * 
	 * @since 0.4
	 * 
	 * @var boolean 
	 */
	public static $accumulateParameterErrors = false;	
	
	/**
	 * Indicates if the parameter value should be lowercased.
	 * 
	 * @since 0.4
	 * 
	 * @var boolean
	 */
	public $lowerCaseValue = true;
	
	/**
	 * Dependency list containing parameters that need to be handled before this one. 
	 * 
	 * @since 0.4
	 * 
	 * @var array
	 */			
	public $dependencies = array();	
	
	/**
	 * The default value for the parameter, or null when the parameter is required.
	 * 
	 * @since 0.4
	 * 
	 * @var mixed
	 */
	public $default;	
	
	/**
	 * The main name of the parameter.
	 * 
	 * @since 0.4
	 * 
	 * @var string
	 */
	protected $name;
	
	/**
	 * The type of the parameter, element of the Parameter::TYPE_ enum.
	 * 
	 * @since 0.4
	 * 
	 * @var string
	 */
	protected $type;
	
	/**
	 * List of aliases for the parameter name.
	 * 
	 * @since 0.4
	 * 
	 * @var array
	 */	
	protected $aliases = array();
	
	/**
	 * List of criteria the parameter value needs to hold against.
	 * 
	 * @since 0.4
	 * 
	 * @var array of ParameterCriterion
	 */		
	protected $criteria = array();
	
	/**
	 * List of manipulations the parameter value needs to undergo.
	 * 
	 * @since 0.4
	 * 
	 * @var array of ParameterManipulation
	 */		
	protected $manipulations = array();	
	
	/**
	 * The original parameter name as provided by the user. This can be the
	 * main name or an alias.
	 * 
	 * @since 0.4 
	 * 
	 * @var string
	 */
	protected $originalName;
	
	/**
	 * The original value as provided by the user. This is mainly retained for
	 * usage in error messages when the parameter turns out to be invalid.
	 * 
	 * @since 0.4 
	 * 
	 * @var string
	 */
	protected $originalValue;
	
	/**
	 * The value of the parameter. 
	 * 
	 * TODO: protected
	 * 
	 * @since 0.4 
	 * 
	 * @var mixed
	 */	
	public $value;
	
	/**
	 * Keeps track of how many times the parameter has been set by the user.
	 * This is used to detect overrides and for figuring out a parameter is missing. 
	 * 
	 * @since 0.4 
	 * 
	 * @var integer
	 */
	protected $setCount = 0;
	
	/**
	 * List of validation errors for this parameter.
	 * 
	 * @since 0.4
	 * 
	 * @var array of ValidationError
	 */
	protected $errors = array();
	
	/**
	 * Indicates if the parameter manipualations should be applied to the default value.
	 * 
	 * @since 0.4
	 * 
	 * @var boolean
	 */
	protected $applyManipulationsToDefault = true;
	
	/**
	 * Indicates if the parameter was set to it's default.
	 * 
	 * @since 0.4
	 * 
	 * @var boolean
	 */
	protected $defaulted = false;
	
	/**
	 * Returns a new instance of Parameter by converting a Validator 3.x-style parameter array definition.
	 * Note: this method is for backward compatibility and should not be used in new code.
	 * 
	 * @since 0.4
	 * 
	 * @param string $name
	 * @param array $definition
	 * 
	 * @return Parameter
	 */
	public static function newFromArray( $name, array $definition ) {
		$isList = false;
		$delimiter = ListParameter::DEFAULT_DELIMITER;
		
		if ( array_key_exists( 'type', $definition ) ) {
			if ( is_array( $definition['type'] ) ) {
				if ( count( $definition['type'] ) > 1 ) {
					$isList = true;
					
					if ( count( $definition['type'] ) > 2 ) {
						$delimiter = $definition['type'][2];
					}
				}
				
				$type = $definition['type'][0];
			}
			else {
				$type = $definition['type'];
			}
		}
		else {
			$type = 'string';
		}
		
		if ( array_key_exists( 'required', $definition ) && $definition['required'] ) {
			$default = null;
		}
		else {
			$default = array_key_exists( 'default', $definition ) ? $definition['default'] : '';
		}
		
		if ( $isList ) {
			$parameter = new ListParameter(
				$name,
				$delimiter,
				$type,
				$default,
				array_key_exists( 'aliases', $definition ) ? $definition['aliases'] : array(),
				array_key_exists( 'criteria', $definition ) ? $definition['criteria'] : array()			
			);
		}
		else {
			$parameter = new Parameter(
				$name,
				$type,
				$default,
				array_key_exists( 'aliases', $definition ) ? $definition['aliases'] : array(),
				array_key_exists( 'criteria', $definition ) ? $definition['criteria'] : array()
			);			
		}
		
		if ( array_key_exists( 'output-types', $definition ) ) {
			$types = array();
			
			for ( $i = 0, $c = count( $definition['output-types'] ); $i < $c; $i++ ) {
				if ( !is_array( $definition['output-types'][$i] ) ) {
					$definition['output-types'][$i] = array( $definition['output-types'][$i] );
				}
				
				$types[$name] = $definition['output-types'][$i];
			}
		}
		elseif ( array_key_exists( 'output-type', $definition ) ) {
			if ( ! is_array( $definition['output-type'] ) ) {
				$definition['output-type'] = array( $definition['output-type'] );
			}
		}
		
		if ( array_key_exists( 'tolower', $definition ) ) {
			$parameter->lowerCaseValue = (bool)$definition['tolower'];
		}
		
		if ( array_key_exists( 'dependencies', $definition ) ) {
			$parameter->dependencies = (array)$definition['dependencies'];
		}		
		
		return $parameter;
	}
	
	/**
	 * Constructor.
	 * 
	 * @since 0.4
	 * 
	 * @param string $name
	 * @param string $type
	 * @param mixed $default Use null for no default (which makes the parameter required)
	 * @param array $aliases
	 * @param array $criteria
	 * @param array $dependencies
	 */
	public function __construct( $name, $type = Parameter::TYPE_STRING,
		$default = null, array $aliases = array(), array $criteria = array(), array $dependencies = array() ) {
			
		$this->name = $name;
		$this->type = $type;
		$this->default = $default;
		$this->aliases = $aliases;
		
		$this->cleanCriteria( $criteria );
		$this->criteria = $criteria;
		
		$this->dependencies = $dependencies;
	}
	
	/**
	 * Ensures all Validator 3.x-style criteria definitions are converted into ParameterCriterion instances.
	 * 
	 * @since 0.4
	 * 
	 * @param array $criteria
	 */
	protected function cleanCriteria( array &$criteria ) {
		foreach ( $criteria as $key => &$criterion ) {
			if ( !$criterion instanceof ParameterCriterion )  {
				$criterion = ParameterCriterion::newFromArray( $key, $criterion );
			}
		} 
	}
	
	/**
	 * Adds one or more aliases for the parameter name.
	 * 
	 * @since 0.4
	 * 
	 * @param mixed $aliases string or array of string
	 */
	public function addAliases() {
		$args = func_get_args();
		$this->aliases = array_merge( $this->aliases, is_array( $args[0] ) ? $args[0] : $args );
	}	
	
	/**
	 * Adds one or more ParameterCriterion.
	 * 
	 * @since 0.4
	 * 
	 * @param mixed $criteria ParameterCriterion or array of ParameterCriterion
	 */
	public function addCriteria() {
		$args = func_get_args();
		$this->criteria = array_merge( $this->criteria, is_array( $args[0] ) ? $args[0] : $args );		
	}
	
	/**
	 * Adds one or more ParameterManipulation.
	 * 
	 * @since 0.4
	 * 
	 * @param mixed $manipulations ParameterManipulation or array of ParameterManipulation
	 */
	public function addManipulations( $manipulations ) {
		$args = func_get_args();
		$this->manipulations = array_merge( $this->manipulations, is_array( $args[0] ) ? $args[0] : $args );		
	}	
	
	/**
	 * 
	 * 
	 * @since 0.4
	 * 
	 * @param string $paramName
	 * @param string $paramValue
	 * 
	 * @return boolean
	 */
	public function setUserValue( $paramName, $paramValue ) {
		if ( $this->setCount > 0 && !self::$acceptOverriding ) {
			// TODO: fatal error
			/*
					$this->registerError(
						wfMsgExt(
							'validator-error-override-argument',
							'parsemag',
							$paramName,
							$this->mParameters[$mainName]['original-value'],
							is_array( $paramData ) ? $paramData['original-value'] : $paramData
						),
						'override'		
					);
			 */
			return false;
		}
		else {
			$this->originalName = $paramName;
			$this->originalValue = $paramValue;
			
			$this->cleanValue();
			
			$this->setCount++;

			return true;
		}
	}
	
	/**
	 * Sets the $value to a cleaned value of $originalValue.
	 * 
	 * @since 0.4
	 */
	protected function cleanValue() {
		$this->value = $this->originalValue;
		
		if ( $this->lowerCaseValue ) {
			$this->value = strtolower( $this->value );
		}
	}
	
	/**
	 * Validates the parameter value and sets the value to it's default when errors occur.
	 * 
	 * @since 0.4
	 */
	public function validate() {
		$this->doValidation();
	}
	
	/**
	 * Applies the parameter manipulations.
	 * 
	 * @since 0.4
	 * 
	 * @param array $parameters
	 */
	public function format( array &$parameters ) {
		if ( $this->applyManipulationsToDefault || !$this->wasSetToDefault() ) {
			foreach ( $this->getManipulations() as $manipulation ) {
				$manipulation->manipulate( $this, $parameters );
			}			
		}
	}
	
	/**
	 * Validates the parameter value.
	 * Also sets the value to the default when it's not set or invalid, assuming there is a default.
	 * 
	 * @since 0.4
	 */	
	protected function doValidation() {
		if ( $this->setCount == 0 ) {
			if ( $this->isRequired() ) {
				// This should not occur, so thorw an exception.
				throw new Exception( 'Attempted to validate a required parameter without first setting a value.' );
			}
			else {
				$this->setToDefault();
			}
		}
		else {
			$this->validateCriteria();
			$this->setToDefaultIfNeeded();
		}
	}
	
	/**
	 * Sets the parameter value to the default if needed.
	 * 
	 * @since 0.4
	 */
	protected function setToDefaultIfNeeded() {
		if ( count( $this->errors ) > 0 && !$this->hasFatalError() ) {
			$this->setToDefault();
		}		
	}
	
	/**
	 * Validates the provided value against all criteria.
	 * 
	 * @since 0.4
	 */
	protected function validateCriteria() {
		foreach ( $this->getCriteria() as $criterion ) {
			$validationResult = $criterion->validate( $this );
			
			if ( !$validationResult->isValid() ) {
				$this->handleValidationError( $validationResult );
				
				if ( !self::$accumulateParameterErrors || $this->hasFatalError() ) {
					break; 
				}
			}
		}
	}
	
	/**
	 * Handles any validation errors that occured for a single criterion.
	 * 
	 * @since 0.4
	 * 
	 * @param CriterionValidationResult $validationResult
	 */
	protected function handleValidationError( CriterionValidationResult $validationResult ) {
		$this->errors = array_merge( $this->errors, $validationResult->getErrors() );
	}
	
	/**
	 * Returns the parameters main name.
	 * 
	 * @since 0.4
	 * 
	 * @return string
	 */			
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Returns the parameters value.
	 * 
	 * @since 0.4
	 * 
	 * @return string
	 */			
	public function getValue() {
		return $this->value;
	}
	
	/**
	 * Returns a list of dependencies the parameter has, in the form of 
	 * other parameter names.
	 * 
	 * @since 0.4
	 * 
	 * @return array
	 */		
	public function getDependencies() {
		return $this->dependencies;
	}
	
	/**
	 * Returns the original use-provided name.
	 * 
	 * @since 0.4
	 * 
	 * @return string
	 */
	public function getOriginalName() {
		if ( $this->setCount == 0 ) {
			throw new Exception( 'No user imput set to the parameter yet, so the original name does not exist' );
		}		
		return $this->originalName;
	}

	/**
	 * Returns the original use-provided value.
	 * 
	 * @since 0.4
	 * 
	 * @return string
	 */
	public function getOriginalValue() {
		if ( $this->setCount == 0 ) {
			throw new Exception( 'No user imput set to the parameter yet, so the original value does not exist' );
		}
		return $this->originalValue;
	}	
	
	/**
	 * Returns all validation errors that occured so far.
	 * 
	 * @since 0.4
	 * 
	 * @return array of ValidationError
	 */
	public function getErrors() {
		return $this->errors;
	}
	
	/**
	 * Returns if the parameter is a required one or not.
	 * 
	 * @since 0.4
	 * 
	 * @return boolean
	 */		
	public function isRequired() {
		return is_null( $this->default );
	}
	
	/**
	 * Returns if the parameter is a list or not.
	 * 
	 * @since 0.4
	 * 
	 * @return boolean
	 */		
	public function isList() {
		return false;
	}
	
	/**
	 * Returns the parameter criteria.
	 * 
	 * @since 0.4
	 * 
	 * @return array of ParameterCriterion
	 */	
	public function getCriteria() {
		return array_merge( $this->getCriteriaForType(), $this->criteria ); 
	}
	
	/**
	 * Returns the parameter manipulations.
	 * 
	 * @since 0.4
	 * 
	 * @return array of ParameterManipulation
	 */	
	public function getManipulations() {
		return array_merge( $this->getManipulationsForType(), $this->manipulations ); 
	}	
	
	/**
	 * Gets the criteria for the type of the parameter.
	 * 
	 * @since 0.4
	 * 
	 * @return array
	 */
	protected function getCriteriaForType() {
		$criteria = array();

		switch( $this->type ) {
			case self::TYPE_INTEGER:
				$criteria[] = new CriterionIsInteger();
				break;
			case self::TYPE_FLOAT:
				$criteria[] = new CriterionIsFloat();
				break;
			case self::TYPE_NUMBER: // Note: This accepts non-decimal notations! 
				$criteria[] = new CriterionIsNumeric();
				break;
			case self::TYPE_BOOLEAN:
				// TODO: work with list of true and false values and i18n. 
				$criteria[] = new CriterionInArray( 'yes', 'no', 'on', 'off' );
				break;
			case self::TYPE_CHAR:
				$criteria[] = new CriterionHasLength( 1, 1 ); 
				break;
			case self::TYPE_STRING: default:
				// No extra criteria for strings.
				break;
		}

		return $criteria;
	}
	
	/**
	 * Gets the manipulation for the type of the parameter.
	 * 
	 * @since 0.4
	 * 
	 * @return array
	 */
	protected function getManipulationsForType() {
		$manipulations = array();
		
		switch( $this->type ) {
			case self::TYPE_INTEGER:
				$manipulations[] = new ParamManipulationInteger();
				break;
			case self::TYPE_FLOAT: case self::TYPE_NUMBER: 
				$manipulations[] = new ParamManipulationFloat();
				break;
			case self::TYPE_BOOLEAN:
				$manipulations[] = new ParamManipulationBoolean();
				break;
			case self::TYPE_CHAR: case self::TYPE_STRING: default:
				// No extra manipulations for these types
				break;
		}		
		
		return $manipulations;
	}
	
	/**
	 * Sets the parameter value to the default.
	 * 
	 * @since 0.4
	 */
	protected function setToDefault() {
		$this->defaulted = true;
		$this->value = $this->default;
	}
	
	/**
	 * Gets if the parameter was set to it's default.
	 * 
	 * @since 0.4
	 * 
	 * @return boolean
	 */
	public function wasSetToDefault() {
		return $this->defaulted;
	}
	
	/**
	 * Returns the criteria that apply to the list as a whole.
	 * 
	 * @since 0.4
	 * 
	 * @return array
	 */		
	public function getListCriteria() {
		return array();
	}
	
	/**
	 * Returns the parameter name aliases.
	 * 
	 * @since 0.4
	 * 
	 * @return array
	 */
	public function getAliases() {
		return $this->aliases;
	}
	
	/**
	 * Returns if the parameter has a certain alias.
	 * 
	 * @since 0.4
	 * 
	 * @param string $alias
	 * 
	 * @return boolean
	 */
	public function hasAlias( $alias ) {
		return in_array( $alias, $this->getAliases() );
	}
	
	/**
	 * Sets the default parameter value. Null indicates no default,
	 * and therefore makes the parameter required.
	 * 
	 * @since 0.4
	 * 
	 * @param mixed $default
	 */
	public function setDefault( $default ) {
		$this->default = $default;
	}
	
	/**
	 * Set if the parameter manipualations should be applied to the default value.
	 * 
	 * @since 0.4
	 * 
	 * @param boolean $doOrDoNot
	 */
	public function setDoManipulationOfDefault( $doOrDoNot ) {
		$this->applyManipulationsToDefault = $doOrDoNot;
	}
	
	/**
	 * Returns false when there are no fatal errors or an ValidationError when one is found.
	 * 
	 * @return mixed false or ValidationError
	 */
	public function hasFatalError() {
		foreach ( $this->errors as $error ) {
			if ( $error->isFatal() ) {
				return true;
			}
		}
		
		return false;
	}		
	
}