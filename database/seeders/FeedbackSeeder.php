<?php

namespace Database\Seeders;

use App\Models\Feedback;

class FeedbackSeeder extends SeederProvider
{
    public function run(): void
    {
        Feedback::factory(5)->create();
    }
}



