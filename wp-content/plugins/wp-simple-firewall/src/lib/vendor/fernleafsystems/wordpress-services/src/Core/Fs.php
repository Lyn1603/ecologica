<?php

namespace FernleafSystems\Wordpress\Services\Core;

use FernleafSystems\Wordpress\Services\Services;

class Fs {

	/**
	 * @var \WP_Filesystem_Base
	 */
	protected $oWpfs = null;

	/**
	 * @param string $path
	 * @return bool
	 */
	public function isAbsPath( $path ) {
		return path_is_absolute( $path ) ||
			   ( Services::Data()->isWindows()
				 && preg_match( '#^[a-zA-Z]:/{1,2}#', wp_normalize_path( $path ) ) === 1 );
	}

	/**
	 * @param string $sBase
	 * @param string $sPath
	 * @return string
	 */
	public function pathJoin( $sBase, $sPath ) {
		return rtrim( $sBase, DIRECTORY_SEPARATOR ).DIRECTORY_SEPARATOR.ltrim( $sPath, DIRECTORY_SEPARATOR );
	}

	/**
	 * @param string $sDir
	 * @param array  $aExclude
	 */
	public function emptyDir( $sDir, $aExclude = [] ) {
		if ( $this->exists( $sDir ) ) {
			foreach ( new \DirectoryIterator( $sDir ) as $oFile ) {
				/** @var $oFile \DirectoryIterator */
				if ( !$oFile->isDot() && !in_array( $oFile->getBasename(), $aExclude ) ) {
					$oFile->isDir() ? $this->deleteDir( $oFile->getPathname() ) : $this->deleteFile( $oFile->getPathname() );
				}
			}
		}
		else {
			$this->mkdir( $sDir );
		}
	}

	/**
	 * @param string $sSource
	 * @param string $sTarget
	 */
	public function moveDirContents( $sSource, $sTarget ) {

		if ( !$this->exists( $sTarget ) ) {
			$this->mkdir( $sTarget );
		}

		$oDirIt = new \DirectoryIterator( $sSource );
		foreach ( $oDirIt as $oFile ) {
			if ( !$oFile->isDot() ) {
				$this->move( $oFile->getPathname(), path_join( $sTarget, $oFile->getBasename() ) );
			}
		}
	}

	/**
	 * @param $sFilePath
	 * @return bool|null    true/false whether file/directory exists
	 */
	public function exists( $sFilePath ) {
		$oFs = $this->getWpfs();
		if ( $oFs && $oFs->exists( $sFilePath ) ) {
			return true;
		}
		return function_exists( 'file_exists' ) ? file_exists( $sFilePath ) : null;
	}

	/**
	 * @param string $sNeedle
	 * @param string $sDir
	 * @param bool   $bIncludeExtension
	 * @param bool   $bCaseSensitive
	 * @return string|null
	 */
	public function findFileInDir( $sNeedle, $sDir, $bIncludeExtension = true, $bCaseSensitive = false ) {
		if ( empty( $sNeedle ) || empty( $sDir ) || !$this->canAccessDirectory( $sDir ) ) {
			return false;
		}

		$allFiles = $this->getAllFilesInDir( $sDir, false );
		if ( !$bCaseSensitive ) {
			$sNeedle = strtolower( $sNeedle );
		}

		//if the file you're searching for doesn't have an extension, then we don't include extensions in search
		$nDotPosition = strpos( $sNeedle, '.' );
		$bHasExtension = $nDotPosition !== false;
		$bIncludeExtension = $bIncludeExtension && $bHasExtension;
		$sNeedlePreExtension = $bHasExtension ? substr( $sNeedle, 0, $nDotPosition ) : $sNeedle;

		$theFile = null;
		foreach ( $allFiles as $filePath ) {

			$file = basename( $filePath );
			if ( !$bCaseSensitive ) {
				$file = strtolower( $file );
			}

			if ( $bIncludeExtension ) {
				if ( $file == $sNeedle ) {
					$theFile = $filePath;
					break;
				}
			}
			elseif ( strpos( $file, $sNeedlePreExtension ) === 0 ) {
				// This is not entirely accurate as it only finds whether a file "starts" with needle, ignoring subsequent characters
				$theFile = $filePath;
				break;
			}
		}

		return $theFile;
	}

	/**
	 * @param string $dir
	 * @return bool
	 */
	protected function canAccessDirectory( $dir ) :bool {
		return !is_null( $this->getDirIterator( $dir ) );
	}

	/**
	 * @param string $dir
	 * @param bool   $includeDirs
	 * @return string[]
	 */
	public function getAllFilesInDir( $dir, $includeDirs = true ) {
		$files = [];
		if ( $this->canAccessDirectory( $dir ) ) {
			foreach ( $this->getDirIterator( $dir ) as $fileItem ) {
				if ( !$fileItem->isDot() && ( $fileItem->isFile() || $includeDirs ) ) {
					$files[] = $fileItem->getPathname();
				}
			}
		}
		return empty( $files ) ? [] : $files;
	}

	/**
	 * @param string $dir
	 * @return \DirectoryIterator|null
	 */
	protected function getDirIterator( $dir ) {
		$iterator = null;

		if ( !empty( $dir ) && $this->isDir( $dir ) ) {
			try {
				$iterator = new \DirectoryIterator( $dir );
			}
			catch ( \Exception $e ) { //  UnexpectedValueException, RuntimeException, Exception
			}
		}
		return $iterator;
	}

	/**
	 * @return string|null
	 */
	public function getContent_WpConfig() {
		return $this->getFileContent( Services::WpGeneral()->getPath_WpConfig() );
	}

	/**
	 * @param string $content
	 * @return bool
	 */
	public function putContent_WpConfig( $content ) {
		return $this->putFileContent( Services::WpGeneral()->getPath_WpConfig(), $content );
	}

	/**
	 * @param string $url
	 * @param bool   $secure
	 * @return bool
	 */
	public function getIsUrlValid( $url, $secure = false ) {
		$schema = $secure ? 'https://' : 'http://';
		$url = ( strpos( $url, 'http' ) !== 0 ) ? $schema.$url : $url;
		return Services::HttpRequest()->get( $url );
	}

	/**
	 * @return bool
	 */
	public function getCanWpRemoteGet() {
		$can = false;
		$urls = [
			'https://www.microsoft.com',
			'https://www.google.com',
			'https://www.facebook.com'
		];
		foreach ( $urls as $url ) {
			if ( Services::HttpRequest()->get( $url ) ) {
				$can = true;
				break;
			}
		}
		return $can;
	}

	public function getCanDiskWrite() {
		$path = __DIR__.'/testfile.'.rand().'txt';
		$contents = "Testing icwp file read and write.";

		// Write, read, verify, delete.
		if ( $this->putFileContent( $path, $contents ) ) {
			$fileContents = $this->getFileContent( $path );
			if ( !is_null( $fileContents ) && $fileContents === $contents ) {
				return $this->deleteFile( $path );
			}
		}
		return false;
	}

	/**
	 * @param $path
	 * @return string
	 */
	public function getPathRelativeToAbsPath( $path ) :string {
		return preg_replace(
			sprintf( '#^%s#i', preg_quote( wp_normalize_path( ABSPATH ), '#' ) ),
			'',
			wp_normalize_path( $path )
		);
	}

	public function getModifiedTime( string $path ) :int {
		$FS = $this->getWpfs();
		return (int)( $FS ? $FS->mtime( $path ) : @filemtime( $path ) );
	}

	public function getAccessedTime( string $path ) :int {
		$FS = $this->getWpfs();
		return (int)( $FS ? $FS->atime( $path ) : @fileatime( $path ) );
	}

	/**
	 * @param string $path
	 * @param string $property
	 * @return int|null
	 * @deprecated
	 */
	public function getTime( $path, $property = 'modified' ) {

		if ( !$this->exists( $path ) ) {
			return null;
		}

		$FS = $this->getWpfs();
		switch ( $property ) {

			case 'modified' :
				return $FS ? $FS->mtime( $path ) : filemtime( $path );
			case 'accessed' :
				return $FS ? $FS->atime( $path ) : fileatime( $path );
			default:
				return null;
		}
	}

	/**
	 * @param string $path
	 * @return null|bool
	 */
	public function getCanReadWriteFile( $path ) {
		if ( !file_exists( $path ) ) {
			return null;
		}

		$fileSize = filesize( $path );
		if ( $fileSize === 0 ) {
			return null;
		}

		$content = $this->getFileContent( $path );
		if ( empty( $content ) ) {
			return false; //can't even read the file!
		}
		return $this->putFileContent( $path, $content );
	}

	/**
	 * @param string $path
	 * @param bool   $uncompress
	 * @return string|null
	 */
	public function getFileContent( $path, $uncompress = false ) {
		$contents = null;
		$FS = $this->getWpfs();
		if ( $FS ) {
			$contents = $FS->get_contents( $path );
		}

		if ( empty( $contents ) && function_exists( 'file_get_contents' ) ) {
			$contents = file_get_contents( $path );
		}

		if ( !empty( $contents ) && $uncompress && function_exists( 'gzinflate' ) ) {
			$contents = gzinflate( $contents );
		}

		return $contents;
	}

	/**
	 * Use this to reliably read the contents of a PHP file that doesn't have executable
	 * PHP Code.
	 * Why use this? In the name of naive security, silly web hosts can prevent reading the contents of
	 * non-PHP files so we simply put the content we want to have read into a php file and then "include" it.
	 * @param string $file
	 * @return string
	 */
	public function getFileContentUsingInclude( $file ) {
		ob_start();
		@include( $file );
		return ob_get_clean();
	}

	/**
	 * @param $path
	 * @return bool
	 */
	public function getFileSize( $path ) {
		$oFs = $this->getWpfs();
		if ( $oFs && ( $oFs->size( $path ) > 0 ) ) {
			return $oFs->size( $path );
		}
		return @filesize( $path );
	}

	/**
	 * @param string                      $dir
	 * @param int                         $maxDepth - set to zero for no max
	 * @param \RecursiveDirectoryIterator $dirIterator
	 * @return \SplFileInfo[]
	 */
	public function getFilesInDir( $dir, $maxDepth = 1, $dirIterator = null ) {
		$list = [];

		try {
			if ( empty( $dirIterator ) ) {
				$dirIterator = new \RecursiveDirectoryIterator( $dir );
				if ( method_exists( $dirIterator, 'setFlags' ) ) {
					$dirIterator->setFlags( \RecursiveDirectoryIterator::SKIP_DOTS );
				}
			}

			$recurIter = new \RecursiveIteratorIterator( $dirIterator );
			$recurIter->setMaxDepth( $maxDepth - 1 ); //since they start at zero.

			/** @var \SplFileInfo $oFile */
			foreach ( $recurIter as $file ) {
				$list[] = clone $file;
			}
		}
		catch ( \Exception $e ) { //  UnexpectedValueException, RuntimeException, Exception
		}

		return $list;
	}

	/**
	 * @param string|null $baseDir
	 * @param string      $prefix
	 * @param string      $outsRandomDir
	 * @return bool|string
	 */
	public function getTempDir( $baseDir = null, $prefix = '', &$outsRandomDir = '' ) {
		$sTemp = rtrim( ( is_null( $baseDir ) ? get_temp_dir() : $baseDir ), DIRECTORY_SEPARATOR ).DIRECTORY_SEPARATOR;

		$sCharset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789';
		do {
			$sDir = $prefix;
			for ( $i = 0 ; $i < 8 ; $i++ ) {
				$sDir .= $sCharset[ ( rand()%strlen( $sCharset ) ) ];
			}
		} while ( is_dir( $sTemp.$sDir ) );

		$outsRandomDir = $sDir;

		$bSuccess = true;
		if ( !@mkdir( $sTemp.$sDir, 0755, true ) ) {
			$bSuccess = false;
		}
		return ( $bSuccess ? $sTemp.$sDir : false );
	}

	/**
	 * @param string $path
	 * @param string $contents
	 * @param bool   $compress
	 * @return bool
	 */
	public function putFileContent( $path, $contents, $compress = false ) {

		if ( $compress && function_exists( 'gzdeflate' ) ) {
			$contents = gzdeflate( $contents );
		}

		$FS = $this->getWpfs();
		if ( $FS && $FS->put_contents( $path, $contents, FS_CHMOD_FILE ) ) {
			return true;
		}

		if ( function_exists( 'file_put_contents' ) ) {
			return file_put_contents( $path, $contents ) !== false;
		}
		return false;
	}

	/**
	 * Recursive delete
	 * @param string $dir
	 * @return bool
	 */
	public function deleteDir( $dir ) {
		$FS = $this->getWpfs();
		if ( $FS && $FS->rmdir( $dir, true ) ) {
			return true;
		}
		return @rmdir( $dir );
	}

	/**
	 * @param string $path
	 * @return bool|null
	 */
	public function deleteFile( $path ) {
		$FS = $this->getWpfs();
		if ( $FS && $FS->delete( $path ) ) {
			return true;
		}
		return function_exists( 'unlink' ) ? @unlink( $path ) : null;
	}

	/**
	 * @param string $pathSource
	 * @param string $pathDestination
	 * @return bool|null
	 */
	public function move( $pathSource, $pathDestination ) {
		$FS = $this->getWpfs();
		if ( $FS && $FS->move( $pathSource, $pathDestination ) ) {
			return true;
		}
		return function_exists( 'rename' ) ? @rename( $pathSource, $pathDestination ) : null;
	}

	public function isDir( string $path ) :bool {
		return ( $this->hasWpfs() && $this->getWpfs()->is_dir( $path ) )
			   || ( function_exists( 'is_dir' ) && is_dir( $path ) );
	}

	public function isFile( $path ) :bool {
		return ( $this->hasWpfs() && $this->getWpfs()->is_file( $path ) )
			   || ( function_exists( 'is_file' ) && is_file( $path ) );
	}

	public function isFilesystemAccessDirect() :bool {
		return $this->getWpfs() instanceof \WP_Filesystem_Direct;
	}

	/**
	 * @param string $path
	 * @return bool
	 */
	public function mkdir( $path ) {
		return wp_mkdir_p( $path );
	}

	/**
	 * @param string $path
	 * @param int    $time
	 * @return bool|mixed
	 */
	public function touch( $path, $time = null ) {
		$FS = $this->getWpfs();
		if ( empty( $time ) ) {
			$time = time();
		}
		if ( $FS && $FS->touch( $path, $time ) ) {
			return true;
		}
		return function_exists( 'touch' ) && @touch( $path, $time );
	}

	/**
	 * @return \WP_Filesystem_Base
	 */
	protected function getWpfs() {
		if ( is_null( $this->oWpfs ) ) {
			$this->initFileSystem();
		}
		return $this->oWpfs;
	}

	protected function hasWpfs() :bool {
		return $this->getWpfs() instanceof \WP_Filesystem_Base;
	}

	private function initFileSystem() {
		if ( is_null( $this->oWpfs ) ) {
			$this->oWpfs = false;
			require_once( ABSPATH.'wp-admin/includes/file.php' );
			if ( \WP_Filesystem() ) {
				global $wp_filesystem;
				if ( isset( $wp_filesystem ) && is_object( $wp_filesystem ) ) {
					$this->oWpfs = $wp_filesystem;
				}
			}
		}
	}

	/**
	 * @param string $sUrl
	 * @param array  $aRequestArgs
	 * @return array|bool
	 * @deprecated
	 */
	public function requestUrl( $sUrl, $aRequestArgs = [] ) {
		return Services::HttpRequest()->requestUrl( $sUrl, $aRequestArgs );
	}

	/**
	 * @param string $url
	 * @param array  $args
	 * @return array|false
	 * @deprecated
	 */
	public function getUrl( $url, $args = [] ) {
		return Services::HttpRequest()->requestUrl( $url, $args, 'GET' );
	}

	/**
	 * @param string $url
	 * @param array  $args
	 * @return false|string
	 * @deprecated
	 */
	public function getUrlContent( $url, $args = [] ) {
		return Services::HttpRequest()->getContent( $url, $args );
	}

	/**
	 * @param string $sUrl
	 * @param array  $aRequestArgs
	 * @return array|false
	 * @deprecated
	 */
	public function postUrl( $sUrl, $aRequestArgs = [] ) {
		return Services::HttpRequest()->requestUrl( $sUrl, $aRequestArgs, 'POST' );
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getWpConfigPath() {
		return Services::WpGeneral()->getPath_WpConfig();
	}
}