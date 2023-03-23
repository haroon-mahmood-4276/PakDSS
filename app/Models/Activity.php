<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as ModelsActivity;

class Activity extends ModelsActivity
{
    use HasFactory, HasUuids;

    protected $dateFormat = 'U';
}
