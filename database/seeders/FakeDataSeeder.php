<?php

namespace Database\Seeders;

use App\Models\PlantingMethod;
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
		$user = User::first();
		$planting_method = PlantingMethod::first();

		// Garden
		$garden = $user->gardens()->create([
			"name" => "Основной огород",
			"description" => "тестовый огород",
			"area" => 12.5
		], [ 'role' => 'owner' ]);

		// Plot
		$plot = $garden->plots()->make([
			"name" => "Грядка 1",
			"area" => 5,
			"ph" => 7
		]);
		$plot->plantingMethod()->associate($planting_method);
		$plot->save();

		// Seed
		$seed = $garden->seeds()->create([
			"name" => "Семена",
			"count" => 10
		]);

		// Plant
		$plant = $plot->plants()->make([
			"name" => "Растение",
			"is_transplanted" => true,
		]);
		$plant->seed()->associate($seed);
		$plant->garden()->associate($garden);
		$plant->save();

		// Harvest
		$harvests = $plant->harvests()->create([
			"harvested_at" => "2004-02-12T15:19:21+00:00",
			"count" => 1.5
		]);


		// PlantCare
		$plant_care = $plant->plantCares()->create([
			"action" => "Уборка урожая",
			"date" => "2004-02-12T15:19:21+00:00"
		]);
	}
}
