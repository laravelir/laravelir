<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class GradesEnum
{
    use GetConstantsEnum;
    
    const A = 'a'; // دیپلم
    const B = 'b'; // فوق دیپلم
    const C = 'c'; // لیسانس
    const D = 'd'; // فوق لیسانس
    const E = 'e'; // دکتری
    const F = 'f'; // حوزوی
}
