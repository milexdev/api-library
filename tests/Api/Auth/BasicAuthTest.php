<?php
/**
 * @copyright   2014 Milex, NP. All rights reserved.
 * @author      Milex
 *
 * @see        http://milex.org
 *
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Tests\Api\Auth;

use Milex\Auth\ApiAuth;
use Milex\Exception\RequiredParameterMissingException;
use Milex\MilexApi;
use Milex\Tests\Api\MilexApiTestCase;

class BasicAuthTest extends MilexApiTestCase
{
    protected $configFile = '';

    public function setUp(): void
    {
        $this->configFile = __DIR__.'/../../local.config.php';
    }

    /**
     * Verify that the error handling in setup method is working
     * - No Username.
     */
    public function testParameterExceptionErrorNoUserName()
    {
        $this->expectException(RequiredParameterMissingException::class);
        $this->expectExceptionCode(500);

        // This should throw an error becuse the userName is missing
        $apiAuth = new ApiAuth();
        $auth    = $apiAuth->newAuth(['password'=>'********'], 'BasicAuth');
    }

    /**
     * Verify that the error handling in setup method is working
     * - No Password.
     */
    public function testParameterExceptionErrorNoPassword()
    {
        $this->expectException(RequiredParameterMissingException::class);
        $this->expectExceptionCode(500);

        // This should throw an error becuse the password is missing
        $api  = new ApiAuth();
        $auth = $api->newAuth(['userName'=>'anyolduser'], 'BasicAuth');
    }

    /**
     * Verify that the error handling in setup method is working
     * - Empty Username.
     */
    public function testParameterExceptionErrorEmptyUserName()
    {
        $this->expectException(RequiredParameterMissingException::class);
        $this->expectExceptionCode(500);

        // This should throw an error becuse the userName is empty - test blanks
        $apiAuth = new ApiAuth();
        $auth    = $apiAuth->newAuth(['userName'=>' ', 'password'=>'********'], 'BasicAuth');
    }

    /**
     * Verify that the error handling in setup method is working
     * - Empty password.
     */
    public function testParameterExceptionErrorEmptyPassword()
    {
        $this->expectException(RequiredParameterMissingException::class);
        $this->expectExceptionCode(500);

        // This should throw an error because the password is empty - test blanks
        $apiAuth = new ApiAuth();
        $auth    = $apiAuth->newAuth(['userName'=>'admin', 'password'=>' '], 'BasicAuth');
    }

    /**
     * Ensure the Config has the correct settings.
     */
    public function testConfigReady()
    {
        $this->assertTrue(file_exists($this->configFile), 'Cannot find local.config.php!');

        // get local config
        $config = include $this->configFile;

        // userName & password - ! empty
        $toCheck = ['userName', 'password'];
        foreach ($toCheck as $toTest) {
            $this->assertTrue(isset($config[$toTest]), $toTest.' Check failed. Check '.$toTest.' in local.config.php.');
            $this->assertTrue(!empty($config[$toTest]), $toTest.' must contain a value. Check '.$toTest.' in local.config.php.');
        }
    }

    /**
     * @depends testConfigReady
     */
    public function testPublicInterface()
    {
        $config  = include $this->configFile;
        $apiAuth = new ApiAuth();
        $auth    = $apiAuth->newAuth($config, 'BasicAuth');

        $this->assertTrue($auth->isAuthorized(), 'Authorization failed. Check credentials in local.config.php.');
    }

    /**
     * @depends testConfigReady
     */
    public function testGetList()
    {
        $this->api = $this->getContext('contactFields');
        $this->standardTestGetList();
    }

    /**
     * Ignore this.
     */
    public function testSearchCommands()
    {
        $this->markTestSkipped('Inherited method but not applicable');
    }
}
