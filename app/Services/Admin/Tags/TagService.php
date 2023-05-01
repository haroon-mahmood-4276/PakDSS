<?php

namespace App\Services\Admin\Tags;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagService implements TagInterface
{
    private function model()
    {
        return new Tag();
    }

    public function get($ignore = null, $with_tree = false)
    {
        $tags = $this->model();
        if (is_array($ignore)) {
            $tags = $tags->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $tags = $tags->where('id', '!=', $ignore);
        }
        $tags = $tags->get();
        if ($with_tree) {
            return getTreeData(collect($tags), $this->model());
        }
        return $tags;
    }

    public function find($id)
    {
        return $this->model()->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => Str::slug($inputs['name']) ,
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
