<?php

namespace App\Services\Addresses;

use App\Models\Address;
use Illuminate\Support\Facades\DB;

class AddressService implements AddressInterface
{

    private function model()
    {
        return new Address();
    }

    public function get($user_id, $relationships = [], $withPagination = false, $perPage = 10)
    {
        $model = $this->model()->where('user_id', $user_id);
        if ($withPagination) {
            $model = $model->paginate($perPage);
        } else {
            $model = $model->get();
        }

        return $model;
    }

    public function find($id, $relationships = [])
    {
        $model = $this->model();

        if (count($relationships) > 0) {
            $model = $model->with($relationships);
        }

        return $model->find($id);
    }

    public function store($user_id, $inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs, user_id: $user_id));
    }

    public function update($id, $inputs)
    {
        return DB::transaction(fn () => $this->createOrUpdate($inputs, id: $id));
    }

    private function createOrUpdate($inputs, $user_id = null, $id = 0)
    {
        $this->model()->where('default_delivery_address', true)->update([
            'default_delivery_address' => false
        ]);
        $this->model()->where('default_billing_address', true)->update([
            'default_billing_address' => false
        ]);

        $data = [
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
        ];

        if ($user_id) {
            $data['user_id'] = $user_id;
        }

        return $this->model()->updateOrCreate(['id' => $id], $data);
    }

    public function destroy($id)
    {
        return DB::transaction(fn () => $this->model()->find($id)->delete());
    }
}
