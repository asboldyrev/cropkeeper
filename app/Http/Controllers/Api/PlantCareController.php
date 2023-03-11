<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantCareResource;
use App\Models\Plant;
use App\Models\PlantCare;
use Illuminate\Http\Request;

class PlantCareController extends Controller
{
	public function list(Request $request)
	{
		$request->validate([
			'plant_uuid' => [ 'required', 'uuid' ]
		]);

		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('viewAny', [ PlantCare::class, $plant ]);

		$plant_cares = PlantCare::where('plant_uuid', $plant->uuid)->get();

		return PlantCareResource::collection($plant_cares);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'plant_uuid' => [ 'required', 'uuid' ],
			'action' => [ 'required', 'string' ],
			'comment' => [ 'nullable', 'uuid' ],
			'date' => [ 'required', 'date_format:Y-m-d\\TH:i:sP' ],
		]);

		/** @var Plant $plant */
		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('create', [ PlantCare::class, $plant ]);

		$plant_care = $plant->plantCares()->create($validated);

		return PlantCareResource::make($plant_care);
	}


	public function show(PlantCare $plantCare)
	{
		return PlantCareResource::make($plantCare);
	}


	public function update(Request $request, PlantCare $plantCare)
	{
		$validated = $request->validate([
			'action' => [ 'required', 'string' ],
			'comment' => [ 'nullable', 'uuid' ],
			'date' => [ 'required', 'date_format:Y-m-d\\TH:i:sP' ],
		]);

		/** @var Plant $plant */
		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('create', [ PlantCare::class, $plant ]);

		$plantCare->update($validated);

		return PlantCareResource::make($plantCare);
	}


	public function delete(PlantCare $plantCare)
	{
		$plantCare->delete();

		return response()->noContent();
	}
}
