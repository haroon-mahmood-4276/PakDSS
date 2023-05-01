<?php

namespace App\Services\Shared\Brands;

interface BrandInterface
{
    public function get($ignore = null, $with_tree = false);

    public function find($id, $relationships = []);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
