<?php

namespace App\Livewire\User\Cart;

use App\Services\Cart\CartInterface;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    // Props
    public $cartItems;

    // States
    public $cartTotal = 0;

    protected $listeners = [
        'deleteItemFromCartEvent' => '$refresh'
    ];

    // #[On('refreshCartListEvent')]
    // public function refreshCartListHandler($cartActiveItem) {
    //     dd($cartActiveItem);
    // }

    public function mount(CartInterface $cartInterface) {
        $this->cartItems = $cartInterface->get(auth()->id(), relationships: ['product', 'product.brand']);
    }

    public function render()
    {
        return view('livewire.user.cart.index');
    }
}
