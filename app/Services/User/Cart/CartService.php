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
        return $this->model()->get();
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
}
