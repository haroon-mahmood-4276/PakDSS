<?php

namespace App\Http\Requests\Admin\Sellers;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
        $rules = (new Seller())->rules;
        $rules['password'][0] = 'nullable';
        $id = decryptParams($this->id);
        $rules['email'] .= ',' . $id;
        $rules['cnic'] .= ',' . $id;
        return $rules;
    }
}
