<?php

namespace App\Utils\Enums;

use App\Utils\Traits\Enums\EnumHelpers;

enum Status: string
{
    use EnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case OBJECTED = 'objected';
    case PENDING_APPROVAL = 'pending_approval';
}
