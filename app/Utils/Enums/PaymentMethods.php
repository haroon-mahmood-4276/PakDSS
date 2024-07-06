<?php

namespace App\Utils\Enums;

use App\Utils\Traits\EnumHelpers;

enum PaymentMethods: string
{
    use EnumHelpers;

    case JAZZCASH = 'jazzcash';
    case EASYPESA = 'easypesa';
    case CASH_ON_DELIVERY = 'cash_on_delivery';
    case BANK_TRANSFER = 'bank_tansfer';
}
