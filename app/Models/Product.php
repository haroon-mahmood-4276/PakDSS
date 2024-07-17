<?php

namespace App\Models;

use App\Utils\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasUuids, HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'brand_id',
        'seller_id',
        'shop_id',

        'name',

        'permalink',
        'sku',

        'price',
        'discounted_price',

        'call_for_final_rates',
        'are_rates_printed_on_package',

        'length',
        'width',
        'height',

        'weight',

        'short_description',
        'long_description',

        'meta_author',
        'meta_keywords',
        'meta_description',

        'status',
        'reason',
    ];

    public array $rules = [
        'name' => 'required|string|between:3,254',
        'permalink' => 'required|string|between:3,254|unique:products,permalink',
        'sku' => 'required|string|between:3,20|unique:products,sku',

        'price' => 'required|decimal:0,2|gte:0',
        'discounted_price' => 'nullable|decimal:0,2|gte:0',

        'call_for_final_rates' => 'sometimes|boolean|in:0,1',
        'are_rates_printed_on_package' => 'sometimes|boolean|in:0,1',

        'length' => 'sometimes|decimal:0,2|gte:0',
        'width' => 'sometimes|decimal:0,2|gte:0',
        'height' => 'sometimes|decimal:0,2|gte:0',

        'weight' => 'sometimes|decimal:0,2|gte:0',

        'short_description' => 'required|max:2500',
        'long_description' => 'nullable',

        'meta_keywords' => 'nullable|json',
        'meta_description' => 'nullable|string',

        'shop' => 'required|uuid|exists:shops,id',
        'brand' => 'sometimes|uuid|exists:brands,id',

        'categories' => 'required|array|min:1',
        'categories.*' => 'uuid|exists:categories,id',

        'tags' => 'nullable|array|min:1',
        'tags.*' => 'nullable|uuid|exists:tags,id',

        'product_images' => 'nullable|array',
        'product_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:536',

        'product_pdf' => 'nullable|file|mimes:pdf',

        'product_video' => 'nullable|file|mimes:mp4,webm,mov,avi,wmv,mkv',
    ];

    protected $casts = [
        'price' => 'float',
        'discounted_price' => 'float',

        'call_for_final_rates' => 'boolean',
        'are_rates_printed_on_package' => 'boolean',

        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',

        'weight' => 'decimal:2',

        'meta_keywords' => 'array',

        'status' => Status::class,
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
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
