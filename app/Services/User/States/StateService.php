<?php

namespace App\Services\User\States;

use App\Models\State;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;

class StateService implements StateInterface
{
    private function model()
    {
        return new State();
    }

    public function search($search = null, $per_page = 10, $country_id = null, $ignore_id = null)
    {
        return $this->model()->where('country_id', $country_id)
            ->when($search, fn (QueryBuilder $query, $search) => $query->where('slug', 'LIKE', '%' . Str::slug($search) . '%'))
            ->when($ignore_id, fn (QueryBuilder $query, $ignore_id) => $query->whereNot('id', $ignore_id))
            ->simplePaginate($per_page);
    }
}
