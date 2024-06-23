<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\{storeRequest, updateRequest};
use App\Services\{Roles\RoleInterface, Users\UserInterface};
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    private $userInterface;

    private $roleInterface;

    public function __construct(UserInterface $userInterface, RoleInterface $roleInterface)
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('admin.users.index');
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
            'roles' => $this->roleInterface->get(),
        ];

        return view('admin.users.create', $data);
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
            $record = $this->userInterface->store($inputs);

            return redirect()->route('admin.users.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong!');
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
            $user = $this->userInterface->find(decryptParams($id));

            if ($user && ! empty($user)) {
                $data = [
                    'user' => $user,
                    'roles' => $this->roleInterface->get(),
                ];

                return view('admin.users.edit', $data);
            }

            return redirect()->route('admin.users.index')->withWarning('Record not found!');
        } catch (Exception $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong!');
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
            $record = $this->userInterface->update($id, $inputs);

            return redirect()->route('admin.users.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->userInterface->destroy($request->checkForDelete);

                if (! $record) {
                    return redirect()->route('admin.users.index')->withDanger('Data not found!');
                }
            }

            return redirect()->route('admin.users.index')->withSuccess('Data deleted!');
        } catch (Exception $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong!');
        }
    }
}
