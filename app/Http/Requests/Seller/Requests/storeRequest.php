<?php

namespace App\Http\Requests\Seller\Requests;

use App\Models\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class storeRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

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
