<?php

namespace App\Http\Requests\Admin\Sellers;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Seller())->rules;
    }
}
