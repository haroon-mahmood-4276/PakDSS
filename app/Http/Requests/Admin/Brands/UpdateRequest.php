<?php

namespace App\Http\Requests\Admin\Brands;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = (new Brand())->rules;
        $rules['slug'] .= ','.$this->brand;

        return $rules;
    }
}
