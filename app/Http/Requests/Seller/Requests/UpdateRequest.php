<?php

namespace App\Http\Requests\Seller\Requests;

use App\Models\Request;
use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

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
        $rules = (new Request())->rules;
        $rules['slug'] .= ',' . $this->id;

        return $rules;
    }
}
