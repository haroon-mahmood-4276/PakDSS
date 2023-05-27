<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\ProductsDataTable;
use App\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Products\{storeRequest, updateRequest};
use App\Services\Shared\{
    Brands\BrandInterface,
    Categories\CategoryInterface,
    Tags\TagInterface,
};
use App\Services\Seller\{
    Products\ProductInterface,
    Shops\ShopInterface,
};
use App\Utils\Enums\Status;
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
            'categories' => $this->categoryInterface->get(with_tree: true),
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
            dd($inputs);
            $inputs['meta_aurthor'] = auth('seller')->user()->first_name;
            $record = $this->productInterface->store(auth('seller')->user()->id, $inputs);
            return redirect()->route('seller.products.index')->withSuccess('Data saved!');
        } catch (GeneralException $ex) {
            return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
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
            // dd($product);

            if ($product && !empty($product)) {
                $data = [
                    'brands' => $this->brandInterface->get(),
                    'categories' => $this->categoryInterface->get(with_tree: true),
                    'shops' => $this->shopInterface->get(auth('seller')->user()->id),
                    'tags' => $this->tagInterface->get(),
                    'product' => $product,
                    'product_images' => $product->getMedia('products'),
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

    public function update(updateRequest $request, $id)
    {
        abort_if(request()->ajax(), 403);
        // try {
            $id = decryptParams($id);
            $inputs = $request->validated();
            $record = $this->productInterface->update($id, $inputs);
            return redirect()->route('seller.products.index')->withSuccess('Data updated!');
        // } catch (GeneralException $ex) {
        //     return redirect()->route('seller.products.index')->withDanger('Something went wrong! ' . $ex->getMessage());
        // } catch (Exception $ex) {
        //     return redirect()->route('seller.products.index')->withDanger('Something went wrong!');
        // }
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
