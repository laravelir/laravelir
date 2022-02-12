<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'fa' => 'فارسی',
                'en' => 'Farsi',
            ],
            [
                'fa' => 'انگلیسی',
                'en' => 'English',
            ],
            [
                'fa' => 'فرانسوی',
                'en' => 'French',
            ],
            [
                'fa' => 'عربی',
                'en' => 'Arabic',
            ],
            [
                'fa' => 'چینی',
                'en' => 'Chinese',
            ],
        ];

        foreach ($languages as $item) {
            $laguage = resolve(Language::class);
            $laguage->title = $item;
            $laguage->save();
        }
    }
}
