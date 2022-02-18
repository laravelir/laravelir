<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class TicketStatusEnum
{
    use GetConstantsEnum;

    const SNEW = 'n';
    const WAIT_FOR_ANSWER = 'w';
    const IN_PROGRESS = 'i';
    const DONE = 'o';
}
