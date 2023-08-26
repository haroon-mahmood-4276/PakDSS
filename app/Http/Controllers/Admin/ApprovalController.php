<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ApprovalsDataTable;
use App\Http\Controllers\Controller;
use App\Services\Admin\Sellers\SellerInterface;
use App\Services\Seller\Products\ProductInterface;
use App\Services\Shared\Shops\ShopInterface;
use App\Utils\Enums\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApprovalController extends Controller
{
    private $productInterface;

    private $shopInterface;

    private $sellerInterface;

    public function __construct(ProductInterface $productInterface, ShopInterface $shopInterface, SellerInterface $sellerInterface)
    {
        $this->productInterface = $productInterface;
        $this->shopInterface = $shopInterface;
        $this->sellerInterface = $sellerInterface;
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

    public function sellerIndex(ApprovalsDataTable $dataTable)
    {

        $data = [
            'model' => 'sellers',
        ];

        if (request()->ajax()) {
            return $dataTable->with($data)->ajax();
        }

        return $dataTable->with($data)->render('admin.approvals.index', $data);
    }

    public function store(Request $request)
    {
        try {

            $interface = null;

            switch ($request->for) {
                case 'shops':
                    $interface = $this->shopInterface;
                    break;

                case 'products':
                    $interface = $this->productInterface;
                    break;

                case 'sellers':
                    $interface = $this->sellerInterface;
                    break;
            }

            switch ($request->status) {
                case 'approve':
                    $interface->status(ids: $request->checkForDelete ?? $request->id, status: Status::ACTIVE);

                    return redirect()->back()->with('success', Str::of($request->for)->ucfirst().' approved successfully');
                    break;

                case 'object':
                    $interface->status(ids: $request->checkForDelete ?? $request->id, status: Status::OBJECTED);

                    return redirect()->back()->with('success', Str::of($request->for)->ucfirst().' objected successfully');
                    break;
            }
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

    }
}
