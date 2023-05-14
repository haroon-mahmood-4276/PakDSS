<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Services\Shared\Brands\BrandInterface;
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
            'brands' => $this->brandInterface->get(relationships: ['categories'], withCount: true, withPagination: true, perPage: 12),
        ];

        return view('seller.brands.index', $data);
    }
}
