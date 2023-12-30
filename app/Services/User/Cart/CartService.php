<?php

namespace App\Services\User\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartService implements CartInterface
{
    private function model()
    {
        return new Cart();
    }

    public function get($user_id, $relationships = [])
    {
        return $this->model()->get();
    }

    public function store($user_id, $inputs)
    {
        return DB::transaction(function () use ($user_id, $inputs) {
            return $this->model()->create([
                'user_id' => $user_id,
                'product_id' => $inputs['product_id'],
                'quantity' => $inputs['quantity'],
                'price' => $inputs['price'],
                'total_price' => $inputs['total_price'],
                'attributes' => $inputs['attributes'],
            ]);
        });
    }
}
