<?php

namespace Database\Seeders;

use App\Models\Freelancer;
use App\Models\FreelancerProfile;
use Illuminate\Database\Seeder;

class FreelancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Freelancer::factory()->times(5)->create()->each(function ($freelancer) {
            $freelancer->profile()->update(FreelancerProfile::factory()->make()->toArray());
        });


        $freelancer1 = Freelancer::create([
            'email' => 'iamalisafari@gmail.com',
            'password' => '375787777Ali',
            'mobile' => '09103982879',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);

        $freelancer1->profile()->update([
            'fname' => 'علی',
            'lname' => 'صفری',
        ]);

        $freelancer2 = Freelancer::create([
            'email' => 'milad.jafari6210@gmail.com',
            'password' => '!password!',
            'mobile' => '09376686365',
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);

        $freelancer2->profile()->update([
            'fname' => 'میلاد',
            'lname' => 'جعفری',
        ]);
    }
}
