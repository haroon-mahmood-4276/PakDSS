<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasUuids, HasFactory, LogsActivity;

    protected $dateFormat = 'U';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
    ];

    // protected $hidden = [
    //     'slug',
    // ];

    public $rules = [
        'parent_category' => 'nullable|uuid',
        'name' => 'required|string|between:1,254',
        'slug' => 'required|string|between:1,254|unique:categories,slug',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(self::class)->logFillable();
    }
}
