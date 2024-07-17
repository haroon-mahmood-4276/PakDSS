<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Product};
use App\Services\Products\ProductInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index(Request $request, Product $product)
    {
        abort_if(request()->ajax(), 403);

        $product->load(['brand', 'media', 'tags']);

        return view('user.products.index', ['product' => $product]);

    }
}
