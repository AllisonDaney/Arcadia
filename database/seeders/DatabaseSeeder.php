<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FeedbackSeeder::class,
            HomeSeeder::class,
            AnimalSeeder::class,
            ServiceSeeder::class,
            HourSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}



