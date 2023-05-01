<?php

namespace App\Services\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryService implements CategoryInterface
{
    private function model()
    {
        return new Category();
    }

    public function get($ignore = null, $with_tree = false)
    {
        $categories = $this->model();
        if (is_array($ignore)) {
            $categories = $categories->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $categories = $categories->where('id', '!=', $ignore);
        }
        $categories = $categories->get();
        if ($with_tree) {
            return getTreeData(collect($categories), $this->model());
        }
        return $categories;
    }

    public function find($id, $relationships = [])
    {
        $brand = $this->model();

        if(count($relationships) > 0) {
            $brand = $brand->with($relationships);
        }

        return $brand->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']) ,
                'parent_id' => $inputs['parent_category'],
            ];

            $category = $this->model()->create($data);

            $category->brands()->sync($inputs['brands'] ?? []);

            return $category;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $category = $this->model()->find($id);

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']) ,
                'parent_id' => $inputs['parent_category'],
            ];

            $category->update($data);

            $category->brands()->sync($inputs['brands'] ?? []);

            return $category;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $categorys = $this->model()->whereIn('id', $inputs)->get()->each(function ($category) {
                $category->delete();
            });

            return $categorys;
        });

        return $returnData;
    }
}
