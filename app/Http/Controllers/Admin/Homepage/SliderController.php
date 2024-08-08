<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\DataTables\Admin\Homepage\SlidersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Homepage\Sliders\{StoreRequest, UpdateRequest};
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
            $this->sliderInterface->store($inputs);

            return redirect()->route('admin.homepage.sliders.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.homepage.sliders.index')->withDanger(__('lang.commons.something_went_wrong'));
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
            $slider = $this->sliderInterface->find($id);

            if ($slider && !empty($slider)) {
                $data = [
                    'slider' => $slider,
                    'slider_logo' => $slider->getMedia('sliders'),
                ];

                return view('admin.homepage.sliders.edit', $data);
            }

            return redirect()->route('admin.homepage.sliders.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.homepage.sliders.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $slider)
    {
        abort_if(request()->ajax(), 403);
        try {

            $inputs = $request->validated();
            $this->sliderInterface->update($slider, $inputs);

            return redirect()->route('admin.homepage.sliders.index')->withSuccess('Data updated!');
        } catch (Exception $ex) {
            return redirect()->route('admin.homepage.sliders.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->sliderInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('admin.homepage.sliders.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.homepage.sliders.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.homepage.sliders.index')->withDanger(__('lang.commons.something_went_wrong'));
        }
    }
}
