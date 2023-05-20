<?php

namespace App\Models;

use App\Utils\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasUuids, HasFactory, LogsActivity, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'brand_id',
        'seller_id',
        'shop_id',

        'name',

        'permalink',
        'sku',
        'price',

        'short_description',
        'long_description',

        'meta_aurthor',
        'meta_keywords',
        'meta_description',

        'status',
        'reason',
    ];

    public array $rules = [
        'shop' => 'required|uuid|exists:shops,id',
        'brand' => 'required|uuid|exists:brands,id',

        'categories' => 'required|array|min:1',
        'categories.*' => 'uuid|exists:categories,id',

        'tags' => 'required|array|min:1',
        'tags.*' => 'uuid|exists:tags,id',

        'name' => 'required|string|between:3,254',
        'permalink' => 'required|string|between:3,254|unique:products,permalink',
        'sku' => 'required|string|between:3,10|unique:products,sku',
        'price' => 'required|decimal:0,2|gte:0',
        'discounted_price' => 'nullable|decimal:0,2|gte:0',

        'short_description' => 'required',
        'long_description' => 'nullable',

        'meta_keywords' => 'nullable|json',
        'meta_description' => 'nullable|string',

        'product_images' => 'nullable|array',
        'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:536',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(self::class)->logFillable();
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
