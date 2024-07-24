<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Addresses\AddressInterface;
use App\Services\Cart\CartInterface;
use App\Services\Orders\OrderInterface;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private AddressInterface $addressInterface;
    private CartInterface $cartInterface;
    private OrderInterface $orderInterface;

    public function __construct(AddressInterface $addressInterface, CartInterface $cartInterface, OrderInterface $orderInterface)
    {
        $this->addressInterface = $addressInterface;
        $this->cartInterface = $cartInterface;
        $this->orderInterface = $orderInterface;
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
            'addresses' => $this->addressInterface->get($request->user()->id)
        ];

        return view('user.order.shipping.addresses.index', $data);
    }

    public function placeOrder(Request $request)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->input();

            $this->orderInterface->store(auth()->user(), $inputs);
    
            return redirect()->route('user.home.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('user.home.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
