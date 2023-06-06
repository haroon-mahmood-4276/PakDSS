<?php

namespace App\Services\Seller\Requests;

use App\Models\Shop;

class RequestService implements RequestInterface
{
    private function model(): Shop
    {
        return new Shop();
    }


}
