<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class CurrencyEnum
{
    use GetConstantsEnum;

    const DOLLAR = 'd'; // دیپلم
    const TOMAN = 't'; // فوق دیپلم

}
