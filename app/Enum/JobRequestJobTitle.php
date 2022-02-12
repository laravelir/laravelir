<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class JobRequestJobTitle
{
    use GetConstantsEnum;

    const SEO = 'a';
    const CONTENT = 'b'; // کارشناس محتوا
    const CONTENT_CREATOR = 'c'; // متخصص تولید محتوا
    const SALE = 'd'; // کارشناس فروش
    const SOCIAL = 'e'; // کارشناس شبکه های احتماعی
    const GRAPHIC = 'f';
    const PROGRAMMER = 'g';
}
