<?php

namespace App\Services\User\Cart;

use App\Models\Cart;
use App\Services\Products\ProductInterface;
use Illuminate\Support\Facades\DB;

class CartService implements CartInterface
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    private function model()
    {
        return new Cart();
    }

    public function get($user_id, $relationships = [])
    {
        return $this->model()->when($relationships, function ($query, $relationships) {
            $query->with($relationships);
        })->get();
    }

    public function find($cart_id, $only = [], $relationships = [])
    {
        return $this->model()->when($relationships, function ($query, $relationships) {
            $query->with($relationships);
        })->when($only, function ($query, $only) {
            $query->select($only);
        })->find($cart_id);
    }

    public function store($user_id, $inputs)
    {
        return DB::transaction(function () use ($user_id, $inputs) {

            $product = $this->productInterface->find($inputs['referance'], only: ['price', 'discounted_price']);

            $data = [
                'user_id' => $user_id,
                'product_id' => $inputs['referance'],
                'quantity' => $inputs['product_quantity'],
                'price' => (floatval($product->discounted_price) > 0 ? floatval($product->discounted_price) : floatval($product->price)),
                'attributes' => $inputs['attributes'] ?? [],
            ];

            $data['total_price'] = floatval($data['price'] * $data['quantity']);

            return $this->model()->create($data);
        });
    }

    public function update($cart_id, $quantity)
    {
        return DB::transaction(function () use ($cart_id, $quantity) {

            $cart_item = $this->find($cart_id);
            $product = $this->productInterface->find($cart_item->product_id, only: ['price', 'discounted_price']);

            $data = [
                'quantity' => $quantity,
                'price' => (floatval($product->discounted_price) > 0 ? floatval($product->discounted_price) : floatval($product->price)),
            ];

            $data['total_price'] = floatval($data['price'] * $data['quantity']);

            return $cart_item->update($data);
            
        });
    }
}
