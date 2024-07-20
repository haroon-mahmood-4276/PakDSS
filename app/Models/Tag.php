<?php

namespace App\Models;

use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\{Attributes\ObservedBy, Factories\HasFactory, Model, Relations\BelongsToMany, SoftDeletes};

#[ObservedBy([TagObserver::class])]
class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp',
    ];

    public $rules = [
        'name' => 'required|string|between:1,254|unique:tags',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
