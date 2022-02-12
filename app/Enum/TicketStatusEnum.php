<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class TicketStatusEnum
{
    use GetConstantsEnum;

    const NEW = 'n';
    const WAIT_FOR_USER = 'w';
    const IN_PROGRESS = 'i';
    const DONE = 'o';
}
