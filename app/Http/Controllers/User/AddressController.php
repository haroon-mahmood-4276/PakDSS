<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Addresses\AddressInterface;
use Illuminate\Http\Request;
use App\Http\Requests\User\Addresses\{StoreRequest, UpdateRequest};
use Exception;

class AddressController extends Controller
{
    private AddressInterface $addressInterface;

    public function __construct(AddressInterface $addressInterface)
    {
        $this->addressInterface = $addressInterface;
    }

    public function index()
    {
        $data = [
            'addresses' => $this->addressInterface->get()
        ];
        return view('user.addresses.index', $data);
    }

    public function store(StoreRequest $request)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->input();
            $this->addressInterface->store(auth('web')->id(), $inputs);

            return redirect()->route('user.addresses.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('user.addresses.index')->withDanger('Something went wrong!');
        }
    }
}
