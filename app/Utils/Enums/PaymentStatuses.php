<?php

namespace App\Utils\Enums;

use App\Utils\Traits\EnumHelpers;

enum PaymentStatuses: string
{
    use EnumHelpers;

    case PENDING = 'pending';
    case UNPAID = 'unpaid';
    case PAID = 'paid';
    case PARTIALLY_PAID = 'partially_paid';
    case REFUNDED = 'refunded';
    case CANCELLED = 'cancelled';
}
