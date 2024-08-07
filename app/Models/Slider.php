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
        'collection_name' => 'required',
        'name' => 'required|string|max:255',
        'link' => 'required|url:http,https',
    ];
}
