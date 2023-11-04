<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quota>
 */
class QuotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->domainName(),
            'quota' => fake()->numberBetween(10, 100),
            'start_date' => fake()->dateTimeInInterval('-2 month', '+1 month'),
            'end_date' => fake()->dateTimeInInterval('+2 month', '-1 month'),
            'status' => 'open',
        ];
    }
}
