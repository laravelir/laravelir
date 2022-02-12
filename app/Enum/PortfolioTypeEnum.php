<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class PortfolioTypeEnum
{
    use GetConstantsEnum;

    const TEXT         = 't';
    const INFOGRAPHIC  = 'i';
    const SOUND        = 's';
    const VIDEO        = 'v';
}
