<?php

namespace App\Services\Platforms;

/**
 * Abstract base class to fix the platform interface.
 */
abstract class AbstractPlatform
{
    protected $data;
    
    /**
     * load the API data from the  JSON file
     */
    public function __construct()
    {
        $this->data = json_decode(file_get_contents(base_path(static::PATH_TO_JSON)));
    }

    abstract public function index();

    abstract public function show($productId);
}