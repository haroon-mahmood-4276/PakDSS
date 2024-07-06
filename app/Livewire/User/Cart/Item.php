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

    public function updated(CartInterface $cartInterface, $name, $value)
    {
        if ($name == 'isSelected') {
            $this->dispatchEvent($this->isSelected ? 'addOrUpdateItemFromCheckoutBag' : 'deleteItemFromCheckoutBag', $this->cartItem->toArray());
        }

        $this->totalPrice = $this->quantity * $this->unitPrice;
        $this->cartItem->quantity = $this->quantity;
        $this->cartItem->price = $this->unitPrice;
        $this->cartItem->total_price = $this->totalPrice;

        if ($name == 'quantity') {
            $cartInterface->update($this->cartItem->id, $this->quantity);
            if ($this->isSelected) {
                $this->dispatchEvent('addOrUpdateItemFromCheckoutBag', $this->cartItem->toArray());
            }
        }
    }

    public function deleteItemFromCart(CartInterface $cartInterface, $cart_id)
    {
        $cartInterface->destroy($cart_id);
        $this->dispatchEvent('deleteItemFromCart');
        if ($this->isSelected) {
            $this->dispatchEvent('deleteItemFromCheckoutBag', $this->cartItem->toArray());
        }
    }

    public function dispatchEvent(string $event, $data = [])
    {
        $this->dispatch($event . 'Event', $data);
    }

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
}

// $dispatch('refreshCart', { cartActiveItem: { cart_id: '{{ $cartItem->id }}', quantity: {{ $quantity }}, unit_price: {{ $unitPrice }}, total_price: {{ $totalPrice }}, isSelected: {{ $isSelected }} } })