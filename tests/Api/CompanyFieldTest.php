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

use Milex\Tests\Api;

class CompanyFieldTest extends ContactFieldsTest
{
    protected $prefix = 'Company ';

    public function setUp(): void
    {
        $this->api         = $this->getContext('companyFields');
        $this->testPayload = [
            'label' => $this->prefix.'API test field',
            'type'  => 'text',
        ];
    }

    protected function assertFieldPayloadList($response)
    {
        if (!empty($response[$this->api->listName()])) {
            foreach ($response[$this->api->listName()] as $item) {
                $this->assertSame('company', $item['object'], 'This field must be object of company '.print_r($item, true));
            }
        }
    }

    // Methods inherited from ContactFieldsTest

    // Except following, ignore them
    public function testBooleanField()
    {
        $this->markTestSkipped('Inherited method but not applicable');
    }

    public function testDefaultFieldValue()
    {
        $this->markTestSkipped('Inherited method but not applicable');
    }
}
