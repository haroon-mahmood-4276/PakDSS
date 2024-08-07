<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\DataTables\Admin\Homepage\SlidersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\{StoreRequest, UpdateRequest};
use App\Services\Homepage\Sliders\SliderInterface;
use Illuminate\Http\Request;
use Exception;

class SliderController extends Controller
{
    private SliderInterface $sliderInterface;

    public function __construct(SliderInterface $sliderInterface)
    {
        $this->sliderInterface = $sliderInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SlidersDataTable $dataTable, Request $request)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.homepage.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_if($request->ajax(), 403);

        return view('admin.homepage.sliders.create');
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
            return redirect()->route('admin.brands.index')->withDanger(__('lang.commons.something_went_wrong'));
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

            if ($brand && !empty($brand)) {
                $data = [
                    'brand' => $brand,
                    'brand_logo' => $brand->getMedia('brands'),
                    'categories' => $this->categoryInterface->get(with_tree: true),
                ];

                return view('admin.brands.edit', $data);
            }

            return redirect()->route('admin.brands.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $brand)
    {
        abort_if(request()->ajax(), 403);
        try {

            $inputs = $request->validated();
            $this->brandInterface->update($brand, $inputs);

            return redirect()->route('admin.brands.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->brandInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('admin.brands.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.brands.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.brands.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
