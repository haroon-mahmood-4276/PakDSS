<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Products\{storeRequest, updateRequest};
use App\Services\Products\ProductInterface;
use App\Services\{Shops\ShopInterface, Brands\BrandInterface, Categories\CategoryInterface, Tags\TagInterface};
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    private BrandInterface $brandInterface;

    private CategoryInterface $categoryInterface;

    private ProductInterface $productInterface;

    private ShopInterface $shopInterface;

    private TagInterface $tagInterface;

    public function __construct(BrandInterface $brandInterface, CategoryInterface $categoryInterface, ProductInterface $productInterface, ShopInterface $shopInterface, TagInterface $tagInterface)
    {
        $this->brandInterface = $brandInterface;
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->shopInterface = $shopInterface;
        $this->tagInterface = $tagInterface;
    }

    public function index(ProductsDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.products.index');
    }

    public function create()
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'brands' => $this->brandInterface->get(),
            'categories' => $this->categoryInterface->get(with_tree: true, includeOnlyLast: true),
            'shops' => $this->shopInterface->get(auth('seller')->user()->id),
            'tags' => $this->tagInterface->get(),
        ];

        return view('seller.products.create', $data);
    }

    public function store(storeRequest $request)
    {
        abort_if(request()->ajax(), 403);

        try {
            $inputs = $request->validated();
            $inputs['meta_author'] = auth('seller')->user()->first_name;

            $this->productInterface->store(auth('seller')->user()->id, $inputs);

            return redirect()->route('seller.products.index')->withSuccess('Data saved!');
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }

    public function show($id)
    {
        abort(403);
    }

    public function edit($id)
    {
        abort_if(request()->ajax(), 403);

        try {
            $product = $this->productInterface->find($id, ['categories', 'tags']);

            $data = [
                'brands' => $this->brandInterface->get(),
                'categories' => $this->categoryInterface->get(with_tree: true),
                'shops' => $this->shopInterface->get(auth('seller')->user()->id),
                'tags' => $this->tagInterface->get(),
                'product' => $product ?: null,
                'product_images' => $product?->getMedia('product_images'),
                'product_pdf' => $product?->getMedia('product_pdf'),
                'product_video' => $product?->getMedia('product_video'),
            ];

            return is_null($data['product']) ? redirect()->route('seller.products.index')->withWarning('Record not found!') : view('seller.products.edit', $data);
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }

    public function update(updateRequest $request, $id)
    {
        abort_if(request()->ajax(), 403);
        try {
            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->productInterface->update($id, $inputs);

            return redirect()->route('seller.products.index')->withSuccess('Data updated!');
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
        } catch (Exception $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        }
    }
}
