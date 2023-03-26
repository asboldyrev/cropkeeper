<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plot>
 */
class PlotFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => fake()->words(asText: true),
			'description' => fake()->text(100),
			'area' => fake()->randomFloat(2, max: 3),
			'ph' => fake()->randomFloat(1, max: 14),
		];
	}
}
