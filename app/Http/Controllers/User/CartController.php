<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Cart\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private CartInterface $cartInterface;

    public function __construct(CartInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $cart = $this->cartInterface->get(auth()->id());

        return view('user.cart.index', ['cart' => $cart]);
    }

    public function addToCart(Request $request)
    {
        abort_if(request()->ajax(), 403);
        $data = $request->input();
        $this->cartInterface->store(auth()->id(), $data);
    }
}
