<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\RequestsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Requests\{StoreRequest, UpdateRequest};
use App\Services\Requests\RequestInterface;
use Exception;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    private RequestInterface $requestInterface;

    public function __construct(RequestInterface $requestInterface)
    {
        $this->requestInterface = $requestInterface;
    }

    public function index(RequestsDataTable $dataTable, $requestFor)
    {
        $data = [
            'requestFor' => $requestFor,
            'modelable' => getModel($requestFor)::class,
        ];

        if (request()->ajax()) {
            return $dataTable->with($data)->ajax();
        }

        return $dataTable->with($data)->render('seller.requests.index', $data);
    }

    public function create(Request $request, $requestFor)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'requestFor' => $requestFor,
        ];

        return view('seller.requests.create', $data);
    }

    public function store(StoreRequest $request, $requestFor)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $inputs['modelable'] = getModel($requestFor)::class;
            $this->requestInterface->store($requestFor, $inputs);
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
        }
    }

    public function show(): void
    {
        abort(403);
    }

    public function edit(Request $request, $requestFor, $id)
    {
        abort_if(request()->ajax(), 403);

        try {
            $requestForData = $this->requestInterface->find($requestFor, $id);

            if ($requestForData) {
                $data = [
                    'requestForData' => $requestForData,
                    'images' => $requestForData->getMedia('requests-' . $requestFor),
                    'requestFor' => $requestFor,
                ];
                return view('seller.requests.edit', ['request' => $requestFor], $data);
            }

            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $requestFor, $id)
    {
        abort_if(request()->ajax(), 403);
        try {
            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->requestInterface->update($requestFor, $id, $inputs);
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request, $requestFor)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->requestInterface->destroy($requestFor, $request->checkForDelete);

                if (!$record) {
                    return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Data not found!');
                }
            }
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
        }
    }
}
