<?php

namespace App\Http\Requests\Admin\Homepage\Sliders;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return (new Slider())->rules;
    }
}
