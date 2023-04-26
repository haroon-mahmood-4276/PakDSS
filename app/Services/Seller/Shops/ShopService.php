<?php

namespace App\Services\Seller\Shops;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ShopService implements ShopInterface
{
    private function model(): Shop
    {
        return new Shop();
    }

    public function getAll($ignore = null, $with_tree = false)
    {
        $shop = $this->model();
        if (is_array($ignore)) {
            $shop = $shop->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $shop = $shop->where('id', '!=', $ignore);
        }
        $shop = $shop->get();
        if ($with_tree) {
            return getTreeData(collect($shop), $this->model());
        }
        return $shop;
    }

    public function getById($id, $relationships = [])
    {
        $shop = $this->model();

        if(count($relationships) > 0) {
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
                'slug' => Str::slug($inputs['name']) ,
                'address' => $inputs['name'],
                'lat' => $inputs['latitude'],
                'long' => $inputs['longitude'],
                'status' => $inputs['status'],
                'reason' => $inputs['reason'],
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
                'slug' => Str::slug($inputs['name']) ,
                'address' => $inputs['name'],
                'lat' => $inputs['latitude'],
                'longitude' => $inputs['longitude'],
                'status' => $inputs['status'],
                'reason' => $inputs['reason'],
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
}
