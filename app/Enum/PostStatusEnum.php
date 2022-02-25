<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class PostStatusEnum
{
    use GetConstantsEnum;

    const APPROVED = 'a';
    const DRAFT = 'b';

}
