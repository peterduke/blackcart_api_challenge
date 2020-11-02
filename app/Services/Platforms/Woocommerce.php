<?php

namespace App\Services\Platforms;

/**
 * This class should interface with the WooCommerce API, but it just pulls data
 * from a local JSON file
 */
class Woocommerce extends AbstractPlatform
{
    const PATH_TO_JSON = 'database/mock_data/woocommerce/products.json';
    
}