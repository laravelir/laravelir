<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class PostTypeEnum
{
    use GetConstantsEnum;

    const LEARNING = 'a'; // آموزشی
    const REPORTAGE = 'b'; // رپرتاژ تبلیغاتی
    const NEWS = 'c';  // خبر
    const PACKAGE = 'd';  // معرفی پکیج
}
