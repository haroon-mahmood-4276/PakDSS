<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Request extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'modelable',
        'name',
        'slug',
        'properties',
        'status',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public $rules = [
        'name' => 'required|string|between:1,254',
        'slug' => 'required|string|between:1,254|unique:categories,slug|unique:brands,slug|unique:requests,slug',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:536',
    ];

}
