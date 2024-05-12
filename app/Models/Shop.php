<?php

namespace App\Models;

use App\Utils\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Shop extends Model implements HasMedia
{
    use HasUuids, HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'seller_id',
        'name',
        'slug',
        'email',
        'phone_1',
        'phone_2',
        'address',
        'pickup_address',
        'description',
        'latitude',
        'longitude',
        'manager_name',
        'manager_mobile',
        'manager_email',
        'shop_logo',
        'status',
        'reason',
    ];

    protected $casts = [
        'email_verified_at' => 'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public array $rules = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->rules = [
            'name' => 'required|string|between:3,254',
            'slug' => 'required|string|between:3,254|unique:shops,slug',

            'email' => 'required|string|between:3,254|unique:shops,email',

            'phone_1' => 'required|string|max_digits:20',
            'phone_2' => 'nullable|string|max_digits:20',

            'address' => 'required|string|between:3,254',
            'pickup_address' => 'required|string|between:3,254',

            'description' => 'required|string|between:3,254',

            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

            'manager_name' => 'required|string|between:3,254',
            'manager_mobile' => 'required|string|max_digits:20',
            'manager_email' => 'nullable|string|between:3,254|unique:shops,manager_email',

            'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:536',

            'status' => 'required|in:' . implode(',', Status::values()),
        ];
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
