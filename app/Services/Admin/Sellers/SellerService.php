<?php

namespace App\Services\Admin\Sellers;

use App\Models\Seller;
use Illuminate\Support\Facades\{DB, Hash};
use Illuminate\Support\Str;

class SellerService implements SellerInterface
{
    private function model()
    {
        return new Seller();
    }

    public function get($ignore = null, $with_tree = false)
    {
        $sellers = $this->model();
        if (is_array($ignore)) {
            $sellers = $sellers->whereNotIn('id', $ignore);
        } else if (is_string($ignore)) {
            $sellers = $sellers->where('id', '!=', $ignore);
        }
        $sellers = $sellers->get();
        if ($with_tree) {
            return getTreeData(collect($sellers), $this->model());
        }
        return $sellers;
    }

    public function find($id)
    {
        return $this->model()->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                "email" => $inputs['email'],
                "email_verified_at" => now()->timestamp,
                "password" => Hash::make($inputs['password']),
                "first_name" => $inputs['first_name'],
                "middle_name" => $inputs['middle_name'] ?? null,
                "last_name" => $inputs['last_name'],
                "cnic" => $inputs['cnic'],
                "ntn_number" => $inputs['ntn_number'],
                "phone_primary" => $inputs['phone_primary'],
                "phone_secondary" => $inputs['phone_secondary'],
                "status" => $inputs['status'],
                "reason" => $inputs['reason'],
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
                "first_name" => $inputs['first_name'],
                "middle_name" => $inputs['middle_name'] ?? null,
                "last_name" => $inputs['last_name'],
                "cnic" => $inputs['cnic'],
                "ntn_number" => $inputs['ntn_number'],
                "phone_primary" => $inputs['phone_primary'],
                "phone_secondary" => $inputs['phone_secondary'],
                "status" => $inputs['status'],
                "reason" => $inputs['reason'],
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
}
