<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class DiscountTypeEnum
{
    use GetConstantsEnum;
    
    const FOR_GLOBAL  = 'g';
    const FOR_USER    = 'u';
    const FOR_PRODUCT = 'p';
}
