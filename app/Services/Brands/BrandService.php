<?php

namespace App\Services\Brands;

use App\Models\Brand;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandService implements BrandInterface
{
    use ServiceShared;

    private function model()
    {
        return new Brand();
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
