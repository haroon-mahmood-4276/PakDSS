<?php

namespace App\Services\Seller\Products;

interface ProductInterface
{
    public function get($shop_id, $relationships = [], $ignore = null, $with_tree = false);

    public function find($shop_id, $id, $relationships = []);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
