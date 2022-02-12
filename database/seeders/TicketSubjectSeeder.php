<?php

namespace Database\Seeders;

use App\Models\TicketSubject;
use Illuminate\Database\Seeder;

class TicketSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticketSubjects = array(
            array('id' => '1', 'title' => [
                'en' => 'Ticket to Manager',
                'fa' => 'ارتباط با مدیریت'
            ]),
            array('id' => '2', 'title' => [
                'en' => 'Financial Department',
                'fa' => 'بخش مالی'
            ]),
            array('id' => '3', 'title' => [
                'en' => 'Content Department',
                'fa' => 'دپارتمان محتوا'
            ]),
            array('id' => '4', 'title' => [
                'en' => 'SEO Department',
                'fa' => 'دپارتمان سئو'
            ]),
            array('id' => '5', 'title' => [
                'en' => 'Guest Post Department',
                'fa' => 'دپارتمان رپرتاژ آگهی'
            ]),
            array('id' => '6', 'title' => [
                'en' => 'Google Ads Department',
                'fa' => 'دپارتمان تبلیغات گوگل'
            ]),
            array('id' => '7', 'title' => [
                'en' => 'Technical Support',
                'fa' => 'پشتیبانی فنی'
            ]),
        );


        foreach ($ticketSubjects as $data) {
            $item = TicketSubject::create([
                'id' => $data['id'],
                'title' => $data['title'],
            ]);

            $item->title = [
                'en' => $data['title']['en'],
                'fa' => $data['title']['fa'],
            ];

            $item->save();
        }
    }
}
