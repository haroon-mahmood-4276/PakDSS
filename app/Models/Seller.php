<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Seller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, LogsActivity, SoftDeletes;

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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'integer',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(self::class)->logFillable();
    }

    protected $appends = ['name'];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $name = (!is_null($attributes['first_name']) ? ' ' . $attributes['first_name'] : '') . (!is_null($attributes['middle_name']) ? ' ' . $attributes['middle_name'] : '') . (!is_null($attributes['last_name']) ? ' ' . $attributes['last_name'] : '');
                return trim($name);
            },
        );
    }
}
