<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registrar>
 */
class RegistrarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'photo' => fake()->imageUrl(),
            'name' => fake()->name(),
            'nim' => fake()->unique()->regexify('[0-9]{11}'),
            'nik' => fake()->unique()->regexify('[0-9]{16}'),
            'pob' => fake()->city(),
            'dob' => fake()->date(),
            'doe' => fake()->dateTimeInInterval('-4 years', 'now'),
            'dop' => fake()->dateTimeInInterval('+6 months', 'now'),
            'faculty' => 'Sains dan Teknologi',
            'study_program' => 'Sistem Informasi',
            'ipk' => fake()->numberBetween(1, 4),
            'gender' => fake()->randomElement(['male', 'female']),

            'munaqasyah' => fake()->imageUrl(),
            'school_certificate' => fake()->imageUrl(),
            'ktp' => fake()->imageUrl(),
            // 'kk' => fake()->imageUrl(),
            'spukt' => fake()->imageUrl(),
        ];
    }
}
