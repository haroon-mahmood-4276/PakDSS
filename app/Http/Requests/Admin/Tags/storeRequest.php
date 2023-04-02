<?php

namespace App\Http\Requests\Admin\Tags;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Tag())->rules;
    }
}
