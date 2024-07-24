<?php

namespace App\Http\Requests\User\Addresses;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge((new Address())->rules, [
            'state' => [
                'required',
                Rule::exists('states', 'id')->where(function (Builder $query) {
                    $query->where('country_id', $this->country);
                })
            ],
            'city' => [
                'required',
                Rule::exists('cities', 'id')->where(function (Builder $query) {
                    $query->where('state_id', $this->state);
                })
            ],
        ]);
    }
}
