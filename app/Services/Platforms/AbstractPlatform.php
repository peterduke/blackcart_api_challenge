<?php

namespace App\Services\Platforms;

/**
 * Abstract base class to fix the platform signature
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

    public function index()
    {
        return $this->data;
    }

    abstract public function show($productId);
}