<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
    ];

    protected $casts = [
        'created_at' => 'datetime:U',
    ];

    public $rules = [
        'parent_category' => 'nullable|uuid',
        'name' => 'required|string|between:1,254',
        'slug' => 'required|string|between:1,254|unique:categories,slug',
        'brands' => 'nullable|array',
        'brands.*' => 'uuid',
    ];

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
