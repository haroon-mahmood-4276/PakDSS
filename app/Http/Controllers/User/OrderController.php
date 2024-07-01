<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Addresses\AddressInterface;
use App\Services\Cart\CartInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private AddressInterface $addressInterface;
    private CartInterface $cartInterface;

    public function __construct(AddressInterface $addressInterface, CartInterface $cartInterface)
    {
        $this->addressInterface = $addressInterface;
        $this->cartInterface = $cartInterface;
    }

    public function selectShippingAddress(Request $request)
    {
        if (!$request->has('bag')) {
            return redirect()->route('user.cart.index');
        }

        $checkoutBag = $this->cartInterface->model()->whereIn('id', $request->bag)->get();

        $data = [
            'checkoutBag' => $checkoutBag,
            'deliveryCharges' => 0,
            'checkoutBagTotal' => $checkoutBag->sum('total_price'),
            'addresses' => $this->addressInterface->get()
        ];

        return view('user.order.shipping.addresses.index', $data);
    }

    public function placeOrder(Request $request)
    {
        dd($request->all());
        return view('user.order.place');
    }
}
