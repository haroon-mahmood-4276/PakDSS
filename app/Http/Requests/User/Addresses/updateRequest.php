<?php

namespace App\Http\Requests\User\Addresses;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        $rules = (new Address())->rules;
        $id = decryptParams($this->id);
        $rules['slug'] .= ','.$id;

        return $rules;
    }
}
