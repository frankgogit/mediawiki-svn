<?php

class PostgresInstaller extends InstallerDBType {

	var $globalNames = array(
		'wgDBserver',
		'wgDBport',
		'wgDBname',
		'wgDBuser',
		'wgDBpassword',
		'wgDBmwschema',
		'wgDBts2schema',
	);

	var $internalDefaults = array(
		'_PostgresInstallUser' => 'postgres',
		'_PostgresInstallPassword' => '',
	);

	var $minimumVersion = '8.1';

	var $conn;

	function getName() {
		return 'postgres';
	}

	function isCompiled() {
		return $this->checkExtension( 'pgsql' );
	}

	function getGlobalNames() {
		return $this->globalNames;
	}

	function getInternalDefaults() {
		return $this->internalDefaults;
	}

	function getConnectForm() {
		return
			$this->getTextBox( 'wgDBserver', 'config-db-host' ) .
			$this->parent->getHelpBox( 'config-db-host-help' ) . 
			$this->getTextBox( 'wgDBport', 'config-db-port' ) .
			Xml::openElement( 'fieldset' ) .
			Xml::element( 'legend', array(), wfMsg( 'config-db-wiki-settings' ) ) .
			$this->getTextBox( 'wgDBname', 'config-db-name' ) .
			$this->parent->getHelpBox( 'config-db-name-help' ) .
			$this->getTextBox( 'wgDBmwschema', 'config-db-schema' ) .
			$this->getTextBox( 'wgDBts2schema', 'config-db-ts2-schema' ) .
			$this->parent->getHelpBox( 'config-db-schema-help' ) .
			Xml::closeElement( 'fieldset' ) .
			$this->getInstallUserBox();
	}

	function submitConnectForm() {
		// Get variables from the request
		$newValues = $this->setVarsFromRequest( array( 'wgDBserver', 'wgDBport', 
			'wgDBname', 'wgDBmwschema', 'wgDBts2schema' ) );

		// Validate them
		$status = Status::newGood();
		if ( !strlen( $newValues['wgDBname'] ) ) {
			$status->fatal( 'config-missing-db-name' );
		} elseif ( !preg_match( '/^[a-zA-Z0-9_]+$/', $newValues['wgDBname'] ) ) {
			$status->fatal( 'config-invalid-db-name', $newValues['wgDBname'] );
		}
		if ( !preg_match( '/^[a-zA-Z0-9_]*$/', $newValues['wgDBmwschema'] ) ) {
			$status->fatal( 'config-invalid-schema', $newValues['wgDBmwschema'] );
		}
		if ( !preg_match( '/^[a-zA-Z0-9_]*$/', $newValues['wgDBts2schema'] ) ) {
			$status->fatal( 'config-invalid-ts2schema', $newValues['wgDBts2schema'] );
		}

		// Try to connect
		if ( $status->isOK() ) {
			$status->merge( $this->attemptConnection() );
		}
		if ( !$status->isOK() ) {
			return $status;
		}

		// Check version
		$version = $this->conn->getServerVersion();
		if ( version_compare( $version, $this->minimumVersion ) < 0 ) {
			return Status::newFatal( 'config-postgres-old', $this->minimumVersion, $version );
		}
		return $status;
	}

	function attemptConnection() {
		$status = Status::newGood();

		try {
			$this->conn = new DatabasePostgres( 
				$this->getVar( 'wgDBserver' ),
				$this->getVar( '_PostgresInstallUser' ),
				$this->getVar( '_PostgresInstallPassword' ),
				'postgres' );
		} catch ( DBConnectionError $e ) {
			$status->fatal( 'config-connection-error', $e->getMessage() );
		}
		return $status;
	}

	function getConnection() {
		$status = $this->attemptConnection();
		if ( $status->isOK() ) {
			return $this->conn;
		} else {
			return $status;
		}
	}

	function getSettingsForm() {
		return false;
	}

	function submitSettingsForm() {
		return Status::newGood();
	}

	function install() {
		echo "TODO";
	}
}
