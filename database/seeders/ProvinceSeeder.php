<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = array(
            array('id' => '1', 'title' => 'آذربایجان شرقی', 'TelCode' => '041'),
            array('id' => '2', 'title' => 'آذربایجان غربی', 'TelCode' => '044'),
            array('id' => '3', 'title' => 'اردبیل', 'TelCode' => '045'),
            array('id' => '4', 'title' => 'اصفهان', 'TelCode' => '031'),
            array('id' => '5', 'title' => 'البرز', 'TelCode' => '026'),
            array('id' => '6', 'title' => 'ایلام', 'TelCode' => '084'),
            array('id' => '7', 'title' => 'بوشهر', 'TelCode' => '077'),
            array('id' => '8', 'title' => 'تهران', 'TelCode' => '021'),
            array('id' => '9', 'title' => 'چهارمحال و بختیاری', 'TelCode' => '038'),
            array('id' => '10', 'title' => 'خراسان جنوبی', 'TelCode' => '056'),
            array('id' => '11', 'title' => 'خراسان رضوی', 'TelCode' => '051'),
            array('id' => '12', 'title' => 'خراسان شمالی', 'TelCode' => '058'),
            array('id' => '13', 'title' => 'خوزستان', 'TelCode' => '061'),
            array('id' => '14', 'title' => 'زنجان', 'TelCode' => '024'),
            array('id' => '15', 'title' => 'سمنان', 'TelCode' => '023'),
            array('id' => '16', 'title' => 'سیستان و بلوچستان', 'TelCode' => '054'),
            array('id' => '17', 'title' => 'فارس', 'TelCode' => '071'),
            array('id' => '18', 'title' => 'قزوین', 'TelCode' => '028'),
            array('id' => '19', 'title' => 'قم', 'TelCode' => '025'),
            array('id' => '20', 'title' => 'کردستان', 'TelCode' => '087'),
            array('id' => '21', 'title' => 'کرمان', 'TelCode' => '034'),
            array('id' => '22', 'title' => 'کرمانشاه', 'TelCode' => '083'),
            array('id' => '23', 'title' => 'کهگیلویه و بویراحمد', 'TelCode' => '074'),
            array('id' => '24', 'title' => 'گلستان', 'TelCode' => '017'),
            array('id' => '25', 'title' => 'گیلان', 'TelCode' => '013'),
            array('id' => '26', 'title' => 'لرستان', 'TelCode' => '066'),
            array('id' => '27', 'title' => 'مازندران', 'TelCode' => '011'),
            array('id' => '28', 'title' => 'مرکزی', 'TelCode' => '086'),
            array('id' => '29', 'title' => 'هرمزگان', 'TelCode' => '076'),
            array('id' => '30', 'title' => 'همدان', 'TelCode' => '081'),
            array('id' => '31', 'title' => 'یزد', 'TelCode' => '035')
        );

        foreach ($provinces as $data) {
            \App\Models\Province::create([
                'id' => $data['id'],
                'title' => $data['title'],
                'code' => $data['TelCode'],
                'country_id' => 1,
            ]);
        }
    }
}
