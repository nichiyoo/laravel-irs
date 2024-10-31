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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nim' => fake()->unique()->numerify('24060122######'),
            'semester' => fake()->numberBetween(3, 6),
            'ipk' => fake()->randomFloat(2, 3, 4),
            'ips' => fake()->randomFloat(2, 3, 4),
            'sks' => fake()->numberBetween(16, 24),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
