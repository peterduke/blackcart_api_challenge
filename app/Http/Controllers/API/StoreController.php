<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    const PLATFORM_NAMESPACE = '\App\Services\Platforms';

    /**
     * Service object to interface with platform specific API
     * @var App\Services\Platforms\AbstractPlatform
     */
    protected $platform;

    /**
     * Initialize $platform service object
     * 
     * Can't do this in the constructor as we don't have access to the Store model there.
     * 
     * @throws Error if the class for the service object doesn't exist
     */
    protected function init(Store $store)
    {
        $platformClass = self::PLATFORM_NAMESPACE . '\\' . ucfirst($store->platform);
        $this->platform = new $platformClass();
    }

    /**
     * List of products
     */
    public function index(Request $request, Store $store)
    {
        $this->init($store);
        return response()->json($this->platform->index());
    }

    /**
     * Particular product
     */
    public function show(Request $request, Store $store, $productId)
    {
        $this->init($store);
        return response()->json($this->platform->show($productId));
    }
}
