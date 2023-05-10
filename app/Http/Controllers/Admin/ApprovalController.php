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
    Products\ProductInterface,
    Shops\ShopInterface,
};
use App\Utils\Enums\Status;
use Exception;
use Illuminate\Support\Str;

class ApprovalController extends Controller
{
    private $productInterface, $shopInterface;

    public function __construct(ProductInterface $productInterface, ShopInterface $shopInterface)
    {
        $this->productInterface = $productInterface;
        $this->shopInterface = $shopInterface;
    }

    public function shopIndex(ApprovalsDataTable $dataTable)
    {

        $data = [
            'model' => 'shops',
        ];

        if (request()->ajax()) {
            return $dataTable->with($data)->ajax();
        }

        return $dataTable->with($data)->render('admin.approvals.index', $data);
    }

    public function productIndex(ApprovalsDataTable $dataTable)
    {

        $data = [
            'model' => 'products',
        ];

        if (request()->ajax()) {
            return $dataTable->with($data)->ajax();
        }

        return $dataTable->with($data)->render('admin.approvals.index', $data);
    }

    public function store(Request $request)
    {
        try {

            $inteface = null;

            switch ($request->for) {
                case 'shops':
                    $inteface = $this->shopInterface;
                    break;

                case 'products':
                    $inteface = $this->productInterface;
                    break;
            }

            switch ($request->status) {
                case 'approve':
                    $inteface->status(ids: $request->checkForDelete ?? $request->id, status: Status::ACTIVE);
                    return redirect()->back()->with('success', Str::of($request->for)->ucfirst() . ' approved successfully');
                    break;

                case 'object':
                    $inteface->status(ids: $request->checkForDelete ?? $request->id, status: Status::OBJECTED);
                    return redirect()->back()->with('success', Str::of($request->for)->ucfirst() . ' objected successfully');
                    break;
            }
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
        return;
    }
}
