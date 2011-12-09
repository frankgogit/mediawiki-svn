<?php
/**
 * @file
 * @ingroup FileBackend
 */

/**
 * Class for a file system based file backend.
 * Status messages should avoid mentioning the internal FS paths.
 * Likewise, error suppression should be used to avoid path disclosure.
 *
 * @ingroup FileBackend
 */
class FSFileBackend extends FileBackend {
	/** @var Array Map of container names to paths */
	protected $containerPaths = array();
	protected $fileMode; // file permission mode

	function __construct( array $config ) {
		parent::__construct( $config );
		$this->containerPaths = (array)$config['containerPaths'];
		$this->fileMode = isset( $config['fileMode'] )
			? $config['fileMode']
			: 0644;
	}

	protected function resolveContainerPath( $container, $relStoragePath ) {
		// Get absolute path given the container base dir
		if ( isset( $this->containerPaths[$container] ) ) {
			return $this->containerPaths[$container] . "/{$relStoragePath}";
		}
		return null;
	}

	function store( array $params ) {
		$status = Status::newGood();

		list( $c, $dest ) = $this->resolveStoragePath( $params['dst'] );
		if ( $dest === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dst'] );
			return $status;
		}
		if ( file_exists( $dest ) ) {
			if ( !empty( $params['overwriteDest'] ) ) {
				wfSuppressWarnings();
				$ok = unlink( $dest );
				wfRestoreWarnings();
				if ( !$ok ) {
					$status->fatal( 'backend-fail-delete', $params['dst'] );
					return $status;
				}
			} else {
				$status->fatal( 'backend-fail-alreadyexists', $params['dst'] );
				return $status;
			}
		} else {
			if ( !wfMkdirParents( dirname( $dest ) ) ) {
				$status->fatal( 'directorycreateerror', $params['dst'] );
				return $status;
			}
		}

		wfSuppressWarnings();
		$ok = copy( $params['src'], $dest );
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-copy', $params['src'], $params['dst'] );
			return $status;
		}

		$this->chmod( $dest );

		return $status;
	}

	function copy( array $params ) {
		$status = Status::newGood();

		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['src'] );
			return $status;
		}

		list( $c, $dest ) = $this->resolveStoragePath( $params['dst'] );
		if ( $dest === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dst'] );
			return $status;
		}

		if ( file_exists( $dest ) ) {
			if ( !empty( $params['overwriteDest'] ) ) {
				wfSuppressWarnings();
				$ok = unlink( $dest );
				wfRestoreWarnings();
				if ( !$ok ) {
					$status->fatal( 'backend-fail-delete', $params['dst'] );
					return $status;
				}
			} else {
				$status->fatal( 'backend-fail-alreadyexists', $params['dst'] );
				return $status;
			}
		} else {
			if ( !wfMkdirParents( dirname( $dest ) ) ) {
				$status->fatal( 'directorycreateerror', $params['dst'] );
				return $status;
			}
		}

		wfSuppressWarnings();
		$ok = copy( $source, $dest );
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-copy', $params['src'], $params['dst'] );
			return $status;
		}

		$this->chmod( $dest );

		return $status;
	}

	function canMove( array $params ) {
		return true;
	}

	function move( array $params ) {
		$status = Status::newGood();

		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['src'] );
			return $status;
		}
		list( $c, $dest ) = $this->resolveStoragePath( $params['dst'] );
		if ( $dest === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dst'] );
			return $status;
		}

		if ( file_exists( $dest ) ) {
			if ( !empty( $params['overwriteDest'] ) ) {
				// Windows does not support moving over existing files
				if ( wfIsWindows() ) {
					wfSuppressWarnings();
					$ok = unlink( $dest );
					wfRestoreWarnings();
					if ( !$ok ) {
						$status->fatal( 'backend-fail-delete', $params['dst'] );
						return $status;
					}
				}
			} else {
				$status->fatal( 'backend-fail-alreadyexists', $params['dst'] );
				return $status;
			}
		} else {
			if ( !wfMkdirParents( dirname( $dest ) ) ) {
				$status->fatal( 'directorycreateerror', $params['dst'] );
				return $status;
			}
		}

		wfSuppressWarnings();
		$ok = rename( $source, $dest );
		clearstatcache(); // file no longer at source
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-move', $params['src'], $params['dst'] );
			return $status;
		}

		return $status;
	}

	function delete( array $params ) {
		$status = Status::newGood();

		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['src'] );
			return $status;
		}

		if ( !is_file( $source ) ) {
			if ( empty( $params['ignoreMissingSource'] ) ) {
				$status->fatal( 'backend-fail-delete', $params['src'] );
			}
			return $status; // do nothing; either OK or bad status
		}

		wfSuppressWarnings();
		$ok = unlink( $source );
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-delete', $params['src'] );
			return $status;
		}

		return $status;
	}

	function concatenate( array $params ) {
		$status = Status::newGood();

		list( $c, $dest ) = $this->resolveStoragePath( $params['dst'] );
		if ( $dest === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dst'] );
			return $status;
		}

		// Check if the destination file exists and we can't handle that
		$destExists = file_exists( $dest );
		if ( $destExists && empty( $params['overwriteDest'] ) ) {
			$status->fatal( 'backend-fail-alreadyexists', $params['dst'] );
			return $status;
		}

		// Create a new temporary file...
		wfSuppressWarnings();
		$tmpPath = tempnam( wfTempDir(), 'concatenate' );
		wfRestoreWarnings();
		if ( $tmpPath === false ) {
			$status->fatal( 'backend-fail-createtemp' );
			return $status;
		}

		// Build up that file using the source chunks (in order)...
		wfSuppressWarnings();
		$tmpHandle = fopen( $tmpPath, 'a' );
		wfRestoreWarnings();
		if ( $tmpHandle === false ) {
			$status->fatal( 'backend-fail-opentemp', $tmpPath );
			return $status;
		}
		foreach ( $params['srcs'] as $virtualSource ) {
			list( $c, $source ) = $this->resolveStoragePath( $virtualSource );
			if ( $source === null ) {
				fclose( $tmpHandle );
				$status->fatal( 'backend-fail-invalidpath', $virtualSource );
				return $status;
			}
			// Load chunk into memory (it should be a small file)
			$sourceHandle = fopen( $source, 'r' );
			if ( $sourceHandle === false ) {
				fclose( $tmpHandle );
				$status->fatal( 'backend-fail-read', $virtualSource );
				return $status;
			}
			// Append chunk to file (pass chunk size to avoid magic quotes)
			if ( !stream_copy_to_stream( $sourceHandle, $tmpHandle ) ) {
				fclose( $sourceHandle );
				fclose( $tmpHandle );
				$status->fatal( 'backend-fail-writetemp', $tmpPath );
				return $status;
			}
			fclose( $sourceHandle );
		}
		wfSuppressWarnings();
		if ( !fclose( $tmpHandle ) ) {
			$status->fatal( 'backend-fail-closetemp', $tmpPath );
			return $status;
		}
		wfRestoreWarnings();

		// Handle overwrite behavior of file destination if applicable.
		// Note that we already checked if no overwrite params were set above.
		if ( $destExists ) {
			// Windows does not support moving over existing files
			if ( wfIsWindows() ) {
				wfSuppressWarnings();
				$ok = unlink( $dest );
				wfRestoreWarnings();
				if ( !$ok ) {
					$status->fatal( 'backend-fail-delete', $params['dst'] );
					return $status;
				}
			}
		} else {
			// Make sure destination directory exists
			if ( !wfMkdirParents( dirname( $dest ) ) ) {
				$status->fatal( 'directorycreateerror', $params['dst'] );
				return $status;
			}
		}

		// Rename the temporary file to the destination path
		wfSuppressWarnings();
		$ok = rename( $tmpPath, $dest );
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-move', $tmpPath, $params['dst'] );
			return $status;
		}

		$this->chmod( $dest );

		return $status;
	}

	function create( array $params ) {
		$status = Status::newGood();

		list( $c, $dest ) = $this->resolveStoragePath( $params['dst'] );
		if ( $dest === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dst'] );
			return $status;
		}

		if ( file_exists( $dest ) ) {
			if ( !empty( $params['overwriteDest'] ) ) {
				wfSuppressWarnings();
				$ok = unlink( $dest );
				wfRestoreWarnings();
				if ( !$ok ) {
					$status->fatal( 'backend-fail-delete', $params['dst'] );
					return $status;
				}
			} else {
				$status->fatal( 'backend-fail-alreadyexists', $params['dst'] );
				return $status;
			}
		} else {
			if ( !wfMkdirParents( dirname( $dest ) ) ) {
				$status->fatal( 'directorycreateerror', $params['dst'] );
				return $status;
			}
		}

		wfSuppressWarnings();
		$ok = file_put_contents( $dest, $params['content'] );
		wfRestoreWarnings();
		if ( !$ok ) {
			$status->fatal( 'backend-fail-create', $params['dst'] );
			return $status;
		}

		$this->chmod( $dest );

		return $status;
	}

	function prepare( array $params ) {
		$status = Status::newGood();
		list( $c, $dir ) = $this->resolveStoragePath( $params['dir'] );
		if ( $dir === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dir'] );
			return $status; // invalid storage path
		}
		if ( !wfMkdirParents( $dir ) ) {
			$status->fatal( 'directorycreateerror', $params['dir'] );
			return $status;
		} elseif ( !is_writable( $dir ) ) {
			$status->fatal( 'directoryreadonlyerror', $params['dir'] );
			return $status;
		} elseif ( !is_readable( $dir ) ) {
			$status->fatal( 'directorynotreadableerror', $params['dir'] );
			return $status;
		}
		return $status;
	}

	function secure( array $params ) {
		$status = Status::newGood();
		list( $c, $dir ) = $this->resolveStoragePath( $params['dir'] );
		if ( $dir === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dir'] );
			return $status; // invalid storage path
		}
		if ( !wfMkdirParents( $dir ) ) {
			$status->fatal( 'directorycreateerror', $params['dir'] );
			return $status;
		}
		// Add a .htaccess file to the root of the deleted zone
		if ( !empty( $params['noAccess'] ) && !file_exists( "{$dir}/.htaccess" ) ) {
			wfSuppressWarnings();
			$ok = file_put_contents( "{$dir}/.htaccess", "Deny from all\n" );
			wfRestoreWarnings();
			if ( !$ok ) {
				$status->fatal( 'backend-fail-create', $params['dir'] . '/.htaccess' );
				return $status;
			}
		}
		// Seed new directories with a blank index.html, to prevent crawling
		if ( !empty( $params['noListing'] ) && !file_exists( "{$dir}/index.html" ) ) {
			wfSuppressWarnings();
			$ok = file_put_contents( "{$dir}/index.html", '' );
			wfRestoreWarnings();
			if ( !$ok ) {
				$status->fatal( 'backend-fail-create', $params['dir'] . '/index.html' );
				return $status;
			}
		}
		return $status;
	}

	function clean( array $params ) {
		$status = Status::newGood();
		list( $c, $dir ) = $this->resolveStoragePath( $params['dir'] );
		if ( $dir === null ) {
			$status->fatal( 'backend-fail-invalidpath', $params['dir'] );
			return $status; // invalid storage path
		}
		wfSuppressWarnings();
		if ( is_dir( $dir ) ) {
			rmdir( $dir ); // remove directory if empty
		}
		wfRestoreWarnings();
		return $status;
	}

	function fileExists( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return false; // invalid storage path
		}
		return is_file( $source );
	}

	function getHashType() {
		return 'md5';
	}

	function getFileHash( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return false; // invalid storage path
		}
		return md5_file( $source );
	}

	function getFileTimestamp( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return false; // invalid storage path
		}
		$fsFile = new FSFile( $source );
		return $fsFile->getTimestamp();
	}

	function getFileProps( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return FSFile::placeholderProps(); // invalid storage path
		}
		$fsFile = new FSFile( $source );
		return $fsFile->getProps();
	}

	function getFileList( array $params ) {
		list( $c, $dir ) = $this->resolveStoragePath( $params['dir'] );
		if ( $dir === null ) { // invalid storage path
			return array(); // empty result
		}
		try {
			$iter = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $dir ) );
		} catch ( UnexpectedValueException $e ) {
			$iter = array(); // dir does not exist?
		}
		return $iter;
	}

	function getLocalReference( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return null;
		}
		return new FSFile( $source );
	}

	function getLocalCopy( array $params ) {
		list( $c, $source ) = $this->resolveStoragePath( $params['src'] );
		if ( $source === null ) {
			return null;
		}

		// Get source file extension
		$i = strrpos( $source, '.' );
		$ext = strtolower( $i ? substr( $source, $i + 1 ) : '' );
		// Create a new temporary file...
		$tmpFile = TempFSFile::factory( 'localcopy_', $ext );
		if ( !$tmpFile ) {
			return null;
		}
		$tmpPath = $tmpFile->getPath();

		// Copy the source file over the temp file
		wfSuppressWarnings();
		$ok = copy( $source, $tmpPath );
		wfRestoreWarnings();
		if ( !$ok ) {
			return null;
		}

		$this->chmod( $tmpPath );

		return $tmpFile;
	}

	/**
	 * Chmod a file, suppressing the warnings
	 *
	 * @param $path string Absolute file system path
	 * @return bool Success
	 */
	protected function chmod( $path ) {
		wfSuppressWarnings();
		$ok = chmod( $path, $this->fileMode );
		wfRestoreWarnings();

		return $ok;
	}
}
