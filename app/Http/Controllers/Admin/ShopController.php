<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ShopsDataTable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shops\storeRequest;
use App\Http\Requests\Admin\Shops\updateRequest;
use App\Models\Seller;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller, ShopsDataTable $dataTable)
    {
        $with = ['seller' => $seller];

        if (request()->ajax()) {
            return $dataTable->with($with)->ajax();
        }

        return $dataTable->with($with)->render('admin.sellers.shops.index', $with);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Seller $seller)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'seller' => $seller,
            'statuses' => Status::array(),
        ];

        return view('admin.sellers.shops.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request, Seller $seller)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $record = $this->shopInterface->store($seller->id, $inputs);
            return redirect()->route('admin.sellers.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
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

        try {
            $seller = $this->shopInterface->find($id);

            if ($seller && ! empty($seller)) {
                $data = [
                    'seller' => $seller,
                    'statuses' => Status::array(),
                ];

                return view('admin.sellers.edit', $data);
            }

            return redirect()->route('admin.sellers.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
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

            return redirect()->route('admin.sellers.index')->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->shopInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.sellers.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.sellers.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
    }
}
