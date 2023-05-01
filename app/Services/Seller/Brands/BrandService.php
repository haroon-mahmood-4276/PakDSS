<?php

namespace App\Services\Seller\Brands;

use App\Models\Brand;

class BrandService implements BrandInterface
{
    private function model()
    {
        return new Brand();
    }

    public function get($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false)
    {
        $brand = $this->model();
        if (is_array($ignore)) {
            $brand = $brand->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $brand = $brand->where('id', '!=', $ignore);
        }

        if (!$withCountOnly && count($relationships) > 0) {
            $brand = $brand->with($relationships);
        }

        if ($withCount) {
            $brand = $brand->withCount($relationships);
        }

        if ($withPagination) {
            $brand = $brand->paginate(20);
        } else {
            $brand = $brand->get();
        }

        return $brand;
    }

    public function find($id, $relationships = [])
    {
        $brand = $this->model();

        if (count($relationships) > 0) {
            $brand = $brand->with($relationships);
        }

        return $brand->find($id);
    }
}
