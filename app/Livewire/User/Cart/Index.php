<?php

namespace App\Livewire\User\Cart;

use App\Services\Cart\CartInterface;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    // Props
    public $cartItems;

    // States
    public $checkoutBag = [];
    public float $checkoutBagTotal = 0;
    public float $deliveryCharges = 0;

    // Listeners
    protected $listeners = [
        'deleteItemFromCartEvent' => '$refresh'
    ];
    
    #[On('addOrUpdateItemFromCheckoutBagEvent')]
    public function addOrUpdateItemFromCheckoutBagEventHandler($cartItem)
    {
        $this->deleteItemFromCheckoutBagEventHandler($cartItem);
        $this->checkoutBag[] = $cartItem;
        $this->checkoutBagTotal = count($this->checkoutBag) > 0 ? collect($this->checkoutBag)->sum(fn ($item) => $item['total_price']) : 0;
    }
    
    #[On('deleteItemFromCheckoutBagEvent')]
    public function deleteItemFromCheckoutBagEventHandler($cartItem)
    {
        $this->checkoutBag = collect($this->checkoutBag)->filter(fn ($item) => $item['id'] !== $cartItem['id']);
        $this->checkoutBagTotal = count($this->checkoutBag) > 0 ? collect($this->checkoutBag)->sum(fn ($item) => $item['total_price']) : 0;
    }

    public function mount(CartInterface $cartInterface)
    {
        $this->cartItems = $cartInterface->get(auth()->id(), relationships: ['product', 'product.brand']);
    }

    public function render()
    {
        return view('livewire.user.cart.index');
    }
}
