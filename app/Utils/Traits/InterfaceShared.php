<?php

namespace App\Utils\Traits;

interface InterfaceShared
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false, $withPagination = false, $perPage = 10, $includeOnlyLast = false);

    public function find($id, $relationships = []);
}
