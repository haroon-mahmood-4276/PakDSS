<?php

namespace App\Http\Requests\Admin\Shops;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Shop())->rules;
    }
}
