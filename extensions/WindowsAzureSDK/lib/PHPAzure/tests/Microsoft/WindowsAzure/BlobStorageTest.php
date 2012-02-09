<?php
/**
 * Copyright (c) 2009 - 2011, RealDolmen
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of RealDolmen nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY RealDolmen ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL RealDolmen BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Microsoft
 * @package    Microsoft_WindowsAzure
 * @subpackage UnitTests
 * @version    $Id: BlobStorageTest.php 66210 2011-11-08 12:44:39Z unknown $
 * @copyright  Copyright (c) 2009 - 2011, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 */

date_default_timezone_set('UTC');
require_once dirname(__FILE__) . '/../../TestConfiguration.php';
require_once 'PHPUnit/Framework/TestCase.php';

require_once 'Microsoft/WindowsAzure/Storage/Blob.php';

/**
 * @category   Microsoft
 * @package    Microsoft_WindowsAzure
 * @subpackage UnitTests
 * @version    $Id: BlobStorageTest.php 66210 2011-11-08 12:44:39Z unknown $
 * @copyright  Copyright (c) 2009 - 2011, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 */
class Microsoft_WindowsAzure_BlobStorageTest extends PHPUnit_Framework_TestCase
{
    static $path;
    
    public function __construct()
    {
        self::$path = dirname(__FILE__).'/_files/';
    }
   
    /**
     * Test setup
     */
    protected function setUp()
    {
    }
    
    /**
     * Test teardown
     */
    protected function tearDown()
    {
        $storageClient = $this->createStorageInstance();
        for ($i = 1; $i <= self::$uniqId; $i++)
        {
            try { $storageClient->deleteContainer(TESTS_BLOB_CONTAINER_PREFIX . $i); } catch (Exception $e) { }
        }
        try { $storageClient->deleteContainer('$root'); } catch (Exception $e) { }
    }

    protected function createStorageInstance()
    {
        $storageClient = null;
        if (TESTS_BLOB_RUNONPROD)
        {
            $storageClient = new Microsoft_WindowsAzure_Storage_Blob(TESTS_BLOB_HOST_PROD, TESTS_STORAGE_ACCOUNT_PROD, TESTS_STORAGE_KEY_PROD, false, Microsoft_WindowsAzure_RetryPolicy_RetryPolicyAbstract::retryN(10, 250));
        } else {
            $storageClient = new Microsoft_WindowsAzure_Storage_Blob(TESTS_BLOB_HOST_DEV, TESTS_STORAGE_ACCOUNT_DEV, TESTS_STORAGE_KEY_DEV, true, Microsoft_WindowsAzure_RetryPolicy_RetryPolicyAbstract::retryN(10, 250));
        }
        
        if (TESTS_STORAGE_USEPROXY) {
            $storageClient->setProxy(TESTS_STORAGE_USEPROXY, TESTS_STORAGE_PROXY, TESTS_STORAGE_PROXY_PORT, TESTS_STORAGE_PROXY_CREDENTIALS);
        }

        return $storageClient;
    }
    
    protected static $uniqId = 0;
    
    protected function generateName()
    {
        self::$uniqId++;
        return TESTS_BLOB_CONTAINER_PREFIX . self::$uniqId;
    }
    
    /**
     * Test container exists
     */
    public function testContainerExists()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName1 = $this->generateName();
            $containerName2 = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName1);
            $storageClient->createContainer($containerName2);
            
            $result = $storageClient->containerExists($containerName1);
            $this->assertTrue($result);
            
            $result = $storageClient->containerExists(md5(time()));
            $this->assertFalse($result);
        }
    }
    
    /**
     * Test blob exists
     */
    public function testBlobExists()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlob($containerName, 'WindowsAzure1.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->putBlob($containerName, 'WindowsAzure2.gif', self::$path . 'WindowsAzure.gif');
            
            $result = $storageClient->blobExists($containerName, 'WindowsAzure1.gif');
            $this->assertTrue($result);
            
            $result = $storageClient->blobExists($containerName, md5(time()));
            $this->assertFalse($result);
        }
    }

    /**
     * Test create container
     */
    public function testCreateContainer()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $result = $storageClient->createContainer($containerName);
            $this->assertEquals($containerName, $result->Name);
        }
    }
    
    /**
     * Test get container acl
     */
    public function testGetContainerAcl()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $acl = $storageClient->getContainerAcl($containerName);
            $this->assertEquals(Microsoft_WindowsAzure_Storage_Blob::ACL_PRIVATE, $acl);        
        }
    }
    
    /**
     * Test create container if not exists
     */
    public function testCreateContainerIfNotExists()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            
            $result = $storageClient->containerExists($containerName);
            $this->assertFalse($result);
            
            $storageClient->createContainerIfNotExists($containerName);
            
            $result = $storageClient->containerExists($containerName);
            $this->assertTrue($result);
            
            $storageClient->createContainerIfNotExists($containerName);
        }
    }
    
    /**
     * Test set container acl
     */
    public function testSetContainerAcl()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->setContainerAcl($containerName, Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_BLOB);
            $acl = $storageClient->getContainerAcl($containerName);
            
            $this->assertEquals(Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_BLOB, $acl);
            
            $storageClient->setContainerAcl($containerName, Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_CONTAINER);
            $acl = $storageClient->getContainerAcl($containerName);
            
            $this->assertEquals(Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_CONTAINER, $acl);
            
            $storageClient->setContainerAcl($containerName, Microsoft_WindowsAzure_Storage_Blob::ACL_PRIVATE);
            $acl = $storageClient->getContainerAcl($containerName);
            
            $this->assertEquals(Microsoft_WindowsAzure_Storage_Blob::ACL_PRIVATE, $acl);
        }
    }
    
    /**
     * Test set container acl advanced
     */
    public function testSetContainerAclAdvanced()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->setContainerAcl(
                $containerName,
                Microsoft_WindowsAzure_Storage_Blob::ACL_PRIVATE,
                array(
                    new Microsoft_WindowsAzure_Storage_SignedIdentifier('ABCDEF', '2009-10-10', '2009-10-11', 'r')
                )
            );
            $acl = $storageClient->getContainerAcl($containerName, true);
            
            $this->assertEquals(1, count($acl));
        }
    }

    /**
     * Test set container metadata
     */
    public function testSetContainerMetadata()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->setContainerMetadata($containerName, array(
                'createdby' => 'PHPAzure',
            ));
            
            $metadata = $storageClient->getContainerMetadata($containerName);
            $this->assertEquals('PHPAzure', $metadata['createdby']);
        }
    }
    
    /**
     * Test list containers
     */
    public function testListContainers()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName1 = 'testlist1';
            $containerName2 = 'testlist2';
            $containerName3 = 'testlist3';
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName1);
            $storageClient->createContainer($containerName2);
            $storageClient->createContainer($containerName3);
            $result1 = $storageClient->listContainers('testlist');
            $result2 = $storageClient->listContainers('testlist', 1);
    
            // cleanup first
            $storageClient->deleteContainer($containerName1);
            $storageClient->deleteContainer($containerName2);
            $storageClient->deleteContainer($containerName3);
            
            $this->assertEquals(3, count($result1));
            $this->assertEquals($containerName2, $result1[1]->Name);
            
            $this->assertEquals(1, count($result2));
        }
    }
    
    /**
     * Test list containers with metadata
     */
    public function testListContainersWithMetadata()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName, array(
                'createdby' => 'PHPAzure',
                'ownedby' => 'PHPAzure',
            ));
            
            $result = $storageClient->listContainers($containerName, null, null, 'metadata');
            
            $this->assertEquals('PHPAzure', $result[0]->Metadata['createdby']);
            $this->assertEquals('PHPAzure', $result[0]->Metadata['ownedby']);
        }
    }
    
    /**
     * Test put blob
     */
    public function testPutBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $result = $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
    
            $this->assertEquals($containerName, $result->Container);
            $this->assertEquals('images/WindowsAzure.gif', $result->Name);
        }
    }
    
    /**
     * Test put blob data
     */
    public function testPutBlobData()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $result = $storageClient->putBlobData($containerName, 'test.txt', 'Hello World!');
    
            $this->assertEquals($containerName, $result->Container);
            $this->assertEquals('test.txt', $result->Name);
        }
    }
    
    /**
     * Test put large blob
     */
    public function testPutLargeBlob()
    {
        if (TESTS_BLOB_RUNTESTS && TESTS_BLOB_RUNLARGEBLOB) {
            // Create a file > Microsoft_WindowsAzure_Storage_Blob::MAX_BLOB_SIZE
            $fileName = $this->_createLargeFile();
            
            // Execute test
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $result = $storageClient->putLargeBlob($containerName, 'LargeFile.txt', $fileName);
    
            $this->assertEquals($containerName, $result->Container);
            $this->assertEquals('LargeFile.txt', $result->Name);
            
            // Get block list
            $blockList = $storageClient->getBlockList($containerName, 'LargeFile.txt');
            $this->assertTrue(count($blockList['CommittedBlocks']) > 0);
            
            // Remove file
            unlink($fileName);
        }
    }
    
    /**
     * Test get blob
     */
    public function testGetBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
            
            $fileName = tempnam('', 'tst');
            $storageClient->getBlob($containerName, 'images/WindowsAzure.gif', $fileName);
    
            $this->assertTrue(file_exists($fileName));
            $this->assertEquals(
                file_get_contents(self::$path . 'WindowsAzure.gif'),
                file_get_contents($fileName)
            );
            
            // Remove file
            unlink($fileName);
        }
    }
    
    /**
     * Test get blob data
     */
    public function testGetBlobData()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $result = $storageClient->putBlobData($containerName, 'test.txt', 'Hello World!');

            $data = $storageClient->getBlobData($containerName, 'test.txt');
    
            $this->assertEquals(
                'Hello World!',
                $data
            );
        }
    }

    /**
     * Test snapshot blob
     */
    public function testSnapshotBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $result = $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
    
            $this->assertEquals($containerName, $result->Container);
            $this->assertEquals('images/WindowsAzure.gif', $result->Name);
            
            $snapshotId = $storageClient->snapshotBlob($containerName, 'images/WindowsAzure.gif');
           
            $fileName = tempnam('', 'tst');
            $storageClient->getBlob($containerName, 'images/WindowsAzure.gif', $fileName, $snapshotId);
    
            $this->assertTrue(file_exists($fileName));
            $this->assertEquals(
                file_get_contents(self::$path . 'WindowsAzure.gif'),
                file_get_contents($fileName)
            );
            
            // Remove file
            unlink($fileName);
        }
    }

    /**
     * Test lease blob
     */
    public function testLeaseBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlobData($containerName, 'test.txt', 'Hello World!');
            
            // Acquire a lease
            $lease = $storageClient->leaseBlob($containerName, 'test.txt', Microsoft_WindowsAzure_Storage_Blob::LEASE_ACQUIRE);
            $this->assertNotEquals('', $lease->LeaseId);

            // Second lease should not be possible
            $exceptionThrown = false;
            try {
            	$storageClient->leaseBlob($containerName, 'test.txt', Microsoft_WindowsAzure_Storage_Blob::LEASE_ACQUIRE);
            } catch (Exception $e) {
            	$exceptionThrown = true;
            }
            $this->assertTrue($exceptionThrown);
			
            // Delete should not be possible
            $exceptionThrown = false;
            try {
            	$storageClient->deleteBlob($containerName, 'test.txt');
            } catch (Exception $e) {
            	$exceptionThrown = true;
            }
            $this->markTestIncomplete('Test inconclusive. Verify http://social.msdn.microsoft.com/Forums/en/windowsazure/thread/9ae25614-b1da-43ab-abca-644abc034eb3 for info.');
            $this->assertTrue($exceptionThrown);
            
            // But should work when a lease id is supplied
            $exceptionThrown = false;
            try {
            	$storageClient->putBlobData($containerName, 'test.txt', 'Hello!');
            } catch (Exception $e) {
            	$exceptionThrown = true;
            }
            $this->assertFalse($exceptionThrown);
        }
    }
    
    /**
     * Test set blob properties
     */
    public function testSetBlobProperties()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
            
            $storageClient->setBlobProperties($containerName, 'images/WindowsAzure.gif', null, array(
                'x-ms-blob-content-language' => 'nl-BE',
            	'x-ms-blob-content-type' => 'image/gif'
            ));
            
            $blobInstance = $storageClient->getBlobInstance($containerName, 'images/WindowsAzure.gif');

            $this->assertEquals('nl-BE', $blobInstance->ContentLanguage);
            $this->assertEquals('image/gif', $blobInstance->ContentType);
        }
    }
    
    /**
     * Test set blob metadata
     */
    public function testSetBlobMetadata()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
            
            $storageClient->setBlobMetadata($containerName, 'images/WindowsAzure.gif', array(
                'createdby' => 'PHPAzure',
            ));
            
            $metadata = $storageClient->getBlobMetadata($containerName, 'images/WindowsAzure.gif');
            $this->assertEquals('PHPAzure', $metadata['createdby']);
        }
    }
    
	/**
     * Test set blob metadata, ensuring no additional headers can be added.
     */
    public function testSetBlobMetadata_Security_AdditionalHeaders()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
            
			$exceptionThrown = false;
            try {
            	// adding a newline should not be possible...
                $storageClient->setBlobMetadata($containerName, 'images/WindowsAzure.gif', array(
	                'createdby' => "PHPAzure\nx-ms-meta-something:false",
	            ));
            } catch (Exception $ex) {
                $exceptionThrown = true;
            }
            $this->assertTrue($exceptionThrown);
        }
    }
    
    /**
     * Test delete blob
     */
    public function testDeleteBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->deleteBlob($containerName, 'images/WindowsAzure.gif');
            
            $result = $storageClient->listBlobs($containerName);
            $this->assertEquals(0, count($result));
        }
    }
    
    /**
     * Test list blobs
     */
    public function testListBlobs()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->putBlob($containerName, 'images/WindowsAzure1.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->putBlob($containerName, 'images/WindowsAzure2.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->putBlob($containerName, 'images/WindowsAzure3.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->putBlob($containerName, 'images/WindowsAzure4.gif', self::$path . 'WindowsAzure.gif');
            $storageClient->putBlob($containerName, 'images/WindowsAzure5.gif', self::$path . 'WindowsAzure.gif');
            
            $result1 = $storageClient->listBlobs($containerName);
            $this->assertEquals(5, count($result1));
            $this->assertEquals('images/WindowsAzure5.gif', $result1[4]->Name);
            
            $result2 = $storageClient->listBlobs($containerName, '', '', 2);
            $this->assertEquals(2, count($result2));
        }
    }
    
    /**
     * Test list blobs with all includes
     */
    public function testListBlobsWithAllIncludes()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            $storageClient->putBlob($containerName, 'images/WindowsAzure1.gif', self::$path . 'WindowsAzure.gif', array(
                'createdby' => 'PHPAzure',
                'ownedby' => 'PHPAzure',
            ));
            $storageClient->putBlob($containerName, 'images/WindowsAzure2.gif', self::$path . 'WindowsAzure.gif', array(
                'createdby' => 'PHPAzure',
                'ownedby' => 'PHPAzure',
            ));
            $storageClient->putBlob($containerName, 'images/WindowsAzure3.gif', self::$path . 'WindowsAzure.gif', array(
                'createdby' => 'PHPAzure',
                'ownedby' => 'PHPAzure',
            ));
            
            $result = $storageClient->listBlobs($containerName, '', '', null, null, 'metadata,snapshots,uncommittedblobs');
            $this->assertEquals(3, count($result));
            $this->assertEquals('images/WindowsAzure2.gif', $result[1]->Name);
            
            $this->assertEquals('PHPAzure', $result[1]->Metadata['createdby']);
            $this->assertEquals('PHPAzure', $result[1]->Metadata['ownedby']);
        }
    }
    
    /**
     * Test copy blob
     */
    public function testCopyBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $source = $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
    
            $this->assertEquals($containerName, $source->Container);
            $this->assertEquals('images/WindowsAzure.gif', $source->Name);
            
            $destination = $storageClient->copyBlob($containerName, 'images/WindowsAzure.gif', $containerName, 'images/WindowsAzureCopy.gif');
    
            $this->assertEquals($containerName, $destination->Container);
            $this->assertEquals('images/WindowsAzureCopy.gif', $destination->Name);
            
            $snapshotId = $storageClient->snapshotBlob($containerName, 'images/WindowsAzure.gif');
            $destination = $storageClient->copyBlob($containerName, 'images/WindowsAzure.gif', $containerName, 'images/WindowsAzureCopy2.gif', array(), $snapshotId);
    
            $this->assertEquals($containerName, $destination->Container);
            $this->assertEquals('images/WindowsAzureCopy2.gif', $destination->Name);
        }
    }
    
    /**
     * Test root container
     */
    public function testRootContainer()
    {
        if (TESTS_BLOB_RUNTESTS) {
            $containerName = '$root';
            $storageClient = $this->createStorageInstance();
            $result = $storageClient->createContainer($containerName);
            $this->assertEquals($containerName, $result->Name);
            
            // ACL
            $storageClient->setContainerAcl($containerName, Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_CONTAINER);
            $acl = $storageClient->getContainerAcl($containerName);
            
            $this->assertEquals(Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC_CONTAINER, $acl);
            
            // Metadata
            $storageClient->setContainerMetadata($containerName, array(
                'createdby' => 'PHPAzure',
            ));
            
            $metadata = $storageClient->getContainerMetadata($containerName);
            $this->assertEquals('PHPAzure', $metadata['createdby']);
            
            // List
            $result = $storageClient->listContainers();
            $this->assertEquals(1, count($result));
            
            // Put blob
            $result = $storageClient->putBlob($containerName, 'WindowsAzure.gif', self::$path . 'WindowsAzure.gif');
   
            $this->assertEquals($containerName, $result->Container);
            $this->assertEquals('WindowsAzure.gif', $result->Name);
            
            // Get blob
            $fileName = tempnam('', 'tst');
            $storageClient->getBlob($containerName, 'WindowsAzure.gif', $fileName);
    
            $this->assertTrue(file_exists($fileName));
            $this->assertEquals(
                file_get_contents(self::$path . 'WindowsAzure.gif'),
                file_get_contents($fileName)
            );
            
            // Remove file
            unlink($fileName);
            
            // Blob metadata
            $storageClient->setBlobMetadata($containerName, 'WindowsAzure.gif', array(
                'createdby' => 'PHPAzure',
            ));
            
            $metadata = $storageClient->getBlobMetadata($containerName, 'WindowsAzure.gif');
            $this->assertEquals('PHPAzure', $metadata['createdby']);
            
            // List blobs
            $result = $storageClient->listBlobs($containerName);
            $this->assertEquals(1, count($result));
            
            // Delete blob
            $storageClient->deleteBlob($containerName, 'WindowsAzure.gif');
            
            $result = $storageClient->listBlobs($containerName);
            $this->assertEquals(0, count($result));
        }
    }

    /**
     * Test page blob
     */
    public function testPageBlob()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            // Data to store
            $data1 = "Hello, World!" . str_repeat(' ', 1024 - 13);
            $data2 = "Hello, World!" . str_repeat(' ', 512 - 13);
            
            // 1. Create the empty page blob
            $storageClient->createPageBlob($containerName, 'test.txt', 1024);
           
            // 2. Upload all data
            $storageClient->putPage($containerName, 'test.txt', 0, 1023, $data1);

            // Verify contents
            $this->assertEquals($data1, $storageClient->getBlobData($containerName, 'test.txt'));

            // 3. Clear the page blob
            $storageClient->putPage($containerName, 'test.txt', 0, 1023, '', Microsoft_WindowsAzure_Storage_Blob::PAGE_WRITE_CLEAR);
            
            // 4. Upload some other data in 2 pages
            $storageClient->putPage($containerName, 'test.txt', 0, 511, $data2);
            $storageClient->putPage($containerName, 'test.txt', 512, 1023, $data2);
            
            // Verify other data
            $this->assertEquals($data2 . $data2, $storageClient->getBlobData($containerName, 'test.txt'));
        }
    }
    
    /**
     * Test get page regions
     */
    public function testGetPageRegions()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            
            // Data to store
            $data = "Hello, World!" . str_repeat(' ', 512 - 13);
            
            // Upload contents in 2 parts
            $storageClient->createPageBlob($containerName, 'test2.txt', 1024 * 1024 * 1024);
            $storageClient->putPage($containerName, 'test2.txt', 0, 511, $data);
            $storageClient->putPage($containerName, 'test2.txt', 1048576, 1049087, $data);

            // Get page regions
            $pageRegions = $storageClient->getPageRegions($containerName, 'test2.txt');
            
            // Verify
            $this->assertEquals(2, count($pageRegions));
        }
    }

    /**
     * Test put blob with x-ms-blob-cache-control header
     */
    public function testPutBlobWithCacheControlHeader()
    {
    	if (TESTS_BLOB_RUNTESTS) {
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $headers = array("x-ms-blob-cache-control" => "public, max-age=7200");
            $result = $storageClient->putBlob($containerName, 'images/WindowsAzure.gif', self::$path . 'WindowsAzure.gif', array(), null, $headers);
    
            $blobInstance = $storageClient->getBlobInstance($containerName, 'images/WindowsAzure.gif');
            
            $this->assertEquals($headers["x-ms-blob-cache-control"], $blobInstance->CacheControl);
        }
    }
    
    /**
     * Test put large blob with x-ms-blob-cache-control header
     */
    public function testPutLargeBlobWithCacheControlHeader()
    {
        if (TESTS_BLOB_RUNTESTS && TESTS_BLOB_RUNLARGEBLOB) {
            // Create a file > Microsoft_WindowsAzure_Storage_Blob::MAX_BLOB_SIZE
            $fileName = $this->_createLargeFile();
            
            // Execute test
            $containerName = $this->generateName();
            $storageClient = $this->createStorageInstance();
            $storageClient->createContainer($containerName);
            $headers = array("x-ms-blob-cache-control" => "public, max-age=7200");
            $storageClient->putLargeBlob($containerName, 'LargeFile.txt', $fileName, array(), null, array("x-ms-blob-cache-control" => "public, max-age=7200"));
    
            $blobInstance = $storageClient->getBlobInstance($containerName, 'LargeFile.txt');
            
            $this->assertEquals($headers["x-ms-blob-cache-control"], $blobInstance->CacheControl);
            
            // Remove file
            unlink($fileName);
        }
    }
    
    /**
     * Create large file
     * 
     * @return string Filename
     */
    protected function _createLargeFile()
    {
        $fileName = tempnam('', 'tst');
        $fp = fopen($fileName, 'w');
        for ($i = 0; $i < Microsoft_WindowsAzure_Storage_Blob::MAX_BLOB_SIZE / 1024; $i++)
        {
            fwrite($fp, str_repeat('x', 1024));
        }
        fclose($fp);
        return $fileName;
    }
}