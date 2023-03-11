<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantingMethodResource;
use App\Models\PlantingMethod;

class PlantingMethodController extends Controller
{
	public function list()
	{
		$planting_methods = PlantingMethod::orderBy('name')->get();

		return PlantingMethodResource::collection($planting_methods);
	}
}
