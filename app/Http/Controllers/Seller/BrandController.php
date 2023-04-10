<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Services\Seller\Brands\BrandInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brandInterface;

    public function __construct(BrandInterface $brandInterface)
    {
        $this->brandInterface = $brandInterface;
    }

    public function index(Request $request)
    {
        abort_if(request()->ajax(), 403);

        $data = [
            'brands' => $this->brandInterface->getAll(relationships: ['categories'], withCount: true, withCountOnly: true, withPagination: true),
        ];

        return view('seller.brands.index', $data);
    }
}
