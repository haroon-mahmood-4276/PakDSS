<?php

namespace App\Utils\Traits;

trait ServiceShared
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false, $withPagination = false, $perPage = 10)
    {
        $model = $this->model();
        if (is_array($ignore)) {
            $model = $model->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $model = $model->where('id', '!=', $ignore);
        }
        if ($withCount) {
            $model = $model->withCount($relationships);
        }

        if ($withPagination) {
            $model = $model->paginate($perPage);
        } else {
            $model = $model->get();
        }

        if ($with_tree) {
            return getTreeData(collect($model), $this->model());
        }
        return $model;
    }

    public function find($id, $relationships = [])
    {
        $model = $this->model();

        if (count($relationships) > 0) {
            $model = $model->with($relationships);
        }

        return $model->find($id);
    }
}
