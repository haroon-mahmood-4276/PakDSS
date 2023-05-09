<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ApprovalsDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\{
    Roles\RoleInterface,
    Users\UserInterface,
};
use App\Services\Seller\{
    Shops\ShopInterface,
};
use App\Utils\Enums\Status;
use Exception;

class ApprovalController extends Controller
{
    private $shopInterface;

    public function __construct(ShopInterface $shopInterface)
    {
        $this->shopInterface = $shopInterface;
    }

    public function ShopIndex(ApprovalsDataTable $dataTable)
    {

        $data = [
            'model' => 'shops',
        ];

        if (request()->ajax()) {
            return $dataTable->with($data)->ajax();
        }

        return $dataTable->with($data)->render('admin.approvals.index', $data);
    }

    public function ShopStore(Request $request)
    {
        try {
            switch ($request->status) {
                case 'approve':
                    $this->shopInterface->status($request->id, Status::ACTIVE);
                    return redirect()->back()->with('success', 'Shop approved successfully');
                    break;

                case 'object':
                    $this->shopInterface->status($request->id, Status::OBJECTED);
                    return redirect()->back()->with('success', 'Shop objected successfully');
                    break;
            }
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        return;
    }
}
