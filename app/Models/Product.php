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
        'seller_id',
        'shop_id',

        'name',

        'permalink',
        'sku',
        'price',

        'short_description',
        'long_description',

        'keywords',

        'meta_aurthor',
        'meta_keywords',
        'meta_description',

        'status',
        'reason',
    ];

    public array $rules = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->rules = [
            'seller_id',
            'shop_id',

            'name' => 'required|string|between:3,254',

            'permalink' => 'required|string|between:3,254|unique:products,permalink',
            'sku',
            'price',

            'short_description',
            'long_description',

            'keywords',

            'meta_aurthor',
            'meta_keywords',
            'meta_description',

            'shop_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:536',

            'status' => "required|in:" . implode(',', Status::values()),
            'reason' => "required_if:status,objected,inactive",
        ];
    }

    protected $casts = [
        'keywords' => 'array'
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
