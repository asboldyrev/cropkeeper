<?php

namespace Database\Seeders;

use App\Models\Garden;
use App\Models\Harvest;
use App\Models\Plant;
use App\Models\PlantCare;
use App\Models\PlantingMethod;
use App\Models\Plot;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$user = User::factory()->admin()->create();
		$this->seed($user);

		$users = User::factory(2)->create();
		foreach($users as $user) {
			$this->seed($user);
		}
	}


	protected function seed(User $user) {
		$planting_method = PlantingMethod::first();

		$garden = Garden
			::factory(1)
			->hasAttached($user, [ 'role' => 'owner' ], 'users')
			->create();

		$plots = Plot
			::factory(2)
			->for($garden->random())
			->for($planting_method, 'plantingMethod')
			->create();

		$seeds = Seed::factory(5)->for($garden->random())->create();

		foreach($seeds as $seed) {
			$plants = Plant
				::factory(4)
				->for($seed)
				->for($plots->random(), 'plot')
				->for($garden->random())
				->create();

			foreach($plants as $plant) {
				Harvest
					::factory(2)
					->for($plant)
					->create();

				PlantCare
					::factory(3)
					->for($plant)
					->create();
			}
		}
	}
}
