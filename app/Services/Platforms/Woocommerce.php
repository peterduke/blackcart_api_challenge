<?php

namespace App\Services\Platforms;

/**
 * This class should interface with the WooCommerce API, but it just pulls data
 * from a local JSON file
 */
class Woocommerce extends AbstractPlatform
{
    const PATH_TO_JSON = 'database/mock_data/woocommerce/products.json';
    
    public function index()
    {
        return $this->data;
    }

    public function show($productId)
    {
        foreach ($this->data as $item) {
            if ($item->id == $productId) {
                return $this->transformItem($item);
            }
            // item not found, 404 error
            abort(404);
        }
    }

    protected function transformItem($item)
    {
        $t = new \stdClass();
        $t->id = $item->id;
        $t->name = $item->name;
        $t->inventory_level = $item->stock_quantity;
        $t->in_stock = $item->stock_status == 'instock' ? true : false;

        $t->sizes = null;
        $t->colors = null;
        foreach($item->attributes as $a) {
            if ($a->name == 'Color') {
                $t->colors = $a->options;
            }
            else if ($a->name == 'Size') {
                $t->sizes = $a->options;
            }
        }
        $t->weight = $item->weight;
        return $t;
    }
}