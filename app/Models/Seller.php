<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Rules\AlphaNumDash;
use App\Rules\Password;
use App\Utils\Enums\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'email_verified_at',
        'remember_token',
        'cnic',
        'ntn_number',
        'phone_primary',
        'phone_secondary',
        'status',
        'reason',
        'setup',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'integer',

        'status' => Status::class,

        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public $rules = [];

    protected $appends = ['name'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->rules = [
            'email' => 'required|email|unique:sellers,email',
            'password' => ['required', (new Password)],
            // "password" => ["required", (new Password)->requireUppercase()->requireNumeric()->requireSpecialCharacter()],
            'first_name' => 'required|string|between:3,254',
            'middle_name' => 'nullable|string|between:3,254',
            'last_name' => 'required|string|between:3,254',
            'cnic' => 'required|numeric|digits:13|unique:sellers,cnic',
            'ntn_number' => ['nullable', (new AlphaNumDash), 'max:20'],
            'phone_primary' => 'required|string|max_digits:20',
            'phone_secondary' => 'nullable|string|max_digits:20',
            'status' => 'required|in:' . implode(',', Status::values()),
            'reason' => 'required_if:status,objected,inactive',
        ];
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $name = (!is_null($attributes['first_name']) ? ' ' . $attributes['first_name'] : '') . (!is_null($attributes['middle_name']) ? ' ' . $attributes['middle_name'] : '') . (!is_null($attributes['last_name']) ? ' ' . $attributes['last_name'] : '');

                return trim($name);
            },
            set: function ($value, $attributes) {
                $attributes['first_name'] = $value;
                $attributes['middle_name'] = $value;
                $attributes['last_name'] = $value;
            },
        );
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
