<?php

namespace App\Services\User\Products;

use App\Models\Product;
use App\Utils\Traits\ServiceShared;

class ProductService implements ProductInterface
{
    use ServiceShared;

    private function model(): Product
    {
        return new Product();
    }
}
