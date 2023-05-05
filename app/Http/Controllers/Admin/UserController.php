<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UsersDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\{storeRequest, updateRequest};
use App\Models\Role;
use App\Services\Admin\Users\UserInterface;
use Exception;

class UserController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
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
            'users' => $this->userInterface->get(with_tree: true),
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
        } catch (GeneralException $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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
            $role = (new Role())->find(decryptParams($id));

            if ($role && !empty($role)) {
                $data = [
                    'role' => $role,
                    'users' => $this->userInterface->get(with_tree: true),
                ];

                return view('admin.users.edit', $data);
            }

            return redirect()->route('admin.users.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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
        } catch (GeneralException $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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

                if (!$record) {
                    return redirect()->route('admin.users.index')->withDanger('Data not found!');
                }
            }
            return redirect()->route('admin.users.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('admin.users.index')->withDanger('Something went wrong!');
        }
    }
}
