<?php

namespace App\Livewire\User\Cart;

use App\Services\Cart\CartInterface;
use Livewire\Component;

class Item extends Component
{
    // Prop
    public $cartItem;

    // States
    public int $isSelected;
    public int $quantity;
    public float $unitPrice;
    public float $totalPrice;


    public function mount()
    {
        $this->isSelected = 0;
        $this->quantity = $this->cartItem->quantity;
        $this->unitPrice = $this->cartItem->price;
        $this->totalPrice = $this->cartItem->total_price;
    }

    public function render()
    {
        return view('livewire.user.cart.item');
    }

    public function updated(CartInterface $cartInterface, $name, $value)
    {
        if ($name == 'quantity') {
            $cartInterface->update($this->cartItem->id, $this->quantity);
        }
    }

    public function calculate()
    {
        $this->totalPrice = $this->quantity * $this->unitPrice;
        if ($this->isSelected) {
            $this->dispatchRefreshCartEvent();
        }
    }

    public function deleteItemFromCart(CartInterface $cartInterface, $cart_id)
    {
        $cartInterface->destroy($cart_id);
        if ($this->isSelected) {
            $this->dispatchRefreshCartEvent();
        }
    }

    public function dispatchRefreshCartEvent()
    {
        $this->dispatch('refreshCart', [
            'cart_id' => $this->cartItem->id,
            'isSelected' => $this->isSelected,
            'quantity' => $this->quantity,
            'unitPrice' => $this->unitPrice,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}

// $dispatch('refreshCart', { cartActiveItem: { cart_id: '{{ $cartItem->id }}', quantity: {{ $quantity }}, unit_price: {{ $unitPrice }}, total_price: {{ $totalPrice }}, isSelected: {{ $isSelected }} } })