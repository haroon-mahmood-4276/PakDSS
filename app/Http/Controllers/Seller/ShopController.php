<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\ShopsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Shops\{storeRequest, updateRequest};
use App\Models\{Seller, Shop};
use App\Services\Shops\ShopInterface;
use App\Utils\Enums\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{JsonResponse, Request};
use Exception;

class ShopController extends Controller
{
    private ShopInterface $shopInterface;

    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }

    public function index(ShopsDataTable $dataTable): JsonResponse|View
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.shops.index');
    }

    public function create()
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'statuses' => Status::array(),
        ];

        return view('seller.shops.create', $data);
    }

    public function store(storeRequest $request, Seller $seller)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $record = $this->shopInterface->store($seller, $inputs);

            return redirect()->route('seller.shops.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        }
    }

    public function show($id)
    {
        abort(403);
    }

    public function edit(Shop $shop)
    {
        abort_if(request()->ajax(), 403);

        try {
            $shop = $this->shopInterface->find($shop->id);

            if ($shop) {
                $data = [
                    'shop' => $shop,
                    'statuses' => Status::array(),
                    'shop_logo' => $shop->getMedia('shops'),
                ];

                return view('seller.shops.edit', $data);
            }

            return redirect()->route('seller.shops.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, Shop $shop)
    {
        abort_if(request()->ajax(), 403);
        try {
            $inputs = $request->validated();
            $inputs['status'] = Status::PENDING_APPROVAL;
            $record = $this->shopInterface->update([], $shop, $inputs);
            return redirect()->route('seller.shops.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->shopInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('seller.shops.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('seller.shops.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        }
    }
}
