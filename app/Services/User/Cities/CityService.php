<?php

namespace App\Services\User\Cities;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;

class CityService implements CityInterface
{
    private function model()
    {
        return new City();
    }

    public function search($search = null, $per_page = 10, $state_id = null, $ignore_id = null)
    {
        return $this->model()->where('state_id', $state_id)
            ->when($search, fn (QueryBuilder $query, $search) => $query->where('slug', 'LIKE', '%' . Str::slug($search) . '%'))
            ->when($ignore_id, fn (QueryBuilder $query, $ignore_id) => $query->whereNot('id', $ignore_id))
            ->simplePaginate($per_page);
    }
}
