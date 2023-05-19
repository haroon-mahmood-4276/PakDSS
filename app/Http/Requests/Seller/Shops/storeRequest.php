<?php

namespace App\Http\Requests\Seller\Shops;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = (new Shop())->rules;
        unset($rules['status']);
        return $rules;
    }
}
