<?php

namespace Tests\Feature;

use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ShopifyTest extends PlatformTest
{
    /**
     * Test the Shopify API 'index' call
     *
     * @return void
     */
    public function testIndex()
    {
        // get the correct id for Shopify from the database
        $id = Store::firstWhere('platform', 'shopify')->id;
        $response = $this->get("/stores/{$id}/products");

        $response->assertStatus(200);
        
        // make sure the call returns some data
        $json = json_decode($response->getContent());
        $this->assertGreaterThan(0, count($json), 'The call should return some data.');
    }

    /**
     * Test the Shopify API 'show' call
     */
    public function testShow()
    {
        // not bothering accessing the DB for Shopify id this time, as we're hardcoding the product id too. 
        $response = $this->get('/stores/1/products/632910392');

        $response->assertStatus(200);
        $response->assertJsonStructure($this->itemJsonStructure);
    }

    /**
     * Test the 'show' call for nonexistent product
     */
    public function testShowNotFound()
    {
        $response = $this->get('/stores/1/products/afdsk');

        $response->assertNotFound();
    }
}
