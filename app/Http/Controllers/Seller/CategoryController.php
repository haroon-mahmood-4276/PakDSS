<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\Seller\CategoriesDataTable;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(CategoriesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax();
        }

        return $dataTable->render('seller.categories.index');
    }
}
