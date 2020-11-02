<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Adds two records to the 'stores' table for Shopify and Woocommerce
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Store;
        $s1->id = 1;
        $s1->platform = 'shopify';
        $s1->save();

        $s2 = new Store;
        $s2->id = 2;
        $s2->platform = 'woocommerce';
        $s2->save();
    }
}
