<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class ProjectDoTypeEnum
{
    use GetConstantsEnum;

    const BY_RASA = 'a'; // توسط راسا
    const BY_FREELANCERS = 'b'; // توسط فریلنسر ها
}
