<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasUuids, LogsActivity, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'tab_id',
        'key',
        'value',
        'rules',
    ];

    protected $casts = [
    ];

    public $rules = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->rules = [];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(self::class)->logFillable();
    }
}
