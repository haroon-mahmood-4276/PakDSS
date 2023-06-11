<?php

namespace App\Services\Shared\Tags;

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
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => Str::slug($inputs['name']),
            ];

            $tag = $this->model()->create($data);

            return $tag;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $data = [
                'name' => Str::slug($inputs['name']),
            ];

            $tag = $this->model()->find($id)->update($data);

            return $tag;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $tags = $this->model()->whereIn('id', $inputs)->get()->each(function ($tag) {
                $tag->delete();
            });

            return $tags;
        });

        return $returnData;
    }
}
