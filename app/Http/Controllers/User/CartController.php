<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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

        $cartItems = $this->cartInterface->get(auth()->id(), relationships: ['product', 'product.brand']);
        return view('user.cart.index', ['cartItems' => $cartItems]);
    }

    public function store(Request $request)
    {
        abort_if(request()->ajax(), 403);
        $data = $request->input();
        $this->cartInterface->store(auth()->id(), $data);

        return redirect()->back();
    }
    
    public function delete(Cart $cart)
    {
        abort_if(request()->ajax(), 403);
        $cart->delete();
        return redirect()->route('user.cart.index');
    }
}
