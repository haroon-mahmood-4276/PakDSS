<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public $rules = [
        'address_type' => 'required|in:office,home',
        'country' => 'required|exists:countries,id',
        'first_name' => 'required|string|max:254',
        'last_name' => 'required|string|max:254',
        'address_1' => 'required|string|max:254',
        'address_2' => 'nullable|string|max:254',
        'mobile_no' => 'required|string|max_digits:20',
        'nearest_landmark' => 'nullable|string|max:254',
        'zip_code' => 'required|integer',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ucfirst($attributes['first_name'] ?? "") . ' ' . ucfirst($attributes['last_name'] ?? ""),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
