<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\ShopsDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Shops\{storeRequest, updateRequest};
use App\Services\Seller\Shops\ShopInterface;
use App\Utils\Enums\Status;
use Exception;

class ShopController extends Controller
{
    private $shopInterface;

    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShopsDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.shops.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'statuses' => Status::array(),
        ];

        return view('seller.shops.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        abort_if(request()->ajax(), 403);

        // try {
            $inputs = $request->validated();
            $record = $this->shopInterface->store($inputs);
            return redirect()->route('seller.shops.index')->withSuccess('Data saved!');
        // } catch (GeneralException $ex) {
        //     return redirect()->route('seller.shops.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        // } catch (Exception $ex) {
        //     return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(request()->ajax(), 403);

        // try {
            $shop = $this->shopInterface->getById($id);

            if ($shop && !empty($shop)) {
                $data = [
                    'shop' => $shop,
                    'shop_logo' => $shop->getMedia('shops'),
                    'statuses' => Status::array(),
                ];

                return view('seller.shops.edit', $data);
            }

            return redirect()->route('seller.shops.index')->withWarning('Record not found!');
        // } catch (GeneralException $ex) {
        //     return redirect()->route('seller.shops.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        // } catch (Exception $ex) {
        //     return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        abort_if(request()->ajax(), 403);
        try {
            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->shopInterface->update($id, $inputs);
            return redirect()->route('seller.shops.index')->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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

                if (!$record) {
                    return redirect()->route('seller.shops.index')->withDanger('Data not found!');
                }
            }
            return redirect()->route('seller.shops.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.shops.index')->withDanger('Something went wrong!');
        }
    }
}
