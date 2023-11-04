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
            // 'photo' => fake()->imageUrl(),
            // 'name' => fake()->name(),
            'nim' => fake()->unique()->regexify('[0-9]{11}'),
            // 'email' => fake()->unique()->email(),
            'password' => 'student',
        ];
    }
}
