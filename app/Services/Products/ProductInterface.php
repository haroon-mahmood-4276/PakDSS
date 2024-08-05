<?php

namespace App\Services\Products;

interface ProductInterface
{
    public function get($status = '', $relationships = [], $ignore = []);
    public function getAllByParentCategory($categories, $relationships = [], $chunk_size = 0);

    public function find($id, $only = [], $relationships = []);

    public function store($seller_id, $inputs);

    public function update($id, $inputs);

    public function destroy($inputs);

    public function status($ids, $status);

    public function getRandomProducts($quantity = 5);
}
