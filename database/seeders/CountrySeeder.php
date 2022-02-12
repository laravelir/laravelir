<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('id' => '1', 'title' => 'ایران', 'TelCode' => '98', 'domain' => 'ir'),
            array('id' => '2', 'title' => 'افغانستان', 'TelCode' => '93', 'domain' => 'af'),
            array('id' => '3', 'title' => 'عراق', 'TelCode' => '964', 'domain' => 'iq'),
        );

        foreach ($countries as $data) {
            \App\Models\Country::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'code' => $data['TelCode'],
                'domain' => $data['domain'],
            ]);
        }
    }
}
