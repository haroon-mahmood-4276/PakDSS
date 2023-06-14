<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use BeyondCode\LaravelWebSockets\Statistics\Models\WebSocketsStatisticsEntry;

class WebSocket extends WebSocketsStatisticsEntry
{
    use HasUuids;

    protected $dateFormat = 'U';

}
