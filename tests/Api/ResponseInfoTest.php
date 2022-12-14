<?php
/**
 * @copyright   2014 Milex, NP. All rights reserved.
 * @author      Milex
 *
 * @see        http://milex.org
 *
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Tests\Api;

class ResponseInfoTest extends MilexApiTestCase
{
    public function setUp(): void
    {
        $this->api = $this->getContext('contacts');
        $response  = $this->api->getList('', 0, 1);
        $this->assertErrors($response);
    }

    public function testGetVersion()
    {
        $version = $this->api->getMilexVersion();
        $this->assertMatchesRegularExpression("/^(\d+\.)?(\d+\.)?(.+|\d+)$/", $version);
    }

    public function testResponseInfo()
    {
        $info = $this->api->getResponseInfo();
        $this->assertEquals($info['content_type'], 'application/json');
    }

    public function testResponseHeaders()
    {
        $headers = $this->api->getResponseHeaders();
        $this->assertEquals($headers[0], 'HTTP/1.1 200 OK');
    }
}
