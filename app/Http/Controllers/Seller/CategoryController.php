<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Services\Seller\Categories\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index(CategoriesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.categories.index');
    }

    // public function index(Request $request)
    // {
    //     abort_if(request()->ajax(), 403);

    //     $data = [
    //         'categories' => $this->categoryInterface->getAll(relationships: ['brands'], withCount: true, withCountOnly: true, withPagination: true),
    //     ];

    //     return view('seller.categories.index', $data);
    // }
}
