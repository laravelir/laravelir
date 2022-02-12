<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class UserTypeEnum
{
    use GetConstantsEnum;

    const CUSTOMER   = 'c'; // Customer
    const FREELANCER = 'f'; // Freelancer
}
