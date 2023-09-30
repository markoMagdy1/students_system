<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => fake()->name(),
            'code' => fake()->unique()->word,
            'date_of_birth' => fake()->date(),
            'email' =>fake()->unique()->safeEmail(),
            'level_id'=>rand(1, 4)
        ];
    }
}
