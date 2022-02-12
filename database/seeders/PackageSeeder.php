<?php

namespace Database\Seeders;

use App\Enum\PackageTypeEnum;
use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $des1 = "

        بررسی و آنالیز کسب و کار <br />
        ساخت تقویم محتوایی <br />
        ایجاد استراتژی هشتگ‌گذاری مدون <br />
        تولید ۱۲ پست گرافیکی <br />
        تولید ۸ استوری گرافیکی <br />
        تولید کپشن‌های تعاملی <br />
        انتشار پست‌ها طبق زمانبندی مناسب <br />
        ارائه گزارش ماهانه <br />
        ";
        $des2 = "
        بررسی و آنالیز کسب و کار <br />
        ایجاد تم بصری <br />
        ساخت تقویم محتوایی <br />
        ایجاد استراتژی هشتگ‌گذاری مدون <br />
        تولید ۲۲ پست گرافیکی <br />
        تولید ۱۰ استوری گرافیکی <br />
        تولید کپشن‌های تعاملی <br />
        انتشار پست‌ها طبق زمانبندی مناسب <br />
        ارائه گزارش ماهانه <br />
        ادمین اختصاصی <br />
        تولید ۱ ویدیو موشن <br />
        ";
        $des3 = "
        بررسی و آنالیز کسب و کار <br />
        ایجاد تم بصری <br />
        ساخت تقویم محتوایی <br />
        ایجاد استراتژی هشتگ‌گذاری مدون <br />
        تولید ۳۲ پست گرافیکی <br />
        تولید ۱۵ استوری گرافیکی <br />
        تولید کپشن‌های تعاملی <br />
        انتشار پست‌ها طبق زمانبندی مناسب <br />
        ارائه گزارش ماهانه <br />
        ادمین اختصاصی <br />
        تولید ۳ ویدیو موشن <br />
        تولید ۵ ویدیو کوتاه مونتاژی <br />
        عکاسی و ادیت (۸ تصویر) <br />
        مشاوره اختصاصی امور تبلیغاتی <br />
        اجرای کمپین‌های تبلیغاتی و مسابقه ای <br />
        ";
        $des4 = "
        جلسه حضوری برای قرارداد <br />
        راه اندازی وب سایت شرکتی <br />
        تنظیم رنگ بندی اصلی وب سایت <br />
        انجام سئو on page <br />
        انجام سئو off page <br />
        تنظیم عنوان ها و متا تگ ها <br />
        به اشتراک گذاری مطالب سایت <br />
        مدیریت شبکه اجتماعی تلگرام <br />
        کمک به دریافت نماد اعتماد الکترونیک <br />
        ثبت سایت در گوگل و دیگر موتورهای جستجو <br />
        سئو ۵ کلمه کلیدی مرتبط با کسب و کار <br />
        راه اندازی و مدیریت Web Master <br />
        ایجاد پنل حرفه ای تحلیل آمار سایت <br />
        ساخت شبکه های اجتماعی LinkedIn -Twitter -Facebook <br />
        درج ماهیانه ۱۲ محتوا در سایت <br />
        مدیریت Google Map و review <br />
        پشتیبانی ۶ ماهه <br />
        ";
        $des5 = "
        جلسه حضوری مشاوره کسب و کار <br />
        جلسه مشاوره سئو سایت <br />
        جلسه مشاوره بازاریابی محتوایی <br />
        راه اندازی وب سایت شرکتی یا فروشگاهی <br />
        هدفگیری کلمات کلیدی طبق ساختار سایت <br />
        دسته‌بندی کاربران وب سایت <br />
        تنظیم رنگ بندی اصلی وب سایت <br />
        انجام سئو on page حرفه ای <br />
        انجام سئو off page حرفه ای <br />
        تنظیم عنوان ها و متا تگ ها <br />
        به اشتراک گذاری مطالب سایت <br />
        مدیریت شبکه اجتماعی اینستاگرام <br />
        مدیریت شبکه اجتماعی تلگرام <br />
        کمک به دریافت نماد اعتماد الکترونیک <br />
        ثبت سایت در گوگل و دیگر موتورهای جستجو <br />
        سئو ۱۰ کلمه کلیدی مرتبط با کسب و کار <br />
        راه اندازی و مدیریت Web Master <br />
        راه اندازی و مدیریت Google Analytics <br />
        ایجاد پنل حرفه ای تحلیل آمار سایت <br />
        ساخت شبکه های اجتماعی <br />
        Google + – LinkedIn -Twitter -Facebook <br />
        درج ماهیانه ۱۸ محتوا در سایت <br />
        مدیریت Google Map و review <br />
        ارسال ۵۰۰۰ ایمیل انبوه <br />
        پشتیبانی ۱ ساله <br />
        ";
        $des6 = "
        جلسه حضوری مشاوره کسب و کار <br />
        مشاوره ایده یابی و تحلیل ایده <br />
        شناسایی بازار هدف و مخاطبان <br />
        مشخص کردن شاخص های کلیدی عملکرد <br />
        جلسه مشاوره سئو سایت <br />
        تحقیق کلمات کلیدی کسب و کار  شما <br />
        تشخیص کلمات کلیدی اصلی و فرعی <br />
        بررسی رقبای سئو سایت شما <br />
        جلسه مشاوره بازاریابی محتوایی <br />
        راه اندازی کمپین بازاریابی آنلاین <br />
        راه اندازی وب سایت شرکتی یا فروشگاهی <br />
        انجام سئو on page حرفه ای <br />
        انجام سئو off page حرفه ای <br />
        تحلیل و ویرایش فایل هویت <br />
        ایجاد شخصیت های کاربری <br />
        مدیریت شبکه اجتماعی اینستاگرام <br />
        مدیریت شبکه اجتماعی تلگرام <br />
        کمک به دریافت نماد اعتماد الکترونیک <br />
        ثبت سایت در گوگل و دیگر موتورهای جستجو <br />
        سئو ۱۵ کلمه کلیدی مرتبط با کسب و کار <br />
        راه اندازی و مدیریت Web Master <br />
        راه اندازی و مدیریت Google Analytics <br />
        ایجاد پنل حرفه ای تحلیل آمار سایت <br />
        ساخت شبکه های اجتماعی <br />
        Google + – LinkedIn -Twitter -Facebook <br />
        درج ماهیانه ۲۵ محتوا در سایت <br />
        مدیریت Google Map و review <br />
        ارسال ۱۰۰۰۰ ایمیل انبوه <br />
         ";
        $packages = array(
            array(
                'price' => '1500000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des1,
                'title' => [
                    'fa' => 'پکیج پایه',
                    'en' => 'Basic Package',
                ],
                'type' => PackageTypeEnum::INSTAGRAM,
                'vip' => false,
                'order' => 1,
            ),
            array(
                'price' => '3200000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des2,
                'title' => [
                    'fa' => 'پکیج حرفه ای',
                    'en' => 'Professional Package',
                ],
                'type' => PackageTypeEnum::INSTAGRAM,
                'vip' => true,
                'order' => 2,
            ),
            array(
                'price' => '6400000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des3,
                'title' => [
                    'fa' => 'پکیج پیشرفته',
                    'en' => 'َAdvanced Package',
                ],
                'type' => PackageTypeEnum::INSTAGRAM,
                'vip' => false,
                'order' => 3,
            ),

            array(
                'price' => '1000000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des4,
                'title' => [
                    'fa' => 'پکیج مخصوص استارتاپ‌ها',
                    'en' => 'َFor Staraups',
                ],
                'type' => PackageTypeEnum::DIGITAL_MARKETING,
                'vip' => false,
                'order' => 1,
            ),
            array(
                'price' => '1000000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des5,
                'title' => [
                    'fa' => 'پکیج شرکتی',
                    'en' => 'Business',
                ],
                'type' => PackageTypeEnum::DIGITAL_MARKETING,
                'vip' => true,
                'order' => 2,
            ),
            array(
                'price' => '1000000',
                'price_discount' => '',
                'dollar_price' => '0',
                'dollar_price_discount' => '0',
                'description' => $des6,
                'title' => [
                    'fa' => 'پکیج پایه',
                    'en' => 'َBasic',
                ],
                'type' => PackageTypeEnum::DIGITAL_MARKETING,
                'vip' => false,
                'order' => 3,
            ),

        );

        foreach ($packages as $data) {
            $plan = Package::create([
                'price' => $data['price'],
                'price_discount' => $data['price_discount'],
                'dollar_price' => $data['dollar_price'],
                'dollar_price_discount' => $data['dollar_price_discount'],
                'description' => $data['description'],
                'type' => $data['type'],
                'vip' => $data['vip'],
                'order' => $data['order'],
            ]);

            $plan->title = $data['title'];
            $plan->save();
        }
    }
}
