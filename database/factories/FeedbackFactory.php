<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ["pending", "accepted", "refused"];

        return [
            "pseudo" => $this->faker->name(1, true),
            "content" => $this->faker->sentences(2, true),
            "rating" => $this->faker->numberBetween(1, 5),
            "status" => Arr::random($statuses)
        ];
    }
}
