<?php

namespace App\Services\Tags;

use App\Models\Tag;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagService implements TagInterface
{
    use ServiceShared;

    private function model()
    {
        return new Tag();
    }

    public function store($inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs));
    }

    public function update($id, $inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs, $id));
    }

    public function destroy($inputs)
    {
        return DB::transaction(fn () => $this->model()->destroy($inputs));
    }

    private function createOrUpdate($inputs, $id = 0)
    {
        return $this->model()->updateOrCreate(
            ['id' => $id],
            ['name' => Str::slug($inputs['name'])]
        );
    }
}
