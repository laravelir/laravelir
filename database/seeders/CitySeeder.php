<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = include 'cities.php';
        foreach ($cities as $data) {
            \App\Models\City::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'province_id' => $data['province_id'],
            ]);
        }
    }
}
