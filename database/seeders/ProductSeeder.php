<?php

namespace Database\Seeders;

use App\Enum\ContentFormatEnum;
use App\Models\Product;
use App\Models\ProductProfile;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'title' => [
                    'fa' => 'پست وبلاگی 550 تا 750 کلمه‌ای',
                    'en' => 'Blog Post (550-750 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '37000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 550 تا 750 کلمه‌ای',
                    'en' => 'Blog Post (550-750 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '75000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 750 تا 900 کلمه‌ای',
                    'en' => 'Blog Post (750-900 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '47000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 750 تا 900 کلمه‌ای',
                    'en' => 'Blog Post (750-900 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '98000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 900 تا 1100 کلمه‌ای',
                    'en' => 'Blog Post (900-1100 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '87000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 900 تا 1100 کلمه‌ای',
                    'en' => 'Blog Post (900-1100 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '130000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 1100 تا 1400 کلمه‌ای',
                    'en' => 'Blog Post (1100-1400 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '97000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 1100 تا 1400 کلمه‌ای',
                    'en' => 'Blog Post (1100-1400 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '145000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 1400 تا 2000 کلمه‌ای',
                    'en' => 'Blog Post (1400-2000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '147000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'پست وبلاگی 1400 تا 2000 کلمه‌ای',
                    'en' => 'Blog Post (1400-2000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '197000',
                ],
                'type' => ContentFormatEnum::ARTICLE_BLOG,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'متن رپورتاژ خبری ( 900 الی 1200 کلمه)',
                    'en' => 'Press Release Content (900-1200 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '195000',
                ],
                'type' => ContentFormatEnum::REPORTAGE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'متن رپورتاژ خبری ( 900 الی 1200 کلمه)',
                    'en' => 'Press Release Content (900-1200 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '200000',
                ],
                'type' => ContentFormatEnum::REPORTAGE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'متن رپورتاژ خبری ( 1200 الی 2000 کلمه)',
                    'en' => 'Press Release Content (900-1200 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '280000',
                ],
                'type' => ContentFormatEnum::REPORTAGE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'متن رپورتاژ خبری ( 1200 الی 2000 کلمه)',
                    'en' => 'Press Release Content (900-1200 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '300000',
                ],
                'type' => ContentFormatEnum::REPORTAGE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 300 تا 500 کلمه‌ای',
                    'en' => 'Web Pages Content (300-500 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '70000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 300 تا 500 کلمه‌ای',
                    'en' => 'Web Pages Content (300-500 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '120000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 500 تا 700 کلمه‌ای',
                    'en' => 'Web Pages Content (500-700 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '87000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 500 تا 700 کلمه‌ای',
                    'en' => 'Web Pages Content (500-700 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '149000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 700 تا 1000 کلمه‌ای',
                    'en' => 'Web Pages Content (700-1000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '100000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 700 تا 1000 کلمه‌ای',
                    'en' => 'Web Pages Content (700-1000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '177000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1000 تا 1300 کلمه‌ای',
                    'en' => 'Web Pages Content (1000-1300 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '130000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1000 تا 1300 کلمه‌ای',
                    'en' => 'Web Pages Content (1000-1300 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '197000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1300 تا 1700 کلمه‌ای',
                    'en' => 'Web Pages Content (1300-1700 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '167000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1300 تا 1700 کلمه‌ای',
                    'en' => 'Web Pages Content (1300-1700 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '230000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1700 تا 2000 کلمه‌ای',
                    'en' => 'Web Pages Content (1700-2000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '195000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'محتوای صفحات اصلی سایت 1700 تا 2000 کلمه‌ای',
                    'en' => 'Web Pages Content (1700-2000 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '267000',
                ],
                'type' => ContentFormatEnum::WEBSITE,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'توضیحات محصول فروشگاهی 250 تا 500 کلمه‌ای',
                    'en' => 'Product Description (250 - 500 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '80000',
                ],
                'type' => ContentFormatEnum::SHOP_DESCRIPTION,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'توضیحات محصول فروشگاهی 250 تا 500 کلمه‌ای',
                    'en' => 'Product Description (250 - 500 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '120000',
                ],
                'type' => ContentFormatEnum::SHOP_DESCRIPTION,
                'language_id' => 2,
            ],
            [
                'title' => [
                    'fa' => 'توضیحات محصول فروشگاهی 500 تا 900 کلمه‌ای',
                    'en' => 'Product Description (500 - 900 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '110000',
                ],
                'type' => ContentFormatEnum::SHOP_DESCRIPTION,
                'language_id' => 1,
            ],
            [
                'title' => [
                    'fa' => 'توضیحات محصول فروشگاهی 500 تا 900 کلمه‌ای',
                    'en' => 'Product Description (500 - 900 Words)',
                ],
                'price' => [
                    'd' => '1',
                    't' => '180000',
                ],
                'type' => ContentFormatEnum::SHOP_DESCRIPTION,
                'language_id' => 2,
            ],

        ];

        $ps = collect($products);
        $ps->each(function ($item) {
            $p = Product::create([
                'price' => $item['price']['t'],
                'dollar_price' => $item['price']['d'],
                'language_id' => $item['language_id'],
                'type' => $item['type'],

            ]);
            $p->title = $item['title'];
            $p->save();
        });
        // factory(Product::class, 10)->create()->each(function ($product) {
        //     $product->profile()->update(factory(ProductProfile::class)->make()->toArray());
        //     $product->comments()->saveMany(factory(Comment::class,2)->make());
        // });
    }
}
