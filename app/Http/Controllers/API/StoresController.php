<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function show(Store $store)
    {
        return $store->platform;
    }
}
