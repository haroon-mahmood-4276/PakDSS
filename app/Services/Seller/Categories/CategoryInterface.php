<?php

namespace App\Services\Seller\Categories;

interface CategoryInterface
{
    public function getAll($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false);

    public function getById($id, $relationships = []);
}
