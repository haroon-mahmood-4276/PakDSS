<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\{StoreRequest, UpdateRequest};
use App\Services\Brands\BrandInterface;
use App\Services\Categories\CategoryInterface;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $brandInterface;

    private $categoryInterface;

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
    public function index(CategoriesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.categories.index');
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
            'brands' => $this->brandInterface->get(),
            'categories' => $this->categoryInterface->get(with_tree: true),
        ];

        return view('admin.categories.create', $data);
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
            $record = $this->categoryInterface->store($inputs);

            return redirect()->route('admin.categories.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->withDanger(__('lang.commons.something_went_wrong'));
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
            $category = $this->categoryInterface->find($id, ['brands:id']);

            if ($category && !empty($category)) {
                $data = [
                    'brands' => $this->brandInterface->get(),
                    'category' => $category,
                    'categories' => $this->categoryInterface->get(with_tree: true),
                ];

                return view('admin.categories.edit', $data);
            }

            return redirect()->route('admin.categories.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->withDanger(__('lang.commons.something_went_wrong'));
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
            $inputs = $request->validated();
            $this->categoryInterface->update($id, $inputs);

            return redirect()->route('admin.categories.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->categoryInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('admin.categories.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.categories.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
