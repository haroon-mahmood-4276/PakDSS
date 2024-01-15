<?php

namespace App\Utils\Enums;

use App\Utils\Traits\EnumHelpers;

enum AddressType: string
{
    use EnumHelpers;

    case HOME = 'home';
    case OFFICE = 'office';
}
