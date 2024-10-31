<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $choices = self::getNameChoices();

        return [
            'code' => fake()->unique()->regexify('PAIK[0-9]{4}[A-D]'),
            'name' => fake()->randomElement($choices),
            'sks' => fake()->numberBetween(2, 4),
            'day' => fake()->numberBetween(1, 7),
            'room' => fake()->regexify('RE[0-4]{3}'),
            'teacher' => fake()->name(),
        ];
    }

    /**
     * Get Course name choices.
     *
     * @return array<string>
     */
    public function getNameChoices(): array
    {
        return [
            'Logika Informatika',
            'Bahasa Inggris',
            'Dasar Pemrograman',
            'Olahraga',
            'Kalkulus',
            'Desain Jaringan',
            'Rancangan Perangkat Lunak',
            'Sistem Operasi',
            'Kecerdasan Buatan'
        ];
    }
}
