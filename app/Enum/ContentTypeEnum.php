<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class ContentTypeEnum
{
    use GetConstantsEnum;

    const ARTICLE = 'a'; // ترجمه
    const REPORTAGE = 'b'; // گردآوری و ترجمه
    const NEWS = 'c';  // تالیف
}
