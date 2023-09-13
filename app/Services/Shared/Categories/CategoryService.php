<?php

namespace App\Services\Shared\Categories;

use App\Models\Category;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryService implements CategoryInterface
{
    use ServiceShared;

    private function model()
    {
        return new Category();
    }

    public function getParents()
    {
        return $this->model()->whereNull('parent_id')->get();
    }

    public function getAll()
    {

    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
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
                'slug' => Str::slug($inputs['name']),
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
