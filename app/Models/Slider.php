<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Slider extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $dateFormat = 'U';

    protected $fillable = [
        'collection_name',
        'name',
        'link',
    ];

    public $rules = [
        'name' => 'required|string|max:255',
        'link' => 'nullable|url:http,https',
        'slider_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:536',
    ];
}
