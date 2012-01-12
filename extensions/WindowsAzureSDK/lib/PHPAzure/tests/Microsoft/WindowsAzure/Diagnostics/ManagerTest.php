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
 * @version    $Id$
 * @copyright  Copyright (c) 2009 - 2011, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 */

date_default_timezone_set('UTC');
require_once dirname(__FILE__) . '/../../../TestConfiguration.php';
require_once 'PHPUnit/Framework/TestCase.php';

require_once 'Microsoft/WindowsAzure/Storage/Blob.php';
require_once 'Microsoft/WindowsAzure/Diagnostics/Manager.php';
require_once 'Microsoft/WindowsAzure/Diagnostics/ConfigurationInstance.php';

/**
 * @category   Microsoft
 * @package    Microsoft_WindowsAzure
 * @subpackage UnitTests
 * @version    $Id$
 * @copyright  Copyright (c) 2009 - 2011, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 */
class Microsoft_WindowsAzure_Diagnostics_ManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test teardown
     */
    protected function tearDown()
    {
        $storageClient = $this->createStorageInstance();
        for ($i = 1; $i <= self::$uniqId; $i++)
        {
            try { $storageClient->deleteContainer(TESTS_DIAGNOSTICS_CONTAINER_PREFIX . $i); } catch (Exception $e) { }
        }
    }

    protected function createStorageInstance()
    {
        $storageClient = null;
        if (TESTS_DIAGNOSTICS_RUNONPROD)
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
        return TESTS_DIAGNOSTICS_CONTAINER_PREFIX . self::$uniqId;
    }
    
    /**
     * Test manager initialize
     */
    public function testManagerInitialize()
    {
    	if (TESTS_DIAGNOSTICS_RUNTESTS) {
    		$controlContainer = $this->generateName();
    		
    		$storageClient = $this->createStorageInstance();
            $manager = new Microsoft_WindowsAzure_Diagnostics_Manager($storageClient, $controlContainer);
            
            $result = $storageClient->containerExists($controlContainer);
            $this->assertTrue($result);
    	}
    }
    
	/**
     * Test manager default configuration
     */
    public function testManagerDefaultConfiguration()
    {
    	if (TESTS_DIAGNOSTICS_RUNTESTS) {
    		$controlContainer = $this->generateName();
    		
    		$storageClient = $this->createStorageInstance();
            $manager = new Microsoft_WindowsAzure_Diagnostics_Manager($storageClient, $controlContainer);
            
            $configuration = $manager->getDefaultConfiguration();
            $manager->setConfigurationForRoleInstance('test', $configuration);
            
            $this->assertEquals($configuration->toXml(), $manager->getConfigurationForRoleInstance('test')->toXml());
    	}
    }
    
	/**
     * Test manager custom configuration
     */
    public function testManagerCustomConfiguration()
    {
    	if (TESTS_DIAGNOSTICS_RUNTESTS) {
    		$controlContainer = $this->generateName();
    		
    		$storageClient = $this->createStorageInstance();
            $manager = new Microsoft_WindowsAzure_Diagnostics_Manager($storageClient, $controlContainer);
            
            $configuration = $manager->getDefaultConfiguration();
			$configuration->DataSources->OverallQuotaInMB = 1;
			$configuration->DataSources->Logs->BufferQuotaInMB = 1;
			$configuration->DataSources->Logs->ScheduledTransferPeriodInMinutes = 1;
			$configuration->DataSources->PerformanceCounters->BufferQuotaInMB = 1;
			$configuration->DataSources->PerformanceCounters->ScheduledTransferPeriodInMinutes = 1;
			$configuration->DataSources->DiagnosticInfrastructureLogs->BufferQuotaInMB = 1;
			$configuration->DataSources->DiagnosticInfrastructureLogs->ScheduledTransferPeriodInMinutes = 1;
			$configuration->DataSources->PerformanceCounters->addSubscription('\Processor(*)\% Processor Time', 1);
			$configuration->DataSources->WindowsEventLog->addSubscription('System!*');
			$configuration->DataSources->WindowsEventLog->addSubscription('Application!*');
			$configuration->DataSources->Directories->addSubscription('X:\\', 'x', 10);
			$configuration->DataSources->Directories->addSubscription('Y:\\', 'y', 10);
			$configuration->DataSources->Directories->addSubscription('Z:\\', 'z', 10);
            $manager->setConfigurationForRoleInstance('test', $configuration);
            
            $result = $manager->getConfigurationForRoleInstance('test');
            
            $this->assertEquals($configuration->toXml(), $result->toXml());
            $this->assertEquals(1, count($result->DataSources->PerformanceCounters->Subscriptions));
            $this->assertEquals(2, count($result->DataSources->WindowsEventLog->Subscriptions));
            $this->assertEquals(3, count($result->DataSources->Directories->Subscriptions));
    	}
    }
    
	/**
     * Test manager configuration exists
     */
    public function testManagerConfigurationExists()
    {
    	if (TESTS_DIAGNOSTICS_RUNTESTS) {
    		$controlContainer = $this->generateName();
    		
    		$storageClient = $this->createStorageInstance();
            $manager = new Microsoft_WindowsAzure_Diagnostics_Manager($storageClient, $controlContainer);
            
            $result = $manager->configurationForRoleInstanceExists('test');
            $this->assertFalse($result);
            
            $configuration = $manager->getDefaultConfiguration();
            $manager->setConfigurationForRoleInstance('test', $configuration);
            
            $result = $manager->configurationForRoleInstanceExists('test');
            $this->assertTrue($result);
    	}
    }
}