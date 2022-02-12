<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User::factory()->times(10)->create()->each(function ($user) {
        //     $user->profile()->update(UserProfile::factory()->make()->toArray());
        // });


        $user1 = User::create([
            'email' => 'iamalisafari@gmail.com',
            'password' => '375787777Ali',
            'mobile' => '09103982879',
            'is_admin' => true,
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);

        $user1->profile()->update([
            'fname' => 'علی',
            'lname' => 'صفری',
        ]);

        $user1->wallet()->update([
            'amount' => 50000000,
            'dollar_amount' => 200,
        ]);

        $user2 = User::create([
            'email' => 'milad.jafari6210@gmail.com',
            'password' => '!password!',
            'mobile' => '09376686365',
            'is_admin' => true,
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
        ]);

        $user2->profile()->update([
            'fname' => 'میلاد',
            'lname' => 'جعفری',
        ]);

        $user2->wallet()->update([
            'amount' => 50000000,
            'dollar_amount' => 200,
        ]);

        // factory(User::class, 10)->create()->each(function ($user) {
        //     $user->profile()->update(factory(UserProfile::class)->make()->toArray());
        //     $user->comments()->saveMany(factory(Comment::class,2)->make());
        // });
    }
}
