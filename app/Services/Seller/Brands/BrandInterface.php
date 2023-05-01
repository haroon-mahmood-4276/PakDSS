<?php

namespace App\Services\Seller\Brands;

interface BrandInterface
{
    public function get($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false);

    public function find($id, $relationships = []);
}
