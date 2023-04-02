<?php

namespace App\Http\Requests\Admin\Categories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Category())->rules;
    }
}
