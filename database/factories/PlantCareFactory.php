<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlantCare>
 */
class PlantCareFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'action' => fake()->words(asText: true),
			'comment' => fake()->text(100),
			'date' => fake()->date(),
		];
	}
}
