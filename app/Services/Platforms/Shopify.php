<?php

namespace App\Services\Platforms;

/**
 * This class should interface with the Shopify API, but it just pulls data
 * from a local JSON file
 */
class Shopify extends AbstractPlatform
{
    const PATH_TO_JSON = 'database/mock_data/shopify/products.json';
    
}