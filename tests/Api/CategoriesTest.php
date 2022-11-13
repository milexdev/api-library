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

class CategoriesTest extends MilexApiTestCase
{
    public function setUp(): void
    {
        $this->api         = $this->getContext('categories');
        $this->testPayload = [
            'title'  => 'test',
            'bundle' => 'asset',
        ];
    }

    public function testGetList()
    {
        $this->standardTestGetList();
    }

    public function testGetListOfSpecificIds()
    {
        $this->standardTestGetListOfSpecificIds();
    }

    public function testCreateGetAndDelete()
    {
        // Create category
        $response = $this->api->create($this->testPayload);
        $this->assertErrors($response);
        $this->assertPayload($response, $this->testPayload);
        $categoryId = $response[$this->api->itemName()]['id'];

        // GET category
        $response = $this->api->get($categoryId);
        $this->assertErrors($response);
        $this->assertPayload($response, $this->testPayload);

        // Add an asset to this category
        $assetApi     = $this->getContext('assets');
        $assetPayload = [
            'title'           => 'Milex Logo sent as a API request',
            'storageLocation' => 'remote',
            'file'            => 'https://www.milex.org/media/logos/logo/Milex_Logo_DB.pdf',
            'category'        => $categoryId,
        ];

        // Create Asset
        $assetResponse = $assetApi->create($assetPayload);
        $assetCategory = $assetResponse[$assetApi->itemName()]['category'];
        $this->assertEquals($categoryId, $assetCategory['id']);
        $this->assertErrors($assetPayload);

        // Delete asset
        $response = $assetApi->delete($assetResponse[$assetApi->itemName()]['id']);
        $this->assertErrors($response);

        // Delete category
        $response = $this->api->delete($categoryId);
        $this->assertErrors($response);

        // Expect an error when assigning a non existing category when creating a new asset
        $assetResponse = $assetApi->create($assetPayload);
        $this->assertStringContainsString("Category $categoryId does not exist", $assetResponse['errors'][0]['message']);
    }

    public function testEditPatch()
    {
        $editTo = [
            'title'  => 'test2',
            'bundle' => 'asset',
        ];
        $this->standardTestEditPatch($editTo);
    }

    public function testEditPut()
    {
        $this->standardTestEditPut();
    }

    public function testBatchEndpoints()
    {
        $this->standardTestBatchEndpoints();
    }
}
