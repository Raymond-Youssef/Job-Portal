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
        $user->password = bcrypt('password');
        $user->email = 'rimonomega@gmail.com';
        $user->birth_date = '1997-11-05';
        $user->address = '4 Mahmoud El-Banna St, Sidi Beshr Bahry, Alexandria';
        $user->phone = '01223555877';
        $user->image_id = '1';
        $user->save();
    }
}
