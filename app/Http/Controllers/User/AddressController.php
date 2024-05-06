<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Addresses\AddressInterface;
use Illuminate\Http\Request;
use App\Http\Requests\User\Addresses\{storeRequest, updateRequest};
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

    public function store(storeRequest $request)
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

    public function show($id)
    {
        abort(403);
    }

    public function edit($id)
    {
        abort_if(request()->ajax(), 403);

        try {
            $brand = $this->brandInterface->find($id, ['categories:id']);

            if ($brand && !empty($brand)) {
                $data = [
                    'brand' => $brand,
                    'brand_logo' => $brand->getMedia('brands'),
                    'categories' => $this->categoryInterface->get(with_tree: true),
                ];

                return view('admin.brands.edit', $data);
            }

            return redirect()->route('admin.brands.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger('Something went wrong!');
        }
    }

    public function update(updateRequest $request, $id)
    {
        abort_if(request()->ajax(), 403);
        try {

            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->brandInterface->update($id, $inputs);

            return redirect()->route('admin.brands.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->brandInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('admin.brands.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.brands.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger('Something went wrong!');
        }
    }
}
