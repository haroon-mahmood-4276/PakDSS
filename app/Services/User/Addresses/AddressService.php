<?php

namespace App\Services\User\Addresses;

use App\Models\Address;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AddressService implements AddressInterface
{
    use ServiceShared;

    private function model()
    {
        return new Address();
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

    public function countrySearch($search, $page = 0, $ignore_id = 0)
    {
        $model = $this->model()->search($search);

        if ($ignore_id > 0) {
            $model = $model->query(fn (QueryBuilder $query) => $query->whereNot('id', $ignore_id));
        }

        return $model->get();
    }
}
