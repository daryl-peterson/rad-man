<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NAS>
 */
class NASFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nasname' => fake()->ipv4(),
            'shortname' => fake()->unique()->word,
            'type' => 'cisco',
            'ports' => 0,
            'secret' => fake()->password(8),
        ];
    }
}
