<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = include 'cities.php';
        foreach ($cities as $data) {
            City::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'province_id' => $data['province_id'],
            ]);
        }
    }
}
