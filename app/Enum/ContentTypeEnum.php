<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class ContentTypeEnum
{
    use GetConstantsEnum;

    // نوع نگارش

    const TRANSLATE = 't'; // ترجمه
    const COMPILATION = 'c';  // تالیف
    const BOTH = 'b'; // گردآوری و ترجمه
}
