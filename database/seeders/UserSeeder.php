<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Raymond Youssef';
        $user->job_title = 'Software Engineer';
        $user->password = bcrypt('password');
        $user->email = 'rimonomega@gmail.com';
        $user->birth_date = '1997-11-05';
        $user->city = 'Alexandria';
        $user->country = 'Egypt';
        $user->phone = '01223555877';
        $user->role_id = 3;
        $user->save();

        User::factory()
            ->times(100)
            ->create();
    }
}
