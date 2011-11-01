<?php
/**
 * Gadget repository that gets its gadgets from a foreign database.
 * 
 * Options (all of these are MANDATORY):
 * 'source': Name of the source these gadgets are loaded from, as defined in ResourceLoader
 * 'dbType': Database type, see DatabaseBase::factory()
 * 'dbServer': Database host
 * 'dbUser': Database user name
 * 'dbPassword': Database password
 * 'dbName': Database name
 * 'dbFlags': Bitmap of the DBO_* flags. Recommended value is  ( $wgDebugDumpSql ? DBO_DEBUG : 0 ) | DBO_DEFAULT
 * 'tablePrefix': Table prefix
 * 'hasSharedCache': Whether the foreign wiki's cache is accessible through $wgMemc
 */
class ForeignDBGadgetRepo extends LocalGadgetRepo {
	protected $db = null;
	
	protected $source, $dbServer, $dbUser, $dbPassword, $dbName, $dbFlags, $tablePrefix, $hasSharedCache;
	
	/**
	 * Constructor.
	 * @param $options array See class documentation comment for option details
	 */
	public function __construct( array $options ) {
		parent::__construct( $options );
		
		$optionKeys = array( 'source', 'dbType', 'dbServer', 'dbUser', 'dbPassword', 'dbName',
			'dbFlags', 'tablePrefix', 'hasSharedCache' );
		foreach ( $optionKeys as $optionKey ) {
			$this->{$optionKey} = $options[$optionKey];
		}
	}
	
	public function isWriteable() {
		return false;
	}
	
	public function getSource() {
		return $this->source;
	}
	
	public function getDB() {
		return $this->getMasterDB();
	}
	
	public function isLocal() {
		return false;
	}
	
	/*** Overridden protected methods from LocalGadgetRepo ***/
	protected function getMasterDB() {
		if ( $this->db === null ) {
			$this->db = DatabaseBase::factory( $this->dbType,
				array(
					'host' => $this->dbServer,
					'user' => $this->dbUser,
					'password' => $this->dbPassword,
					'dbname' => $this->dbName,
					'flags' => $this->dbFlags,
					'tablePrefix' => $this->tablePrefix
				)
			);
		}
		return $this->db;
	}
	
	protected function getCacheKey( $id ) {
		if ( $this->hasSharedCache ) {
			// Access the foreign wiki's memc
			if ( $id === null ) {
				// Use 'localrepoidsshared' instead of 'localrepoids', otherwise we
				// will be accessing the same cache entry as the foreign wiki's LocalGadgetRepo
				// We can't allow that to happen because the local repo's ID list includes
				// shared gadgets but ours doesn't
				return wfForeignMemcKey( $this->dbName, $this->tablePrefix, 'gadgets', 'localrepoidsshared' );
			} else {
				// We don't have to prevent collisions here because sharing gadget data
				// caches between us and the foreign wiki's local repo is OK
				return wfForeignMemcKey( $this->dbName, $this->tablePrefix, 'gadgets', 'localrepodata', $id );
			}
		} else {
			// No access to the foreign wiki's memc, so cache locally
			if ( $id === null ) {
				return wfMemcKey( 'gadgets', 'foreignrepoids', $this->source );
			} else {
				return wfMemcKey( 'gadgets', 'foreignrepodata', $this->source, $id );
			}
		}
	}
	
	protected function getLoadAllDataQuery() {
		$query = parent::getLoadIDsQuery();
		$query['conds']['gd_shared'] = 1;
		return $query;
	}
	
	protected function getLoadDataForQuery( $id ) {
		$query = parent::getLoadDataForQuery( $id );
		$query['conds']['gd_shared'] = 1;
		return $query;
	}
}
