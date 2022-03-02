<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {

        $categories = [
            [
                'id' => 1,
                'name' => [
                    'fa' =>  'عمومی',
                    'en' => 'Public'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 2,
                'name' => [
                    'fa' => 'پزشکی',
                    'en' => 'Medical'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 3,
                'name' => [
                    'fa' => 'ارزهای دیجیتال (کریپتو)',
                    'en' => 'Cryptocurrencies'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 4,
                'name' => [
                    'fa' => 'دیجیتال مارکتینگ و سئو',
                    'en' => 'Digital Marketing'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 5,
                'name' => [
                    'fa' => 'اینترنت و تکنولوژی',
                    'en' => 'Internet & Technology'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 6,
                'name' => [
                    'fa' => 'ورزشی',
                    'en' => 'Sport'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 7,
                'name' => [
                    'fa' => 'زیست شناسی و علوم آزمایشگاهی',
                    'en' => 'Biology laboratory Sciences'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 8,
                'name' => [
                    'fa' => 'شیمی',
                    'en' => 'Chemistry'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 9,
                'name' => [
                    'fa' => 'مالی - حسابداری',
                    'en' => 'Financial & Accounting'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 10,
                'name' => [
                    'fa' => 'معارف اسلامی و الهیات',
                    'en' => 'Islamic Studies Theology'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 11,
                'name' => [
                    'fa' => 'حقوق',
                    'en' => 'Law'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 12,
                'name' => [
                    'fa' => 'مهندسی مکانیک',
                    'en' => 'Mechanical Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 13,
                'name' => [
                    'fa' => 'مهندسی عمران',
                    'en' => 'Civil Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 14,
                'name' => [
                    'fa' => 'مهندسی معماری',
                    'en' => 'Architectural Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 15,
                'name' => [
                    'fa' => 'مهندسی کامپیوتر',
                    'en' => 'Computer Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 16,
                'name' => [
                    'fa' => 'مجموعه مهندسی برق',
                    'en' => 'Electrical Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 17,
                'name' => [
                    'fa' => 'روانشناسی',
                    'en' => 'Psychology'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' => 18,
                'name' => [
                    'fa' => 'ادبیات و زبان شناسی',
                    'en' => 'Literature & Linguistics'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>19,
                'name' => [
                    'fa' => 'مواد و متالوژی',
                    'en' => 'Materials Metallurgy'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>20,
                'name' => [
                    'fa' => 'فیزیک',
                    'en' => 'Physics'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>21,
                'name' => [
                    'fa' => 'مجموعه ریاضیات و آمار',
                    'en' => 'Mathematics & Statistics'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>22,
                'name' => [
                    'fa' => 'گردشگری',
                    'en' => 'Tourism'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>23,
                'name' => [
                    'fa' => 'کشاورزی',
                    'en' => 'Agriculture'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>24,
                'name' => [
                    'fa' => 'اقتصاد',
                    'en' => 'Economics'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>25,
                'name' => [
                    'fa' => 'تاریخ',
                    'en' => 'History'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>26,
                'name' => [
                    'fa' => 'اخبار',
                    'en' => 'News'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>27,
                'name' => [
                    'fa' => 'زمین شناسی و معدن',
                    'en' => 'Geology & Mine'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>28,
                'name' => [
                    'fa' => 'سیاسی و روابط بین الملل',
                    'en' => 'Political & International Relations'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>29,
                'name' => [
                    'fa' => 'صنایع غذایی',
                    'en' => 'Food Industry'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>30,
                'name' => [
                    'fa' => 'جامعه شناسی و علوم اجتماعی',
                    'en' => 'Sociology Social Sciences'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>31,
                'name' => [
                    'fa' => 'فلسفه',
                    'en' => 'Philosophy'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>32,
                'name' => [
                    'fa' => 'هوافضا',
                    'en' => 'Aerospace'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>33,
                'name' => [
                    'fa' => 'مهندسی صنایع',
                    'en' => 'Industrial Engineering'
                ],
                'active' => 1,
                'percent' => 0
            ],
            [
                'id' =>34,
                'name' => [
                    'fa' => 'هنر',
                    'en' => 'Art'
                ],
                'active' => 1,
                'percent' => 0
            ],
        ];


        foreach ($categories as $item) {
            $category = Category::create([
                'id' => $item['id'],
                'active' => $item['active'],
                'title' => $item['name']['fa'],
            ]);

        }
    }
}
