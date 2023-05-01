<?php

namespace App\Http\Requests\Seller\Products;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Product())->rules;
    }
}
