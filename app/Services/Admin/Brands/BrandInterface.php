<?php

namespace App\Services\Admin\Brands;

interface BrandInterface
{
    public function getAll($ignore = null, $with_tree = false);

    public function getById($id, $relationships = []);

    public function store($inputs);

    public function update($id, $inputs);

    public function destroy($inputs);
}
