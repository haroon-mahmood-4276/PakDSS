<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'user_id',
        'address_type',
        'country_id',
        'state_id',
        'city_id',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'mobile_no',
        'nearest_landmark',
        'zip_code',
        'default_delivery_address',
        'default_billing_address',
    ];

    protected $appends = ['name'];

    protected $casts = [
        'zip_code' => 'integer',
        'default_delivery_address' => 'boolean',
        'default_billing_address' => 'boolean',
    ];

    public $rules = [];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ucfirst($attributes['first_name'] ?? "") . ' ' . ucfirst($attributes['last_name'] ?? ""),
        );
    }
}
