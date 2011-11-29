<?php
class UploadLocalForm {
	
	var $_error = '';
	var $_filename;
	
	/**
	 * With our parameters, simulate a request
	 */
	function UploadLocalForm($filename, $description, $watch, $dest) {
		global $wgUploadLocalDirectory;
		
		// Prepare our directory
		$dir = $wgUploadLocalDirectory;
		if ($dir[strlen($dir)-1] !== '/') $dir .= '/';
		
		$this->_filename = $filename;
		$this->comment = $description;
		$this->watch = $watch;
		$this->mDesiredDestName = $dest;
		$name = $dir . $filename;
		
		$this->upload = new UploadFromFile();
/** (CSN) 27 Oct 2011 - For 1.17.0, we need a request object */
		$fileInfo = array(
			'name' => $dest,
			'size' => filesize( $name ),
			'tmp_name' => $name,
			'error' => 0
		);
		//$this->upload->initialize( $dest, $name, filesize( $name ) );
		$this->upload->initialize( $name, new WebRequestUploadLocal( true, $fileInfo ) );
/* (CSN) end mod **/
	}
		
	function processUpload( $user ) {
		# Have to call this line to set the extension to avoid a VERIFICATION_ERROR
		$title = $this->upload->getTitle();
		
		# Check for warnings like the file already exists in the wiki
		$warnings = $this->upload->checkWarnings();
		if ( $warnings && isset( $warnings['exists'] ) && $warnings['exists']['warning'] != 'was-deleted' ) {
			$this->uploadError( 'The file '.$warnings['exists']['file']->getName().' already exists' );
			return;
		}
		
		# Check for verificatoins that the upload succeded.
		$verification = $this->upload->verifyUpload();
		if ( $verification['status'] === UploadBase::OK ) {
			$this->upload->performUpload( $this->comment, $this->comment, $this->watch, $user );
	
			// Cleanup any temporary mess
			$this->upload->cleanupTempFile();
		} else {
			switch( $verification['status'] ) {
				case UploadBase::EMPTY_FILE:
					$this->uploadError( 'The file you submitted was empty' );
					break;
				case UploadBase::FILETYPE_MISSING:
					$this->uploadError( 'The file is missing an extension' );
					break;
				case UploadBase::FILETYPE_BADTYPE:
					global $wgFileExtensions;
					$this->uploadError( 'This type of file is banned' );
					break;
				case UploadBase::MIN_LENGTH_PARTNAME:
					$this->uploadError( 'The filename is too short' );
					break;
				case UploadBase::ILLEGAL_FILENAME:
					$this->uploadError( 'The filename is not allowed' );
					break;
				case UploadBase::OVERWRITE_EXISTING_FILE:
					$this->uploadError( 'Overwriting an existing file is not allowed' );
					break;
				case UploadBase::VERIFICATION_ERROR:
					$this->uploadError( 'This file did not pass file verification: ' . $verification['details'][0] );
					break;
				case UploadBase::HOOK_ABORTED:
					$this->uploadError( "The modification you tried to make was aborted by an extension hook" );
					break;
				default:
					$this->uploadError( 'An unknown error occurred' );
					break;
			}
		}
	}
	
	function getFilename() {return $this->_filename;}
	function getUploadSaveName() {return $this->mDesiredDestName;}
		
	function mainUploadForm($msg='') {$this->_error = $msg;}
	function uploadError($error) {$this->_error = $error;}
	function showSuccess() {}
	
	function getError() {return $this->_error;}
}
