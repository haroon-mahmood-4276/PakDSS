<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SellersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sellers\StoreRequest;
use App\Http\Requests\Admin\Sellers\UpdateRequest;
use App\Models\Seller;
use App\Services\Sellers\SellerInterface;
use App\Utils\Enums\Status;
use Exception;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private $sellerInterface;

    public function __construct(SellerInterface $sellerInterface)
    {
        $this->sellerInterface = $sellerInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SellersDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.sellers.index');
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
            'statuses' => Status::array(true),
        ];

        return view('admin.sellers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $this->sellerInterface->store($inputs);

            return redirect()->route('admin.sellers.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger(__('lang.commons.something_went_wrong'));
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
            $seller = $this->sellerInterface->find($id);

            if ($seller && ! empty($seller)) {
                $data = [
                    'seller' => $seller,
                    'statuses' => Status::array(true),
                ];

                return view('admin.sellers.edit', $data);
            }

            return redirect()->route('admin.sellers.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $seller)
    {
        abort_if(request()->ajax(), 403);
        try {
            $inputs = $request->validated();
            $this->sellerInterface->update($seller, $inputs);

            return redirect()->route('admin.sellers.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->sellerInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.sellers.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.sellers.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
