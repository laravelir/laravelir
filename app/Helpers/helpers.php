<?php

use App\Models\User;
use App\Models\Addons;
use App\Models\Project;
use App\Enum\GradesEnum;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Language;
use App\Enum\AgesTypeEnum;
use App\Enum\CurrencyEnum;
use App\Models\Freelancer;
use App\Enum\ProjectDoTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Enum\ContentOrderStatusEnum;
use App\Enum\PackageOrderStatusEnum;
use Illuminate\Support\Facades\Route;
use App\Enum\ReportageOrderStatusEnum;
use App\Enum\SeoProjectTechnologyEnum;
use Illuminate\Support\Facades\Session;

function getLanguage($id)
{
    return Language::find($id);
}

function getCategory($id)
{
    return Category::find($id);
}

function getTag($id)
{
    return \App\Models\Tag::findOrFail($id);
}

function getFreelancer($id)
{
    return \App\Models\Freelancer::findOrFail($id);
}

function getUser($id)
{
    return \App\Models\User::findOrFail($id);
}

function getPackage($id)
{
    return \App\Models\Package::findOrFail($id);
}

function user($guard = 'web')
{
    return auth()->guard($guard)->user();
}

function getTypeOfDoProjectTitle($type)
{
    switch ($type) {
        case ProjectDoTypeEnum::BY_RASA:
            return 'توسط تیم راسا';
        case ProjectDoTypeEnum::BY_FREELANCERS:
            return 'توسط همه فریلنسر ها';
        default:
            return '';
    }
}

function getAgeTitle($age)
{
    switch ($age) {
        case AgesTypeEnum::A:
            return '13 - 17';
        case AgesTypeEnum::B:
            return '18 - 24';
        case AgesTypeEnum::C:
            return '25 - 34';
        case AgesTypeEnum::D:
            return '35 - 44';
        case AgesTypeEnum::E:
            return '45 - 54';
        case AgesTypeEnum::F:
            return '55 - 64';
        case AgesTypeEnum::G:
            return '+ 65';
        default:
            return '';
    }
}

function getGradeTitle($grade)
{
    switch ($grade) {
        case GradesEnum::A:
            return 'دیپلم';
        case GradesEnum::B:
            return 'فوق دیپلم';
        case GradesEnum::C:
            return 'لیسانس';
        case GradesEnum::D:
            return 'فوق لیسانس';
        case GradesEnum::E:
            return 'دکتری';
        case GradesEnum::F:
            return 'حوزوی';
        default:
            return '';
    }
}

function getPackageType($type)
{
    switch ($type) {
        case \App\Enum\PackageTypeEnum::DIGITAL_MARKETING:
            return 'پکیج‌های دیجیتال مارکتینگ';
        case \App\Enum\PackageTypeEnum::INSTAGRAM:
            return 'پکیج‌های مدیریت و تولید محتوای اینستاگرام';
        case \App\Enum\PackageTypeEnum::SEO_SITE:
            return 'پکیج‌های سئو وب‌سایت';
        case \App\Enum\PackageTypeEnum::CONTENT:
            return 'پپکیج‌های تولید محتوا';
        default:
            return '';
    }
}

function getPackageOrderType($type)
{
    switch ($type) {
        case 1:
            return '۳ ماهه';
        case 2:
            return '۶ ماهه';
        case 3:
            return '۱۲ ماهه';

        default:
            return '';
    }
}

function currentLocale()
{
    return App::getLocale();
}

function currentCurrencyTitle()
{
    return App::getLocale() == 'fa' ? 'تومان' : 'Dollar';
}

function currentDirection()
{
    return App::getLocale() == 'fa' ? 'rtl' : 'ltr';
}

function currentDirectionTitle()
{
    return App::getLocale() == 'fa' ? 'right' : 'left';
}

function getCurrencyTitle($currency)
{
    return $currency == CurrencyEnum::TOMAN ? 'تومان' : 'Dollar';
}

function hasGlobalDiscount($user_id, $user_type = 'user')
{
    if ($user_type == 'user') {
        return DB::table('discountables')->where([
            'discountable_id' => $user_id,
            'discountable_id' => User::class,
        ])->exists();
    } else {
        return DB::table('discountables')->where([
            'discountable_id' => $user_id,
            'discountable_id' => Freelancer::class,
        ])->exists();
    }
}

function isGlobalDiscountAvailable($user_id, $discount_id, $user_type = 'user')
{
    $discount = Discount::find($discount_id);

    if ($user_type == 'user') {
        $used = DB::table('discount_users')->where([
            'discountable_id' => $user_id,
            'discountable_id' => User::class,
            'discount_id' => $discount_id,
        ])->first();
        dd($used);
        if ($used) {
            dd("d");
            if (($discount->count_use > $discount->used) && ($used->used_count < $discount->count_use_user)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    } else {
        return DB::table('discount_users')->where([
            'discountable_id' => $user_id,
            'discountable_id' => Freelancer::class,
            'discount_id' => $discount_id,
        ])->exists();
    }
}

function getContentType($type, $locale = 'fa')
{
    switch ($type) {
        case \App\Enum\ContentTypeEnum::TRANSLATE:
            return $locale == 'fa' ? 'ترجمه' : 'Translate';
        case \App\Enum\ContentTypeEnum::COMPILATION:
            return $locale == 'fa' ? 'تالیف' : 'Compilation';
        case \App\Enum\ContentTypeEnum::BOTH:
            return $locale == 'fa' ? 'تالیف و ترجمه' : 'Compilation And Translation';
        default:
            # code...
            break;
    }
}

function getGender($gender)
{
    if ($gender === 'f') return 'زن';
    if ($gender === 'm') return 'مرد';
    if ($gender === 'u') return 'نا مشخص';
}
function readTime($text)
{

    $wordCount = str_word_count($text); // getting the number of words

    $minutesToRead = round($wordCount / 200); // getting the number of minutes

    if ($minutesToRead < 1) { // if the time is less than a minute
        $minutes = '1 دقیقه';
    } else {
        $minutes = $minutesToRead . " دقیقه"; // saving the time in the variable
    }

    return $minutes;
}
// return user or freelancer
function getUserType($type)
{
    if ($type === \App\Models\User::class) return 'کاربر';
    if ($type === \App\Models\Freelancer::class) return 'فریلنسر';
}

function get_first_image_url($html)
{
    if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
        return $matches[1];
    } else return 'url_of_default_image_if_post_has_no_img_tags.jpg';
}

function getContentOrder($id)
{
    return DB::table('content_order_reportage_selected')->where([
        'reportage_ordered_id' => $id
    ])->first();
}



if (!function_exists('isActive')) {
    function isActive($key, $class = 'active')
    {
        if (is_array($key)) {
            return in_array(Route::currentRouteName(), $key) ? $class : '';
        }
        return Route::currentRouteName() == $key ? $class : '';
    }
}

function hasPaymentFactor($payment_id)
{
    return (bool) DB::table('factors')->where([
        'payment_id' => $payment_id
    ])->exists();
}

function hasPaymentFactorUploaded($payment_id)
{
    return (bool) DB::table('factors')->where(['payment_id' => $payment_id])->first()->file_url;
}

function thisReportageHaveContentOrder($id)
{
    return (bool)DB::table('content_order_reportage_selected')->where([
        'reportage_ordered_id' => $id
    ])->first();
}

function haveAnyUploadedContentAttachment($project_id)
{
    return (bool)DB::table('project_attachments')->where([
        'project_id' => $project_id,
    ])->first();
}

function haveUploadedContentAttachment($project_id, $freelancer_id, $number)
{
    return (bool)DB::table('project_attachments')->where([
        'project_id' => $project_id,
        'freelancer_id' => $freelancer_id,
        'number' => $number,
    ])->first();
}

function getUploadedContentAttachment($project_id, $freelancer_id, $number)
{
    return DB::table('project_attachments')->where([
        'project_id' => $project_id,
        'freelancer_id' => $freelancer_id,
        'number' => $number,
    ])->first();
}

function getProductReportage($id)
{
    return \App\Models\ProductReportage::find($id);
}

function getTicketProject($id, $type)
{
    switch ($type) {
        case \App\Enum\OrderTypeEnum::REPORTAGE:
            return DB::table('order_reportages')->where('id', $id)->first();
        case \App\Enum\OrderTypeEnum::ADWORDS:
            return DB::table('adwords')->where('id', $id)->first();
        case \App\Enum\OrderTypeEnum::PACKAGE:
            return DB::table('order_packages')->where('id', $id)->first();
        case \App\Enum\OrderTypeEnum::SEO:
            return DB::table('seo_projects')->where('id', $id)->first();
        case \App\Enum\OrderTypeEnum::CONTENT:
            return DB::table('projects')->where('id', $id)->first();
        default:
            break;
    }
}

function getTicketStatus($status)
{
    $locale = currentLocale();

    switch ($status) {
        case \App\Enum\TicketStatusEnum::SNEW:
            return $locale == 'fa' ? 'جدید' : 'New';
        case \App\Enum\TicketStatusEnum::WAIT_FOR_ANSWER:
            return $locale == 'fa' ? 'منتظر پاسخ کاربر' : 'Wait for user';
        case \App\Enum\TicketStatusEnum::IN_PROGRESS:
            return $locale == 'fa' ? 'درحال پیگیری ' : 'In Progress';
        case \App\Enum\TicketStatusEnum::DONE:
            return $locale == 'fa' ? 'بسته شده' : 'Done';
        default:
            # code...
            break;
    }
}

function getJobRequestType($type)
{
    $locale = currentLocale();

    switch ($type) {
        case \App\Enum\JobRequestType::REMOTE:
            return $locale == 'fa' ? 'دورکاری' : 'Remote';
        case \App\Enum\JobRequestType::LOCAL:
            return $locale == 'fa' ? 'حضوری(اصفهان)' : 'Local';
        default:
            # code...
            break;
    }
}

function getAdwordStatus($status)
{
    $locale = currentLocale();

    switch ($status) {
        case \App\Enum\AdwordStatusEnum::NEW:
            return $locale == 'fa' ? 'در انتظار تایید' : 'Wait for approve';
        case \App\Enum\AdwordStatusEnum::APPROVED:
            return $locale == 'fa' ? 'تایید شده' : 'Approved';
        case \App\Enum\AdwordStatusEnum::DONE:
            return $locale == 'fa' ? 'پایان یافته' : 'Done';
        default:
            # code...
            break;
    }
}

function getPaymentType($type)
{
    $locale = currentLocale();

    switch ($type) {
        case \App\Enum\PaymentTypeEnum::DISCOUNT:
            return $locale == 'fa' ? 'کد هدیه' : 'Code';
        case \App\Enum\PaymentTypeEnum::WALLET:
            return $locale == 'fa' ? 'شارژ کیف پول' : 'Wallet Charge';

        default:
            # code...
            break;
    }
}

function getUserWalletAmount($user, $locale = 'fa')
{
    return $locale == 'fa' ? $user->wallet->amount : $user->wallet->dollar_amount;
}

function checkLocale($request)
{
    $languages = ['en', 'fa'];
    $locale = $request->query("locale");
    if ($locale and in_array($locale, $languages)) {
        Session::put('locale', $locale);
        App::setlocale(Session::get('locale'));
    }
}

function getFreelancerFinalProjectPrice($freelancer_id, $price)
{
    $freelancerPercent = (int) Freelancer::find($freelancer_id)->percent;
    return getPercent($price, $freelancerPercent);
}

function getPercent($value, $percent)
{
    return (int)round(($percent / 100) * $value);
}

function getFreelancerSkill($freelancer_id, $skill_id)
{
    return DB::table('freelancer_skills')->where([
        'freelancer_id' => $freelancer_id,
        'skill_id' => $skill_id,
    ])->first();
}

function isInvalidInput($field)
{
    return "@error($field) is-invalid @enderror";
}

function getImagePath($path)
{
    //
}
