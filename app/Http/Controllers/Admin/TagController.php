<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TagsDataTable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\storeRequest;
use App\Http\Requests\Admin\Tags\updateRequest;
use App\Services\Shared\Tags\TagInterface;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagInterface;

    public function __construct(TagInterface $tagInterface)
    {
        $this->tagInterface = $tagInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagsDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(request()->ajax(), 403);

        return view('admin.tags.create');
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

        try {
            $inputs = $request->validated();
            $record = $this->tagInterface->store($inputs);

            return redirect()->route('admin.tags.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong!');
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
            $tag = $this->tagInterface->find($id);

            if ($tag && ! empty($tag)) {
                $data = [
                    'tag' => $tag,
                ];

                return view('admin.tags.edit', $data);
            }

            return redirect()->route('admin.tags.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong!');
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

            $record = $this->tagInterface->update($id, $inputs);

            return redirect()->route('admin.tags.index')->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->tagInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.tags.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.tags.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.tags.index')->withDanger('Something went wrong!');
        }
    }
}
