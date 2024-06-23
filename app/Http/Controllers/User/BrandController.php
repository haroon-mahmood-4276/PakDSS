<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Brand};
use App\Services\Brands\BrandInterface;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private BrandInterface $brandInterface;

    public function __construct(BrandInterface $brandInterface)
    {
        $this->brandInterface = $brandInterface;
    }

    public function index(Request $request, Brand $brand)
    {
        abort_if(request()->ajax(), 403);

        dd($brand);
    }
}
