<?php

namespace App\Http\Requests\Seller\Shops;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class updateRequest extends FormRequest
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
        $rules = (new Shop())->rules;

        $rules['slug'] .= ',' . $this->shop->id;
        $rules['email'] .= ',' . $this->shop->id;

        $rules['phone_1'] .= ',' . $this->shop->id;
        $rules['phone_2'] .= ',' . $this->shop->id;

        $rules['manager_mobile'] .= ',' . $this->shop->id;
        $rules['manager_email'] .= ',' . $this->shop->id;

        unset($rules['status']);

        return $rules;
    }
}
