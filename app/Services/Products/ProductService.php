<?php

namespace App\Services\Products;

use App\Models\Category;
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

    public function get($status = '', $relationships = [], $ignore = null)
    {

        return $this->model()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($relationships, function ($query, $relationships) {
                return $query->with($relationships);
            })->get();




        // $product = $this->model()->where('seller_id', $seller_id);
        // if (is_array($ignore)) {
        //     $product = $product->whereNotIn('id', $ignore);
        // } elseif (is_string($ignore)) {
        //     $product = $product->where('id', '!=', $ignore);
        // }
        // if (count($relationships) > 0) {
        //     $product = $product->with($relationships);
        // }
        // $product = $product->get();

        // return $product;
    }

    public function getAllByParentCategory($categories, $relationships = [], $chunk_size = 0)
    {
        $products = [];

        foreach ($categories as $key => $category) {
            $products[$category->slug] = $this->model()->whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', collect(getLinkedTreeData(new Category(), [$category->id]))->pluck('id')->toArray());
            })->when($relationships, fn ($query, $relationships) => $query->with($relationships))->where('status', Status::ACTIVE)->get();

            if ($chunk_size > 0) {
                $products[$category->slug] = $products[$category->slug]->chunk($chunk_size);
            }
        }

        return $products;
    }

    public function find($id, $only = [], $relationships = [])
    {
        return $this->model()
            ->when($only, function($query, $only) {
                $query->select($only);
            })
            ->when($relationships, function($query, $relationships) {
                $query->select($relationships);
            })->find($id);
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
                'discounted_price' => floatval($inputs['discounted_price']),

                'call_for_final_rates' => $inputs['call_for_final_rates'],
                'are_rates_printed_on_package' => $inputs['are_rates_printed_on_package'],

                'length' => $inputs['length'],
                'width' => $inputs['width'],
                'height' => $inputs['height'],

                'weight' => $inputs['weight'],

                'short_description' => encode_html_entities(filter_script_tags($inputs['short_description'])),
                'long_description' => encode_html_entities(filter_script_tags($inputs['long_description'])),

                'meta_author' => $inputs['meta_author'],
                'meta_keywords' => $inputs['meta_keywords'],
                'meta_description' => $inputs['meta_description'],

                'status' => Status::PENDING_APPROVAL,
                'reason' => null,
            ];

            $product = $this->model()->create($data);
            $product->categories()->sync($inputs['categories'] ?? []);
            $product->tags()->sync($inputs['tags'] ?? []);

            if (isset($inputs['product_images'])) {
                foreach ($inputs['product_images'] as $key => $image) {
                    $product->addMedia($image)->usingFileName($image->hashName())->toMediaCollection('product_images');
                }
            }

            if (isset($inputs['product_pdf'])) {
                $product->addMedia($inputs['product_pdf'])->usingFileName($inputs['product_pdf']->hashName())->toMediaCollection('product_pdf');
            }

            if (isset($inputs['product_video'])) {
                $product->addMedia($inputs['product_video'])->usingFileName($inputs['product_video']->hashName())->toMediaCollection('product_video');
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
                'discounted_price' => floatval($inputs['discounted_price']),

                'call_for_final_rates' => $inputs['call_for_final_rates'],
                'are_rates_printed_on_package' => $inputs['are_rates_printed_on_package'],

                'length' => $inputs['length'],
                'width' => $inputs['width'],
                'height' => $inputs['height'],

                'weight' => $inputs['weight'],

                'short_description' => encode_html_entities(filter_script_tags($inputs['short_description'])),
                'long_description' => encode_html_entities(filter_script_tags($inputs['long_description'])),

                'meta_keywords' => $inputs['meta_keywords'],
                'meta_description' => $inputs['meta_description'],

                'status' => Status::PENDING_APPROVAL,
            ];
            $product->update($data);

            $product->categories()->sync($inputs['categories'] ?? []);
            $product->tags()->sync($inputs['tags'] ?? []);

            $product->clearMediaCollection('product_images');
            if (isset($inputs['product_images'])) {
                foreach ($inputs['product_images'] as $key => $image) {
                    $product->addMedia($image)->usingFileName($image->hashName())->toMediaCollection('product_images');
                }
            }

            $product->clearMediaCollection('product_pdf');
            if (isset($inputs['product_pdf'])) {
                $product->addMedia($inputs['product_pdf'])->usingFileName($inputs['product_pdf']->hashName())->toMediaCollection('product_pdf');
            }

            $product->clearMediaCollection('product_video');
            if (isset($inputs['product_video'])) {
                $product->addMedia($inputs['product_video'])->usingFileName($inputs['product_video']->hashName())->toMediaCollection('product_video');
            }

            return $product;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $products = $this->model()->whereIn('id', $inputs)->get()->each(function ($product) {
                $product->clearMediaCollection('product_images');
                $product->clearMediaCollection('product_video');
                $product->clearMediaCollection('product_pdf');
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

    public function getRandomProducts($quantity = 5)
    {
        return $this->model()->inRandomOrder()->limit($quantity)->get();
    }
}
