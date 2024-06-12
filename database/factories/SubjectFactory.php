<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subjectcode' => $this->faker->unique()->randomNumber(8),
            'subjectname' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
        ];
    }
}
