<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\ProductsDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Request, Response};
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Products\{storeRequest, updateRequest};
use App\Services\Seller\{
    Brands\BrandInterface,
    Categories\CategoryInterface,
    Products\ProductInterface,
    Shops\ShopInterface
};
use App\Utils\Enums\Status;
use Exception;

class ProductController extends Controller
{
    private BrandInterface $brandInterface;
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;
    private ShopInterface $shopInterface;

    public function __construct(BrandInterface $brandInterface, CategoryInterface $categoryInterface, ProductInterface $productInterface, ShopInterface $shopInterface)
    {
        $this->brandInterface = $brandInterface;
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->shopInterface = $shopInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProductsDataTable $dataTable
     * @return JsonResponse|View
     */
    public function index(ProductsDataTable $dataTable): JsonResponse|View
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.products.index');
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
            'brand' => $this->brandInterface->get(),
            'categories' => $this->categoryInterface->get(),
            'shops' => $this->shopInterface->get(auth('seller')->user()->id),
            // 'statuses' => Status::array(),
        ];

        dd($data);

        return view('seller.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeRequest $request
     * @return Response
     */
    public function store(storeRequest $request): Response
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $record = $this->productInterface->store($inputs);
            return redirect()->route('seller.products.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|
     */
    public function edit($id)
    {
        abort_if(request()->ajax(), 403);

        try {
            $product = $this->productInterface->find($id);

            if ($product && !empty($product)) {
                $data = [
                    'product' => $product,
                    'product_logo' => $product->getMedia('products'),
                    'statuses' => Status::array(),
                ];
                return view('seller.products.edit', $data);
            }

            return redirect()->route('seller.products.index')->withWarning('Record not found!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        abort_if(request()->ajax(), 403);
        try {
            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->productInterface->update($id, $inputs);
            return redirect()->route('seller.products.index')->withSuccess('Data updated!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        abort_if(request()->ajax(), 403);
        try {

            if ($request->has('checkForDelete')) {

                $record = $this->productInterface->destroy($request->checkForDelete);

                if (!$record) {
                    return redirect()->route('seller.products.index')->withDanger('Data not found!');
                }
            }
            return redirect()->route('seller.products.index')->withSuccess('Data deleted!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }
}
