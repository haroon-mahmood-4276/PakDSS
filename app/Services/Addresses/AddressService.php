<?php

namespace App\Services\Addresses;

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

    public function store($user_id, $inputs)
    {
        return DB::transaction(function () use ($user_id, $inputs) {
            return $this->model()->create([
                'user_id' => $user_id,
                'address_type' => $inputs['address_type'],
                'country_id' => $inputs['country'],
                'state_id' => $inputs['state'],
                'city_id' => $inputs['city'],
                'first_name' => $inputs['first_name'],
                'last_name' => $inputs['last_name'],
                'address_1' => $inputs['address_1'],
                'address_2' => $inputs['address_2'],
                'mobile_no' => $inputs['mobile_no'],
                'nearest_landmark' => $inputs['nearest_landmark'],
                'zip_code' => $inputs['zip_code'],
                'default_delivery_address' => $inputs['default_delivery_address'],
                'default_billing_address' => $inputs['default_billing_address'],
            ]);
        });
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
