<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends SeederProvider
{
    public function run(): void
    {
        Feedback::factory(5)->create();
    }
}



