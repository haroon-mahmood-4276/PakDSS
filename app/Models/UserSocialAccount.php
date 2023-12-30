<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    use HasFactory, HasUuids;

    protected $dateFormat = 'U';

    protected $fillable = [
        'account_id',
        'user_id',
        'name',
        'token',
        'refreshToken',
        'expiresIn',
        'approved_scopes',
    ];

    protected $casts = [
        'account_id' => 'string',
        'expiresIn' => 'integer',
        'approved_scopes' => 'array',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
}
