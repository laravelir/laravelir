<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {

        $user1 = User::create([
            'email' => 'testuser@gmail.com',
            'username' => 'testuser',
            'password' => '12344321',
            'mobile' => '',
            'is_admin' => false,
        ]);

        $user1->profile()->update([
            'fname' => 'کاربر',
            'lname' => 'تست',
        ]);

        $user1->metas()->update([
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'email' => 'miladimos@gmail.com',
            'username' => 'miladimos',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $user2->profile()->update([
            'fname' => 'کاربر',
            'lname' => 'میلادیموس',
        ]);

        $user2->metas()->update([
            'email_verified_at' => now(),
        ]);


        // factory(User::class, 10)->create()->each(function ($user) {
        //     $user->profile()->update(factory(UserProfile::class)->make()->toArray());
        //     $user->comments()->saveMany(factory(Comment::class,2)->make());
        // });
    }
}
