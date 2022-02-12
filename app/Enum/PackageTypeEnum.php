<?php

namespace App\Enum;

use App\Traits\GetConstantsEnum;

final class PackageTypeEnum
{
    use GetConstantsEnum;

    const DIGITAL_MARKETING = 'd'; //پکیج‌های دیجیتال مارکتینگ
    const INSTAGRAM         = 'i'; //پکیج‌های مدیریت و تولید محتوای اینستاگرام
    const SEO_SITE          = 's'; // پکیج‌های سئو وب‌سایت
    const CONTENT           = 'c';//پکیج‌های تولید محتوا

}
