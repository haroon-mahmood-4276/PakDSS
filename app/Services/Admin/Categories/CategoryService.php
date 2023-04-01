<?php

namespace App\Services\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService implements CategoryInterface
{
    private function model()
    {
        return new Category();
    }

    public function getAll($ignore = null, $with_tree = false)
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

    public function getById($id)
    {
        return $this->model()->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => $inputs['name'],
                'guard_name' => $inputs['guard_name'],
                'parent_id' => $inputs['parent_id'],
            ];

            $role = $this->model()->create($data);
            return $role;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $data = [
                'name' => $inputs['name'],
                'guard_name' => $inputs['guard_name'],
                'parent_id' => $inputs['parent_id'],
            ];

            $role = $this->model()->find($id)->update($data);
            return $role;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $roles = $this->model()->whereIn('id', $inputs)->get()->each(function ($role) {
                $role->delete();
            });

            return $roles;
        });

        return $returnData;
    }
}
