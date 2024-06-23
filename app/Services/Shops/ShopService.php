<?php

namespace App\Services\Shops;

use App\Models\Shop;
use App\Utils\Enums\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ShopService implements ShopInterface
{
    private function model(): Shop
    {
        return new Shop();
    }

    public function get($seller_id, $ignore = null, $relationships = [])
    {
        $model = $this->model()->where('seller_id', $seller_id)->where('status', Status::ACTIVE);
        if (is_array($ignore)) {
            $model = $model->whereNotIn('id', $ignore);
        } elseif (is_string($ignore)) {
            $model = $model->where('id', '!=', $ignore);
        }
        if (count($relationships) > 0) {
            $model = $model->with($relationships);
        }
        $model = $model->get();

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

    /**
     * @throws Throwable
     */
    public function store($seller, $inputs)
    {
        return DB::transaction(function () use ($seller, $inputs) {
            $data = [

                'seller_id' => $seller,

                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),

                'email' => $inputs['email'],

                'phone_1' => $inputs['phone_1'],
                'phone_2' => $inputs['phone_2'],

                'address' => $inputs['address'],
                'pickup_address' => $inputs['pickup_address'],
                'description' => $inputs['description'],

                'lat' => $inputs['latitude'],
                'long' => $inputs['longitude'],

                'manager_name' => $inputs['manager_name'],
                'manager_mobile' => $inputs['manager_mobile'],
                'manager_email' => $inputs['manager_email'],

                'status' => $inputs['status'],

                'reason' => null,
            ];

            $model = $this->model()->create($data);

            if (isset($inputs['shop_logo'])) {
                $attachment = $inputs['shop_logo'];
                $model->addMedia($attachment)->toMediaCollection('shops');
            }

            return $model;
        });
    }

    public function update($seller, $model, $inputs)
    {
        $returnData = DB::transaction(function () use ($seller, $model, $inputs) {

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),

                'phone_1' => $inputs['phone_1'],
                'phone_2' => $inputs['phone_2'],

                'address' => $inputs['address'],
                'pickup_address' => $inputs['pickup_address'],
                'description' => $inputs['description'],

                'lat' => $inputs['latitude'],
                'long' => $inputs['longitude'],

                'manager_name' => $inputs['manager_name'],
                'manager_mobile' => $inputs['manager_mobile'],
                'manager_email' => $inputs['manager_email'],

                'status' => $inputs['status'],
            ];

            $model->update($data);

            $model->clearMediaCollection('shops');
            if (isset($inputs['shop_logo'])) {
                $attachment = $inputs['shop_logo'];
                $model->addMedia($attachment)->toMediaCollection('shops');
            }

            return $model;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $models = $this->model()->whereIn('id', $inputs)->get()->each(function ($model) {
                $model->clearMediaCollection('shops');
                $model->delete();
            });

            return $models;
        });

        return $returnData;
    }

    public function status($ids, $status)
    {
        if (is_array($ids)) {
            foreach ($ids as $key => $id) {
                $this->changeStatus($id, $status);
            }
        } else {
            $this->changeStatus($ids, $status);
        }
    }

    private function changeStatus($id, $status)
    {
        return DB::transaction(function () use ($id, $status) {
            return $this->model()->find($id)->update([
                'status' => $status,
            ]);
        });
    }
}
