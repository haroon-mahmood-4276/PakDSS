<?php

namespace App\Services\Seller\Brands;

interface BrandInterface
{
    public function getAll($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false);

    public function getById($id, $relationships = []);
}
