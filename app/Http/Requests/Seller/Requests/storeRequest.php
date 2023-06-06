<?php

namespace App\Http\Requests\Seller\Requests;

use App\Models\Request;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = (new Request())->rules;
        return $rules;
    }
}
