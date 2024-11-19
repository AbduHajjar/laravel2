<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Band>
 */
class BandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'genre' => $this->faker->randomElement(['rock', 'pop', 'jazz', 'metal', 'punk', 'blues']),
            'founded' => $this->faker->year,
            'active_till' => $this->faker->year,
        ];
    }
}
