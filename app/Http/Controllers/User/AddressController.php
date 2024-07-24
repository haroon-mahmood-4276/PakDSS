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

    public function index(Request $request)
    {
        abort_if($request->ajax(), 403);

        return view('user.addresses.index', [
            'addresses' => $this->addressInterface->get($request->user()->id),
        ]);
    }

    public function create(Request $request)
    {
        abort_if($request->ajax(), 403);

        return view('user.addresses.create');
    }

    public function store(StoreRequest $request)
    {
        abort_if($request->ajax(), 403);

        try {
            $inputs = $request->input();
            $this->addressInterface->store(auth('web')->id(), $inputs);

            return redirect()->route('user.addresses.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('user.addresses.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function edit(Request $request, $address)
    {
        abort_if($request->ajax(), 403);

        return view('user.addresses.edit', [
            'address' => $this->addressInterface->find($address, ['country', 'state', 'city']),
        ]);
    }

    public function update(UpdateRequest $request, $address)
    {
        abort_if($request->ajax(), 403);

        try {
            $inputs = $request->input();
            $this->addressInterface->update($address, $inputs);

            return redirect()->route('user.addresses.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('user.addresses.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function destroy(Request $request, $address)
    {
        abort_if($request->ajax(), 403);

        try {
            $this->addressInterface->destroy($address);

            return redirect()->route('user.addresses.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('user.addresses.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
