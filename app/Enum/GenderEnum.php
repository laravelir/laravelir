<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class GenderEnum
{
    use GetConstantsEnum;

    const MALE = 'm';
    const FEMALE = 'f';
    const UNKNOWN = 'u';
}
