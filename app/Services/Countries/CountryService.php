<?php

namespace App\Services\Countries;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;

class CountryService implements CountryInterface
{
    private function model()
    {
        return new Country();
    }

    public function search($search = null, $per_page = 10, $ignore_id = null)
    {
        return $this->model()
            ->select('*', 'name as text')
            ->when($search, fn (QueryBuilder $query, $search) => $query->where('slug', 'LIKE', '%' . Str::slug($search) . '%'))
            ->when($ignore_id, fn (QueryBuilder $query, $ignore_id) => $query->whereNot('id', $ignore_id))
            ->orderBy('name')
            ->simplePaginate($per_page);
    }
}
