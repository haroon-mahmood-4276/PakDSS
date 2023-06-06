<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\RequestsDataTable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Requests\storeRequest;
use App\Services\Seller\Requests\RequestInterface;
use App\Utils\Enums\Status;
use Illuminate\Http\Request;
use Exception;

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

    public function store(storeRequest $request, $requestFor)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $inputs['modelable'] = getModel($requestFor)::class;
            $record = $this->requestInterface->store($inputs);
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
        }
    }

    public function show($id)
    {
        abort(403);
    }

    // public function edit($id)
    // {
    //     abort_if(request()->ajax(), 403);

    //     try {
    //         $shop = $this->requestInterface->find(auth('seller')->user()->id, $id);

    //         if ($shop && !empty($shop)) {
    //             $data = [
    //                 'shop' => $shop,
    //                 'shop_logo' => $shop->getMedia('requests'),
    //             ];
    //             return view('seller.requests.edit', ['request' => $requestFor], $data);
    //         }

    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withWarning('Record not found!');
    //     } catch (GeneralException $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong! ' . $ex->getMessage());
    //     } catch (Exception $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
    //     }
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param int $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(updateRequest $request, $id)
    // {
    //     abort_if(request()->ajax(), 403);
    //     try {
    //         $id = decryptParams($id);
    //         $inputs = $request->validated();
    //         $record = $this->requestInterface->update($id, $inputs);
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data updated!');
    //     } catch (GeneralException $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong! ' . $ex->getMessage());
    //     } catch (Exception $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
    //     }
    // }

    // public function destroy(Request $request)
    // {
    //     abort_if(request()->ajax(), 403);
    //     try {

    //         if ($request->has('checkForDelete')) {

    //             $record = $this->requestInterface->destroy($request->checkForDelete);

    //             if (!$record) {
    //                 return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Data not found!');
    //             }
    //         }
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withSuccess('Data deleted!');
    //     } catch (GeneralException $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong! ' . $ex->getMessage());
    //     } catch (Exception $ex) {
    //         return redirect()->route('seller.requests.index', ['request' => $requestFor])->withDanger('Something went wrong!');
    //     }
    // }
}
