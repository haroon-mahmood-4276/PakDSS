<?php

namespace App\Services\Shared\Shops;

interface ShopInterface
{
    public function get($seller_id, $ignore = null, $with_tree = false);

    public function find($id, $relationships = []);

    public function store($seller, $inputs);

    public function update($seller, $shop, $inputs);

    public function destroy($inputs);

    public function status($ids, $status);
}
