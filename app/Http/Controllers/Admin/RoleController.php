<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RolesDataTable;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\storeRequest;
use App\Http\Requests\Admin\Roles\updateRequest;
use App\Models\Role;
use App\Services\Admin\Roles\RoleInterface;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        $roles = (new Role())->inRandomOrder()->limit(5)->get();

        return $dataTable->render('admin.roles.index', ['roles' => $roles]);
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
            'roles' => $this->roleInterface->get(with_tree: true),
        ];

        return view('admin.roles.create', $data);
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
            $record = $this->roleInterface->store($inputs);

            return redirect()->route('admin.roles.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong!');
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
            $role = (new Role())->find(decryptParams($id));

            if ($role && ! empty($role)) {
                $data = [
                    'role' => $role,
                    'roles' => $this->roleInterface->get(with_tree: true),
                ];

                return view('admin.roles.edit', $data);
            }

            return redirect()->route('admin.roles.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong!');
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

            $record = $this->roleInterface->update($id, $inputs);

            return redirect()->route('admin.roles.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->roleInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.roles.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.roles.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong! '.$ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.roles.index')->withDanger('Something went wrong!');
        }
    }
}
