<?php

namespace App\Services\Sellers;

use App\Models\Seller;
use App\Utils\Traits\ServiceShared;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class SellerService implements SellerInterface
{
    use ServiceShared;

    private function model()
    {
        return new Seller();
    }

    /**
     * @throws Throwable
     */
    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'email' => $inputs['email'],
                'email_verified_at' => now()->timestamp,
                'password' => Hash::make($inputs['password']),
                'first_name' => $inputs['first_name'],
                'middle_name' => $inputs['middle_name'] ?? null,
                'last_name' => $inputs['last_name'],
                'cnic' => $inputs['cnic'],
                'ntn_number' => $inputs['ntn_number'],
                'phone_primary' => $inputs['phone_primary'],
                'phone_secondary' => $inputs['phone_secondary'],
                'status' => $inputs['status'],
                'reason' => $inputs['reason'],
            ];

            $seller = $this->model()->create($data);

            return $seller;
        });

        return $returnData;
    }

    public function update($id, $inputs)
    {
        $returnData = DB::transaction(function () use ($id, $inputs) {
            $data = [
                'first_name' => $inputs['first_name'],
                'middle_name' => $inputs['middle_name'] ?? null,
                'last_name' => $inputs['last_name'],
                'cnic' => $inputs['cnic'],
                'ntn_number' => $inputs['ntn_number'],
                'phone_primary' => $inputs['phone_primary'],
                'phone_secondary' => $inputs['phone_secondary'],
                'status' => $inputs['status'],
                'reason' => $inputs['reason'],
            ];

            if ($inputs['password']) {
                $data['password'] = Hash::make($inputs['password']);
            }

            $seller = $this->model()->find($id)->update($data);

            return $seller;
        });

        return $returnData;
    }

    public function destroy($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {

            $sellers = $this->model()->whereIn('id', $inputs)->get()->each(function ($seller) {
                $seller->delete();
            });

            return $sellers;
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
