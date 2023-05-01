<?php

namespace App\Services\Seller\Products;

interface ProductInterface
{
    public function get($seller_id, $relationships = [], $ignore = null, $with_tree = false);

    public function find($seller_id, $id, $relationships = []);

    public function store($seller_id, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
