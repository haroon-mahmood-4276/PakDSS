<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Shared\{
    Brands\BrandInterface,
    Categories\CategoryInterface,
    Tags\TagInterface,
};
use App\Services\User\Products\ProductInterface;

class HomeController extends Controller
{
    private BrandInterface $brandInterface;
    private CategoryInterface $categoryInterface;
    private ProductInterface $productInterface;
    private TagInterface $tagInterface;

    public function __construct(BrandInterface $brandInterface, CategoryInterface $categoryInterface, ProductInterface $productInterface, TagInterface $tagInterface)
    {
        $this->brandInterface = $brandInterface;
        $this->categoryInterface = $categoryInterface;
        $this->productInterface = $productInterface;
        $this->tagInterface = $tagInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'brands' => $this->brandInterface->get(),
            'categories' => $this->categoryInterface->get(with_tree: true),
            'tags' => $this->tagInterface->get(),
            'products' => $this->productInterface->get(),
        ];

        return view('user.home', $data);
    }
}
