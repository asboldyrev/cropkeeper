<?php

namespace Database\Seeders;

use App\Models\PlantingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantingMethodsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$methods = [
			'Грядка',
			'Куст',
			'Клумба',
			'Горшок',
		];

		foreach($methods as $method) {
			if(PlantingMethod::where('name', $method)->count() == 0) {
				PlantingMethod::create([ 'name' => $method ]);
			}
		}
	}
}
