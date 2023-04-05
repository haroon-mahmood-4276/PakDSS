<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SellersDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sellers\{storeRequest, updateRequest};
use App\Services\Admin\Sellers\SellerInterface;
use App\Utils\Enums\SellerStatus;
use Exception;

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
            'statuses' => SellerStatus::array(),
        ];

        return view('admin.sellers.create', $data);
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
            $record = $this->sellerInterface->store($inputs);
            return redirect()->route('admin.sellers.index')->withSuccess('Data saved!');
        // } catch (GeneralException $ex) {
        //     return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        // } catch (Exception $ex) {
        //     return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
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

        try {
            $tag = $this->sellerInterface->getById($id);

            if ($tag && !empty($tag)) {
                $data = [
                    'tag' => $tag,
                ];

                return view('admin.sellers.edit', $data);
            }

            return redirect()->route('admin.sellers.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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

            $record = $this->sellerInterface->update($id, $inputs);

            return redirect()->route('admin.sellers.index')->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->sellerInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('admin.sellers.index')->withDanger('Data not found!');
                }
            }
            return redirect()->route('admin.sellers.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.sellers.index')->withDanger('Something went wrong!');
        }
    }
}
