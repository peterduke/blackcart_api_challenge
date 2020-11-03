<?php

namespace Tests\Feature;

use Tests\TestCase;

abstract class PlatformTest extends TestCase
{
    protected $itemJsonStructure = ['id', 'name', 'inventory_level', 'in_stock', 'sizes', 'colors', 'weight', 'prices'];
}