<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::factory()
            ->times(500)
            ->create();
    }
}
