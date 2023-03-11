<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HarvestResource;
use App\Models\Garden;
use App\Models\Harvest;
use App\Models\Plant;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
	public function list(Request $request)
	{
		$request->validate([
			'plant_uuid' => [ 'required', 'uuid' ]
		]);

		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('viewAny', [ Harvest::class, $plant ]);

		$harvests = Harvest::where('plant_uuid', $plant->uuid)->get();

		return HarvestResource::collection($harvests);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'plant_uuid' => [ 'required', 'uuid' ],
			'harvested_at' => [ 'required', 'date_format:Y-m-d\\TH:i:sP' ],
			'count' => [ 'required', 'numeric' ],
		]);

		/** @var Plant $plant */
		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('create', [ Harvest::class, $plant ]);

		$harvest = $plant->harvests()->create($validated);

		return HarvestResource::make($harvest);
	}


	public function show(Harvest $harvest)
	{
		return HarvestResource::make($harvest);
	}


	public function update(Request $request, Harvest $harvest)
	{
		$validated = $request->validate([
			'harvested_at' => [ 'required', 'date_format:Y-m-d\\TH:i:sP' ],
			'count' => [ 'required', 'numeric' ],
		]);

		/** @var Plant $plant */
		$plant = Plant::find($request->input('plant_uuid'));

		$this->authorize('create', [ Harvest::class, $plant ]);

		$harvest->update($validated);

		return HarvestResource::make($harvest);
	}


	public function destroy(Harvest $harvest)
	{
		$harvest->delete();

		return response()->noContent();
	}
}
