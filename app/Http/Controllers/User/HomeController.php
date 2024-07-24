<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoryInterface;
use App\Services\Products\ProductInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;


    public function __construct(CategoryInterface $categoryInterface, ProductInterface $productInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'categories_products' => $this->productInterface->getAllByParentCategory($this->categoryInterface->getParents(), ['brand', 'media', 'seller'], 6)
        ];

        $data['categories_products'] = collect($data['categories_products'])->map(function ($category) {
            return count($category) > 0 ? $category : null;
        })->filter();

        return view('user.home', $data);
    }
}
