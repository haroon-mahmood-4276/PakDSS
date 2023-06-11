<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PermissionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permissions\storeRequest;
use App\Http\Requests\Admin\Permissions\updateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\Admin\Permissions\PermissionInterface;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionInterface;

    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionsDataTable $dataTable)
    {
        return $dataTable->render('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
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
            $record = $this->permissionInterface->store($inputs);

            return redirect()->route('admin.permissions.index')->withSuccess(__('lang.commons.data_saved'));
        } catch (Exception $ex) {
            return redirect()->route('admin.permissions.index')->withDanger(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
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
        try {
            $permission = (new Permission())->find(decryptParams($id));

            if ($permission && ! empty($permission)) {
                return view('permissions.edit', ['permission' => $permission]);
            }

            return redirect()->route('admin.permissions.index')->withWarning(__('lang.commons.data_not_found'));
        } catch (Exception $ex) {
            return redirect()->route('admin.permissions.index')->withDanger(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
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
            $inputs = $request->validated();
            $record = $this->permissionInterface->update($inputs, $id);

            return redirect()->route('admin.permissions.index')->withSuccess(__('lang.commons.data_updated'));
        } catch (Exception $ex) {
            return redirect()->route('admin.permissions.index')->withDanger(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
        }
    }

    public function destroySelected(Request $request)
    {
        try {
            if ($request->has('chkPermission')) {
                $ids = $request->get('chkPermission');
                $this->permissionInterface->destroySelected($ids);

                return redirect()->route('admin.permissions.index')->withSuccess(__('lang.commons.data_deleted'));
            } else {
                return redirect()->route('admin.permissions.index')->withWarning(__('lang.commons.please_select_at_least_one_item'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.permissions.index')->withDanger(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
        }
    }

    public function assignPermissionToRole(Request $request)
    {
        try {
            $permission = Permission::find($request->permission_id)->assignRole(Role::find($request->role_id));

            return response()->json([
                'success' => true,
                'message' => 'Permission Assigned Sucessfully',
            ], 200);
        } catch (Exception $ex) {
            return response()->json(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
        }
    }

    public function revokePermissionToRole(Request $request)
    {
        try {
            $permission = Permission::find($request->permission_id)->removeRole(Role::find($request->role_id));

            return response()->json([
                'success' => true,
                'message' => 'Permission Revoked Sucessfully',
            ], 200);
        } catch (Exception $ex) {
            return response()->json(__('lang.commons.something_went_wrong').' '.$ex->getMessage());
        }
    }

    // public function refreshPermissions(Request $request)
    // {
    //     Artisan::call('db:seed', ['--class' => 'DemoPermissionsPermissionsTableSeeder']);
    //     redirect()->back();
    // }

    // public function roleHasPermission(Request $request)
    // {
    //     $input = Request::all();
    //     //dd($input);
    //     $result = $this->permissionRepository->roleHasPermission($input);
    //     return json_encode($result);
    // }
}
