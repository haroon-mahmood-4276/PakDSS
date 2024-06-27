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
    public $activeCartItems;

    public $cartTotal = 0;

    #[On('refreshCart')]
    public function refreshCartItems($cartActiveItem) {
        dd($cartActiveItem);
    }

    public function mount(CartInterface $cartInterface) {
        $this->cartItems = $cartInterface->get(auth()->id(), relationships: ['product', 'product.brand']);
    }

    public function render()
    {
        return view('livewire.user.cart.index');
    }
}
