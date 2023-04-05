<?php

namespace App\Utils\Enums;

use App\Utils\Enums\Traits\EnumHelpers;

enum SellerStatus: string
{
    use EnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case OBJECTED = 'objected';
}
