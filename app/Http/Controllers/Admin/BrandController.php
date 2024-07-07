<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BrandsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\StoreRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;
use App\Services\Brands\BrandInterface;
use App\Services\Categories\CategoryInterface;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private CategoryInterface $categoryInterface;

    private BrandInterface $brandInterface;

    public function __construct(BrandInterface $brandInterface, CategoryInterface $categoryInterface)
    {
        $this->brandInterface = $brandInterface;
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandsDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.brands.index');
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
            'categories' => $this->categoryInterface->get(with_tree: true),
        ];

        return view('admin.brands.create', $data);
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
            $record = $this->brandInterface->store($inputs);

            return redirect()->route('admin.brands.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger('Something went wrong!');
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
            $brand = $this->brandInterface->find($id, ['categories:id']);

            if ($brand && ! empty($brand)) {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
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

                if (! $record) {
                    return redirect()->route('admin.brands.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.brands.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger('Something went wrong!');
        }
    }
}
