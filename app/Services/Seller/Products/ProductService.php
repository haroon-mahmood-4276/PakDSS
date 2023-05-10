<?php

namespace App\Services\Seller\Products;

use App\Models\Product;
use App\Utils\Enums\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService implements ProductInterface
{
    private function model(): Product
    {
        return new Product();
    }

    public function get($seller_id, $relationships = [], $ignore = null, $with_tree = false)
    {
        $product = $this->model()->where('seller_id', $seller_id);
        if (is_array($ignore)) {
            $product = $product->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $product = $product->where('id', '!=', $ignore);
        }
        if (count($relationships) > 0) {
            $product = $product->with($relationships);
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

        if (count($relationships) > 0) {
            $product = $product->with($relationships);
        }

        return $product->find($id);
    }

    public function store($seller_id, $inputs)
    {
        return DB::transaction(function () use ($seller_id, $inputs) {
            $data = [
                'brand_id' => $inputs['brand'],
                'seller_id' => $seller_id,
                'shop_id' => $inputs['shop'],

                'name' => $inputs['name'],

                'permalink' => Str::of($inputs['name'])->slug(),
                'sku' => Str::of($inputs['sku'])->slug()->lower(),
                'price' => floatval($inputs['price']),

                'short_description' => encode_html_entities(filter_script_tags($inputs['short_description'])),
                'long_description' => encode_html_entities(filter_script_tags($inputs['long_description'])),

                'meta_aurthor' => $inputs['meta_aurthor'],
                'meta_keywords' => $inputs['meta_keywords'],
                'meta_description' => $inputs['meta_description'],

                'status' => Status::PENDING_APPROVAL,
                'reason' => null,
            ];

            $product = $this->model()->create($data);
            $product->categories()->sync($inputs['categories']);
            $product->tags()->sync($inputs['tags']);

            if (isset($inputs['product_images'])) {
                foreach ($inputs['product_images'] as $key => $image) {
                    $product->addMedia($image)->toMediaCollection('products');
                }
            }

            return $product;
        });
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $product = $this->model()->find($id);

            $data = [
                'brand_id' => $inputs['brand'],
                'shop_id' => $inputs['shop'],

                'name' => $inputs['name'],

                'permalink' => Str::of($inputs['name'])->slug(),
                'sku' => Str::of($inputs['sku'])->slug()->lower(),
                'price' => floatval($inputs['price']),

                'short_description' => encode_html_entities(filter_script_tags($inputs['short_description'])),
                'long_description' => encode_html_entities(filter_script_tags($inputs['long_description'])),

                'meta_keywords' => $inputs['meta_keywords'],
                'meta_description' => $inputs['meta_description'],

                'status' => Status::PENDING_APPROVAL,
            ];
            $product->update($data);

            $product->clearMediaCollection('products');
            $product->categories()->sync($inputs['categories']);
            $product->tags()->sync($inputs['tags']);

            if (isset($inputs['product_images'])) {
                foreach ($inputs['product_images'] as $key => $image) {
                    $product->addMedia($image)->toMediaCollection('products');
                }
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
                $product->categories()->detach();
                $product->tags()->detach();
                $product->delete();
            });

            return $products;
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
