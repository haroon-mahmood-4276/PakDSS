<?php

namespace App\Http\Requests\Admin\Settings;

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
        switch ($this->tab) {
            case 'admin':
                $rules = [
                    'one_dollar_rate' => ($this->rate_auto_update === '0' ? 'required' : 'sometimes') . '|numeric|gte:0',
                    'one_pound_rate' => ($this->rate_auto_update === '0' ? 'required' : 'sometimes') . '|numeric|gte:0',
                ];
                break;
        }
        $rules['tab'] = 'required|in:admin,seller,site';
        $rules['rate_auto_update'] = 'required|in:0,1';
        return $rules;
    }
}
