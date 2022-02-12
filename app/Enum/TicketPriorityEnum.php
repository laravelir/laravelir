<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class TicketPriorityEnum
{
    use GetConstantsEnum;

    const EMERGENCY = 'a';
    const HIGHT     = 'b';
    const AVERAGE   = 'c';
    const LOW       = 'd';
}
