<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSubjectSeeder extends Seeder
{

    public function run()
    {
        $contactSubject = array(
            array('id' => '1', 'title' => ' پیشنهاد'),
            array('id' => '2', 'title' => 'انتقاد'),
            array('id' => '3', 'title' => 'فنی'),
        );

        foreach ($contactSubject as $data) {
            \App\Models\ContactSubject::create([
                'id' => $data['id'],
                'title' => $data['title'],
            ]);
        }
    }
}
