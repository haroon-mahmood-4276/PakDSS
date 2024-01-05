<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasManyThrough};
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'code',
        'name',
        'slug',
        'phone_code',
    ];

    protected $casts = [];

    public $rules = [];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function cities(): HasManyThrough
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}
