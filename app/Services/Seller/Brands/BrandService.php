<?php

namespace App\Services\Seller\Brands;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandService implements BrandInterface
{
    private function model()
    {
        return new Brand();
    }

    public function getAll($relationships = [], $ignore = null, $withCount = false, $withCountOnly = false, $withPagination = false)
    {
        $brand = $this->model();
        if (is_array($ignore)) {
            $brand = $brand->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $brand = $brand->where('id', '!=', $ignore);
        }

        if (!$withCountOnly && count($relationships) > 0) {
            $brand = $brand->with($relationships);
        }

        if ($withCount) {
            $brand = $brand->withCount($relationships);
        }

        if ($withPagination) {
            $brand = $brand->paginate(20);
        } else {
            $brand = $brand->get();
        }

        return $brand;
    }

    public function getById($id, $relationships = [])
    {
        $brand = $this->model();

        if (count($relationships) > 0) {
            $brand = $brand->with($relationships);
        }

        return $brand->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
            ];

            $brand = $this->model()->create($data);

            $brand->categories()->sync($inputs['categories'] ?? []);

            if (isset($inputs['brand_image'])) {
                $attachment = $inputs['brand_image'];
                $brand->addMedia($attachment)->toMediaCollection('brands');
            }

            return $brand;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {

            $brand = $this->model()->find($id);

            $data = [
                'name' => $inputs['name'],
                'slug' => Str::slug($inputs['name']),
            ];

            $brand->update($data);

            $brand->categories()->sync($inputs['categories'] ?? []);

            $brand->clearMediaCollection('brands');

            if (isset($inputs['brand_image'])) {
                $attachment = $inputs['brand_image'];
                $brand->addMedia($attachment)->toMediaCollection('brands');
            }
            return $brand;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $brand = $this->model()->whereIn('id', $inputs)->get()->each(function ($brand) {
                $brand->clearMediaCollection('brands');
                $brand->delete();
            });

            return $brand;
        });

        return $returnData;
    }
}
