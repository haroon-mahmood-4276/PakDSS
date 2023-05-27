<?php

namespace App\Services\Seller\Products;

interface ProductInterface
{
    public function get($seller_id, $relationships = [], $ignore = null);

    public function find($id, $relationships = []);

    public function store($seller_id, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);

    public function status($ids, $status);
}
