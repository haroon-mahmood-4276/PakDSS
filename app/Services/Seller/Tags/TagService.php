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

    public function getAll($ignore = null, $with_tree = false)
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

    public function getById($id)
    {
        return $this->model()->find($id);
    }

    /**
     * @throws \Throwable
     */
    public function store($inputs)
    {
        return DB::transaction(function () use ($inputs) {
            $data = [
                'name' => Str::slug($inputs['name']) ,
            ];

            $tag = $this->model()->create($data);
            return $tag;
        });
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

    /**
     * @throws \Throwable
     */
    public function destroy($inputs)
    {
        return DB::transaction(function () use ($inputs) {

            return $this->model()->whereIn('id', $inputs)->get()->each(function ($tag) {
                $tag->delete();
            });
        });
    }
}
