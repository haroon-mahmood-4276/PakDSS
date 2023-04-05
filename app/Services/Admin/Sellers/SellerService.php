<?php

namespace App\Services\Admin\Sellers;

use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SellerService implements SellerInterface
{
    private function model()
    {
        return new Seller();
    }

    public function getAll($ignore = null, $with_tree = false)
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

    public function getById($id)
    {
        return $this->model()->find($id);
    }

    public function store($inputs)
    {
        $returnData = DB::transaction(function () use ($inputs) {
            $data = [
                'name' => Str::slug($inputs['name']) ,
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
                'name' => Str::slug($inputs['name']),
            ];

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
