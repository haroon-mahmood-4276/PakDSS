<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ShopsDataTable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shops\{storeRequest, updateRequest};
use App\Models\Seller;
use App\Models\Shop;
use App\Services\Shared\Shops\ShopInterface;
use App\Utils\Enums\Status;
use Exception;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $shopInterface;

    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }

    public function index(Seller $seller, ShopsDataTable $dataTable)
    {
        $with = ['seller' => $seller];

        if (request()->ajax()) {
            return $dataTable->with($with)->ajax();
        }

        return $dataTable->with($with)->render('admin.sellers.shops.index', $with);
    }

    public function create(Seller $seller)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'seller' => $seller,
            'statuses' => Status::array(),
        ];

        return view('admin.sellers.shops.shops.create', $data);
    }

    public function store(storeRequest $request, Seller $seller)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $record = $this->shopInterface->store($seller->id, $inputs);
            return redirect()->route('admin.sellers.shops.index', $seller)->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong!');
        }
    }

    public function show($id)
    {
        abort(403);
    }

    public function edit(Seller $seller, Shop $shop)
    {
        abort_if(request()->ajax(), 403);

        try {
            $shop = $this->shopInterface->find($shop->id);

            if ($shop) {
                $data = [
                    'seller' => $seller,
                    'shop' => $shop,
                    'statuses' => Status::array(),
                    'shop_logo' => $shop->getMedia('shops'),
                ];

                return view('admin.sellers.shops.edit', $data);
            }

            return redirect()->route('admin.sellers.shops.index', $seller)->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, Seller $seller, Shop $shop)
    {
        abort_if(request()->ajax(), 403);
        try {
            $inputs = $request->validated();
            $record = $this->shopInterface->update($seller, $shop, $inputs);
            return redirect()->route('admin.sellers.shops.index', $seller)->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request, Seller $seller)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->shopInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.sellers.shops.index', $seller)->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.shops.index', $seller)->withDanger('Something went wrong!');
        }
    }
}
