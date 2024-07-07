<?php

namespace App\Http\Requests\User\Addresses;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Address())->rules;
    }
}
