<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
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
			'is_seedling' => fake()->boolean(),
			'is_transplanted' => fake()->boolean(),
			'planted_at' => fake()->date(),
			'harvested_at' => fake()->date(),
		];
	}
}
