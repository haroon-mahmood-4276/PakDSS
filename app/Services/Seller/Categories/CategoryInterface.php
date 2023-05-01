<?php

namespace App\Services\Seller\Categories;

interface CategoryInterface
{
    public function get($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false);

    public function find($id, $relationships = []);
}
