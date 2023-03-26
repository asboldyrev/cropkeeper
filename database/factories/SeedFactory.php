<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seed>
 */
class SeedFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => fake()->words(2, true),
			'description' => fake()->text(100),
			'bought_at' => fake()->date(),
			'expiration_at' => fake()->date(),
			'count' => fake()->randomFloat(2, max: 2),
			'unit' => fake()->randomElement([ 'quantity', 'grams' ])
		];
	}
}
