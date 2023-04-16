<?php

namespace App\Models;

use App\Utils\Enums\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Shop extends Model implements HasMedia
{
    use HasUuids, HasFactory, LogsActivity, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'name',
        'slug',
        'address',
        'lat',
        'long',
        'status',
        'reason',
    ];

    public $rules = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->rules = [
            "name" => 'required|string|between:3,254',
            "address" => 'required|string|between:3,254',
            "latitude" => 'required|numeric',
            "longitude" => 'required|numeric',
            "shop_image" => 'nullable|image|mimes:jpeg,png,jpg|max:536',
            "status" => "required|in:" . implode(',', Status::values()),
            "reason" => "required_if:status,objected,inactive",
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(self::class)->logFillable();
    }
}
