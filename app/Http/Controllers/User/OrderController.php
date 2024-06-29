<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Addresses\AddressInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private AddressInterface $addressInterface;

    public function __construct(AddressInterface $addressInterface)
    {
        $this->addressInterface = $addressInterface;
    }
    
    public function selectShippingAddress(Request $request)
    {
        dd($request->input());
        $data = [
            'addresses' => $this->addressInterface->get()
        ];
        return view('user.order.shipping.addresses.index', $data);
    }
}