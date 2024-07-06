<?php

namespace App\Utils\Enums;

use App\Utils\Traits\EnumHelpers;

enum OrderStatuses: string
{
    use EnumHelpers;

    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';
}
