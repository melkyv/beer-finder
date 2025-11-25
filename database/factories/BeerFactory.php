<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beer>
 */
class BeerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company().' Beer',
            'tagline' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'first_brewed_at' => fake()->date(),
            'abv' => fake()->randomFloat(1, 4, 10),
            'ibu' => fake()->numberBetween(20, 100),
            'ebc' => fake()->numberBetween(5, 40),
            'ph' => fake()->randomFloat(1, 4, 6),
            'volume' => fake()->randomElement([330, 500, 750]),
            'ingredients' => fake()->words(5, true),
            'brewer_tips' => fake()->sentence(),
        ];
    }
}
