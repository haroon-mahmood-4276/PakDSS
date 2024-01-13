<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $dateFormat = 'U';

    protected $fillable = [
    ];

    protected $casts = [
    ];

    public $rules = [
    ];
}
