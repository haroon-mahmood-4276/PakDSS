<?php

namespace App\Utils\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait ServiceShared
{
    public function get($relationships = [], $ignore = null, $with_tree = false, $withCount = false, $withPagination = false, $perPage = 10, $includeOnlyLast = false)
    {
        $model = $this->model();
        if (is_array($ignore)) {
            $model = $model->whereNotIn('id', $ignore);
        } elseif (is_string($ignore)) {
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
                return prepareLinkedTree(collectionData: collect($model), model: $this->model(), includeOnlyLast: $includeOnlyLast);
            }
            
            return $model;
        // return Cache::rememberForever(Str::of(explode('\\', $this->model()::class)[2])->lower()->plural()->value(), function () use ($model, $withPagination, $perPage, $with_tree, $includeOnlyLast) {
        // });
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
