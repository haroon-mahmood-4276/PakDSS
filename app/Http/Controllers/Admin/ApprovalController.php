<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ApprovalsDataTable;
use App\Http\Controllers\Controller;
use App\Services\Sellers\SellerInterface;
use App\Services\Products\ProductInterface;
use App\Services\Brands\BrandInterface;
use App\Services\Categories\CategoryInterface;
use App\Services\Shops\ShopInterface;
use App\Services\Tags\TagInterface;
use App\Utils\Enums\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class ApprovalController extends Controller
{
    private ProductInterface $productInterface;

    private ShopInterface $shopInterface;

    private SellerInterface $sellerInterface;

    private BrandInterface $brandInterface;

    private CategoryInterface $categoryInterface;

    private TagInterface $tagInterface;

    public function __construct(BrandInterface $brandInterface, CategoryInterface $categoryInterface, TagInterface $tagInterface, ProductInterface $productInterface, ShopInterface $shopInterface, SellerInterface $sellerInterface)
    {
        $this->productInterface = $productInterface;
        $this->shopInterface = $shopInterface;
        $this->sellerInterface = $sellerInterface;
        $this->brandInterface = $brandInterface;
        $this->categoryInterface = $categoryInterface;
        $this->tagInterface = $tagInterface;
    }

    public function index(ApprovalsDataTable $dataTable)
    {
        $data = [
            'model' => match (request()->route()->getName()) {
                'admin.approvals.shops.index' => 'shops',
                'admin.approvals.products.index' => 'products',
                'admin.approvals.sellers.index' => 'sellers',
            },
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

            $interface = match ($request->for) {
                'shops' => $this->shopInterface,
                'products' => $this->productInterface,
                'sellers' => $this->sellerInterface,
            };

            $returnStatus = null;
            $interface->status(ids: $request->checkForDelete ?? $request->id, status: $request->status === 'approve' ? Status::ACTIVE : Status::OBJECTED);
            
            $returnStatus = match ($request->status) {
                'approve' => [
                    'status' => 'success',
                    'message' => Str::of($request->for)->ucfirst() . ' approved successfully',
                ],
                'object' => [
                    'status' => 'success',
                    'message' => Str::of($request->for)->ucfirst() . ' objected successfully',
                ],
                default => null,
            };

            return redirect()->route('admin.approvals.' . $request->for . '.index')->with($returnStatus['status'], $returnStatus['message'])->with('for', $request->for);
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    public function show($id)
    {
        $modalData = [
            'model' => match (request()->route()->getName()) {
                'admin.approvals.shops.show' => 'shops',
                'admin.approvals.products.show' => 'products',
                'admin.approvals.sellers.show' => 'sellers',
            },
            'id' => $id,
        ];


        switch ($modalData['model']) {
            case 'products':
                $product = $this->productInterface->find($id, ['categories', 'tags']);
                $modalData = array_merge($modalData, [
                    'brands' => $this->brandInterface->get(),
                    'categories' => $this->categoryInterface->get(with_tree: true),
                    'shops' => $this->shopInterface->get($product->seller_id),
                    'tags' => $this->tagInterface->get(),
                    'product' => $product ?: null,
                    'product_images' => $product?->getMedia('product_images'),
                    'product_pdf' => $product?->getMedia('product_pdf'),
                    'product_video' => $product?->getMedia('product_video'),
                ]);
                break;

            case 'shops':
                $shop = $this->shopInterface->find($id);
                $modalData = array_merge($modalData, [
                    'shop' => $shop,
                    'statuses' => Status::array(),
                    'shop_logo' => $shop->getMedia('shops'),
                ]);
                break;

            default:
                # code...
                break;
        }

        try {
            abort_if(!request()->ajax(), 403);

            $data = [
                'modalPlace' => 'modalPlace',
                'currentModal' => 'basicModal',
                'modal' => view('admin.approvals.modals.show', $modalData)->render(),
            ];

            return apiSuccessResponse($data);
        } catch (Exception $ex) {
            return apiErrorResponse(data: ['line_number' => $ex->getLine()], message: $ex->getMessage(), code: $ex->getCode() > 0 ? $ex->getCode() : 400);
        }
    }
}
