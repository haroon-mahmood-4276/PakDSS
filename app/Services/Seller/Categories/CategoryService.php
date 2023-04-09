<?php

namespace App\Services\Seller\Categories;

use App\Models\Category;

class CategoryService implements CategoryInterface
{
    private function model()
    {
        return new Category();
    }

    public function getAll($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false)
    {
        $category = $this->model();

        if (is_array($ignore)) {
            $category = $category->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $category = $category->where('id', '!=', $ignore);
        }

        if (!$withCountOnly && count($relationships) > 0) {
            $category = $category->with($relationships);
        }

        if ($withCount) {
            $category = $category->withCount($relationships);
        }

        if ($withPagination) {
            $category = $category->paginate(30);
        } else {
            $category = $category->get();
        }

        return $category;
    }

    public function getById($id, $relationships = [])
    {
        $category = $this->model();

        if (count($relationships) > 0) {
            $category = $category->with($relationships);
        }

        return $category->find($id);
    }
}
