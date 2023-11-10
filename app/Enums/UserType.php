<?php

namespace App\Enums;

use App\Traits\EnumCustom;

enum UserType: string
{
    use EnumCustom;
    case USER = 'user';
    case DELIVERY = 'delivery';
}
