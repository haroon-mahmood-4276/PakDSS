<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'name',
        'slug',
        'zip_code'
    ];

    protected $casts = [
    ];

    public $rules = [
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
