<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'login' => fake()->word(),
			'email' => fake()->unique()->safeEmail(),
			'password' => 'password',
			'first_name' => fake()->firstName(),
			'last_name' => fake()->lastName(),
			'locale' => fake()->locale(),
			'email_verified_at' => now(),
			'remember_token' => Str::random(10),
		];
	}


	public function admin(): static {
		return $this->state(fn (array $attributes) => [
			'login' => 'admin',
			'email' => 'admin@admin.ru',
			'password' => '000000',
			'first_name' => 'Администратор',
			'locale' => 'ru'
		]);
	}


	public function unverified(): static
	{
		return $this->state(fn (array $attributes) => [
			'email_verified_at' => null,
		]);
	}
}
