<?php

namespace App\Utils\Enums;

use App\Utils\Enums\Traits\EnumHelpers;

enum Status: string
{
    use EnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case OBJECTED = 'objected';
    case PENDING_APPROVAL = 'pending_approval';
}
