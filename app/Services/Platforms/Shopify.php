<?php

namespace App\Services\Platforms;

/**
 * This class should interface with the Shopify API, but it just pulls data
 * from a local JSON file
 */
class Shopify extends AbstractPlatform
{
    const PATH_TO_JSON = 'database/mock_data/shopify/products.json';
    
    public function index()
    {
        return $this->data;
    }

    public function show($productId)
    {
        foreach ($this->data->products as $item) {
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
        $t->name = $item->title;

        // these next values we extract from the 'variants'
        $t->inventory_level = 0;
        $t->weight = null;
        foreach($item->variants as $v) {
            $t->weight = $v->weight;
            $t->inventory_level += $v->inventory_quantity;
        }
        $t->in_stock = $t->inventory_level > 0  ? true : false;

        // sizes and colours are from the 'options'
        $t->sizes = [];
        $t->colors = [];
        foreach($item->options as $o) {
            if ($o->name == 'Size') {
                $t->sizes = $o->values;
            } else if ($o->name == 'Color') {
                $t->colors = $o->values;
            }
        }
        return $t;
    }
}