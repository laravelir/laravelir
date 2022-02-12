<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run()
    {

        $skills = [
            [
                'id' => 1,
                'title' => 'تایپ ده‌انگشتی',
                'active' => 1,
                'parent_id' => 0,

            ],
            [
                'id' => 2,
                'title' => 'تسلط به سئو محتوا	',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 3,
                'title' => 'آشنایی مقدماتی با فتوشاپ',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 4,
                'title' => 'تسلط به انگلیسی',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 5,
                'title' => 'تحقیق کلمات کلیدی',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 6,
                'title' => 'آنالیز رقبا',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 7,
                'title' => 'جستجو',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 8,
                'title' => 'ویرایش متن',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 9,
                'title' => 'آشنایی با مفاهیم بازاریابی',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 10,
                'title' => 'تسلط به برنامه ریزی و مدیریت زمان',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 11,
                'title' => 'تدوین و رسانه',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 12,
                'title' => 'کد نویسی وب (CSS & HTML)',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 13,
                'title' => 'آشنایی با بر سیستم‌های مدیریت محتو',
                'active' => 1,
                'parent_id' => 0,
            ],
            [
                'id' => 14,
                'title' => 'تسلط بر وردپرس',
                'active' => 1,
                'parent_id' => 0,
            ],
        ];

        foreach ($skills as $category) {
            Skill::create([
                'id' => $category['id'],
                'title' => $category['title'],
                'parent_id' => $category['parent_id'],
                'active' => $category['active'],
            ]);
        }
    }
}
