<?php

namespace App\Http\Requests\Admin\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Brand())->rules;
    }
}
