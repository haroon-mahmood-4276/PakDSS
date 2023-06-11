<?php

namespace App\Services\Seller\Shops;

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
        $shop = $this->model()->where('seller_id', $seller_id)->where('status', Status::ACTIVE);
        if (is_array($ignore)) {
            $shop = $shop->whereNotIn('id', $ignore);
        } elseif (is_string($ignore)) {
            $shop = $shop->where('id', '!=', $ignore);
        }
        if (count($relationships) > 0) {
            $shop = $shop->with($relationships);
        }
        $shop = $shop->get();

        return $shop;
    }

    public function find($seller_id, $id, $relationships = [])
    {
        $shop = $this->model()->where('seller_id', $seller_id);

        if (count($relationships) > 0) {
            $shop = $shop->with($relationships);
        }

        return $shop->find($id);
    }

    /**
     * @throws Throwable
     */
    public function store($inputs)
    {
        return DB::transaction(function () use ($inputs) {
            $data = [
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

                'status' => Status::PENDING_APPROVAL,
                'reason' => null,
            ];

            $shop = auth('seller')->user()->shops()->create($data);
            if (isset($inputs['shop_logo'])) {
                $attachment = $inputs['shop_logo'];
                $shop->addMedia($attachment)->toMediaCollection('shops');
            }

            return $shop;
        });
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $shop = $this->model()->find($id);

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

                'status' => Status::PENDING_APPROVAL,
            ];

            $shop->update($data);

            $shop->clearMediaCollection('shops');
            if (isset($inputs['shop_logo'])) {
                $attachment = $inputs['shop_logo'];
                $shop->addMedia($attachment)->toMediaCollection('shops');
            }

            return $shop;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $shops = $this->model()->whereIn('id', $inputs)->get()->each(function ($shop) {
                $shop->clearMediaCollection('shops');
                $shop->delete();
            });

            return $shops;
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
