<?php

namespace App\Models;

use App\Observers\BrandObserver;
use Illuminate\Database\Eloquent\{Attributes\ObservedBy, Factories\HasFactory, Model, Relations\HasMany, Relations\BelongsToMany, SoftDeletes};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

#[ObservedBy([BrandObserver::class])]
class Brand extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'name',
        'slug',
        'is_default',
    ];

    public $rules = [
        'name' => 'required|string|between:1,254',
        'slug' => 'required|string|between:1,254|unique:brands,slug',
        'brand_image' => 'nullable|image|mimes:jpeg,png,jpg|max:536',
        'categories' => 'nullable|array',
        'categories.*' => 'integer',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
