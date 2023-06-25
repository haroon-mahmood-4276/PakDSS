<?php

namespace App\Http\Requests\Admin\Settings;

use App\Models\Setting;
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
        switch ($this->tab) {
            case 'admin':
                $rules = [
                    'one_dollor_rate' => 'required|numeric|gte:0',
                    'one_pound_rate' => 'required|numeric|gte:0',
                ];
                break;
        }
        $rules['tab'] = 'required|in:admin,seller,site';
        return $rules;
    }
}
