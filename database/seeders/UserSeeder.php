<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Company;
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
        Applicant::factory()
            ->times(100)
            ->create();

        Company::factory()
            ->times(100)
            ->create();

        $user1 = new user();
        $user1->name = 'User';
        $user1->job_title = 'Software Engineer';
        $user1->password = bcrypt('password');
        $user1->email = 'user@webmaster.com';
        $user1->role_id = 1;
        $user1->save();

        $user2 = new User();
        $user2->name = 'Company';
        $user2->password = bcrypt('password');
        $user2->email = 'company@webmaster.com';
        $user2->role_id = 2;
        $user2->save();

        $user3 = new User();
        $user3->name = 'Admin';
        $user3->job_title = 'Admin';
        $user3->password = bcrypt('password');
        $user3->email = 'admin@webmaster.com';
        $user3->role_id = 3;
        $user3->save();

    }
}
