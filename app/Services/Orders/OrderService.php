<?php

namespace App\Services\Orders;

use App\Models\{Cart, User, Order, OrderItem};
use App\Utils\Enums\{OrderStatuses, PaymentStatuses};
use Illuminate\Support\Facades\DB;

class OrderService implements OrderInterface
{
    private function model()
    {
        return new Order();
    }

    public function getLatestOrderNumber()
    {
        return $this->model()->max('order_number');
    }

    public function store(User $user, $inputs)
    {
        DB::transaction(function () use ($user, $inputs) {
            $order = $this->model()->create([
                'order_number' => $this->getLatestOrderNumber() + 1,
                'user_id' => $user->id,
                'shipping_address_id' => $inputs['shpping_address'],
                'billing_address_id' => $inputs['shpping_address'],
                'order_status' => OrderStatuses::PENDING->value,
                'payment_method' => null,
                'payment_status' => PaymentStatuses::PENDING->value,
            ]);

            foreach ($inputs['bag'] as $orderItem) {
                $order->items()->save(new OrderItem([
                    'order_id' => $order->id,
                    'product_id' => $orderItem['id'],
                    'quantity' => intval($orderItem['quantity']),
                    'price' => floatval($orderItem['price']),
                    'total_price' => floatval(intval($orderItem['quantity']) * floatval($orderItem['price'])),
                    'attributes' => $orderItem['attributes'],
                ]));
                // TODO: Remove following code and add event here to remove item from cart
                Cart::where([
                    'user_id' => $user->id,
                    'product_id' => $orderItem['id']
                ])->delete();
            }
        });
    }
}
