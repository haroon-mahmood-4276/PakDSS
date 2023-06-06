<?php

namespace App\Services\Seller\Requests;

use App\Models\Request;
use App\Utils\Enums\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequestService implements RequestInterface
{
    private function model(): Request
    {
        return new Request();
    }

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
            return prepareLinkedTree(collect($model), $this->model());
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

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
                'modelable' => $inputs['modelable'],
                'status' => Status::PENDING_APPROVAL
            ];

            $requestForModel = $this->model()->create($data);

            // if (isset($inputs['brand_image'])) {
            //     $attachment = $inputs['brand_image'];
            //     $requestForModel->addMedia($attachment)->toMediaCollection('brands');
            // }

            return $requestForModel;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {

            $requestForModel = $this->model()->find($id);

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
            ];

            $requestForModel->update($data);

            $requestForModel->categories()->sync($inputs['categories'] ?? []);

            $requestForModel->clearMediaCollection('brands');

            if (isset($inputs['brand_image'])) {
                $attachment = $inputs['brand_image'];
                $requestForModel->addMedia($attachment)->toMediaCollection('brands');
            }
            return $requestForModel;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $requestForModel = $this->model()->whereIn('id', $inputs)->get()->each(function ($requestForModel) {
                $requestForModel->clearMediaCollection('brands');
                $requestForModel->delete();
            });

            return $requestForModel;
        });

        return $returnData;
    }
}
