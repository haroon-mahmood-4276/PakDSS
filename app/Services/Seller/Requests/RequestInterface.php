<?php

namespace App\Services\Seller\Requests;

interface RequestInterface
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false, $withPagination = false, $perPage = 10);

    public function find($id, $relationships = []);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
