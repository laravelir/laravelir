<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = collect(['php', 'laravel', 'programming', 'فلاتر', 'dart', 'برنامه نویسی']);

        $tags->each(function ($item) {
            Tag::create(['title' => $item]);
        });
    }
}
