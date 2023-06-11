<?php

namespace App\Http\Requests\Admin\Sellers;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = (new Seller())->rules;

        return $rules;
    }
}
