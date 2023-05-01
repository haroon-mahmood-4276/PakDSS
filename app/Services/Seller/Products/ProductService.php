<?php

namespace App\Services\Seller\Products;

use App\Models\Product;
use App\Utils\Enums\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ProductService implements ProductInterface
{
    private function model(): Product
    {
        return new Product();
    }

    public function get($ignore = null, $with_tree = false)
    {
        $product = $this->model();
        if (is_array($ignore)) {
            $product = $product->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $product = $product->where('id', '!=', $ignore);
        }
        $product = $product->get();
        if ($with_tree) {
            return getTreeData(collect($product), $this->model());
        }
        return $product;
    }

    public function find($id, $relationships = [])
    {
        $product = $this->model();

        if(count($relationships) > 0) {
            $product = $product->with($relationships);
        }

        return $product->find($id);
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
                'status' => Status::PENDING_APPROVAL,
                'reason' => $inputs['reason'],
            ];

            $product = auth('seller')->user()->products()->create($data);
            if (isset($inputs['product_logo'])) {
                $attachment = $inputs['product_logo'];
                $product->addMedia($attachment)->toMediaCollection('products');
            }

            return $product;
        });
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $product = $this->model()->find($id);

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']) ,
                'address' => $inputs['name'],
                'lat' => $inputs['latitude'],
                'longitude' => $inputs['longitude'],
                'status' => Status::PENDING_APPROVAL,
                'reason' => $inputs['reason'],
            ];

            $product->update($data);

            $product->clearMediaCollection('products');
            if (isset($inputs['product_logo'])) {
                $attachment = $inputs['product_logo'];
                $product->addMedia($attachment)->toMediaCollection('products');
            }

            return $product;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $products = $this->model()->whereIn('id', $inputs)->get()->each(function ($product) {
                $product->clearMediaCollection('products');
                $product->delete();
            });

            return $products;
        });

        return $returnData;
    }
}
