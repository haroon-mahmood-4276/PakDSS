<?php

namespace App\Utils\Traits;

interface InterfaceShared
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false);

    public function find($id, $relationships = []);
}
