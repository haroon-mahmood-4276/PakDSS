<?php

namespace App\Services\Seller\Requests;

use App\Models\Request;
use App\Utils\Enums\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class RequestService implements RequestInterface
{
    private function model(): Request
    {
        return new Request();
    }

    /**
     * @throws Throwable
     */
    public function store($requestFor, $inputs)
    {
        return DB::transaction(function () use ($requestFor, $inputs) {

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
                'modelable' => $inputs['modelable'],
                'status' => Status::PENDING_APPROVAL
            ];

            $requestForModel = $this->model()->create($data);

            if (isset($inputs['image'])) {
                $requestForModel->addMedia( $inputs['image'])->toMediaCollection('requests-' . $requestFor);
            }

            return $requestForModel;
        });
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
