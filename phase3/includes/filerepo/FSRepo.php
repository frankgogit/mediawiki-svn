<?php
/**
 * A repository for files accessible via the local filesystem.
 *
 * @file
 * @ingroup FileRepo
 */

/**
 * A repository for files accessible via the local filesystem.
 * Does not support database access or registration.
 * 
 * This is a mostly a legacy class. New uses should not be added.
 * 
 * @ingroup FileRepo
 * @deprecated since 1.19
 */
class FSRepo extends FileRepo {
	function __construct( array $info ) {
		if ( !isset( $info['backend'] ) ) {
			// B/C settings...
			$directory = $info['directory'];
			$deletedDir = isset( $info['deletedDir'] )
				? $info['deletedDir']
				: false;
			$thumbDir = isset( $info['thumbDir'] )
				? $info['thumbDir']
				: "{$directory}/thumb";
			$fileMode = isset( $info['fileMode'] )
				? $info['fileMode']
				: 0644;

			// Get the FS backend configuration
			$backend = new FSFileBackend( array(
				'name'           => $info['name'] . '-backend',
				'lockManager'    => 'fsLockManager',
				'containerPaths' => array(
					"media-public"  => "{$directory}",
					"media-temp"    => "{$directory}/temp",
					"media-thumb"   => $thumbDir,
					"media-deleted" => $deletedDir
				),
				'fileMode'       => $fileMode,
			) );
			// Update repo config to use this backend
			$info['backend'] = $backend;
			// Set "deleted" zone in repo if deletedDir is configured
			if ( $deletedDir !== false ) {
				$info['zones']['deleted'] = array(
					'container' => 'media-deleted', 'directory' => '' );
			}
		}

		parent::__construct( $info );

		if ( !( $this->backend instanceof FSFileBackend ) ) {
			throw new MWException( "FSRepo only supports FSFileBackend." );
		}
	}
}
