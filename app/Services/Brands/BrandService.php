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
        return DB::transaction(fn () => $this->createOrUpdate($inputs));
    }

    public function update($id, $inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs, $id));
    }

    public function destroy($inputs)
    {
        return DB::transaction(fn () => $this->model()->whereIn('id', $inputs)->get()->each(function ($brand) {
            $brand->clearMediaCollection('brands');
            $brand->delete();
        }));
    }

    private function createOrUpdate($inputs, $id = 0)
    {
        $brand = $this->model()->updateOrCreate(
            ['id' => $id],
            ['name' => $inputs['name'], 'slug' => Str::slug($inputs['name'])]
        );

        $brand->categories()->sync($inputs['categories'] ?? []);

        $brand->clearMediaCollection('brands');

        if (isset($inputs['brand_image'])) {
            $brand->addMedia($inputs['brand_image'])->toMediaCollection('brands');
        }

        return $brand;
    }
}
