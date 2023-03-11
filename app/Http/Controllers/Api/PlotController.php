<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlotResource;
use App\Models\Garden;
use App\Models\PlantingMethod;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
	public function list(Request $request)
	{
		$request->validate([
			'garden_uuid' => [ 'required', 'uuid' ]
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$this->authorize('viewAny', [ Plot::class, $garden ]);

		return PlotResource::collection($garden->plots);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'garden_uuid' => [ 'required', 'uuid' ],
			'planting_method_uuid' => [ 'required', 'uuid' ],
			'name' => [ 'required', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'polygon' => [ 'nullable', 'json' ],
			'area' => [ 'nullable', 'numeric' ],
			'ph' => [ 'nullable', 'numeric' ],
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$this->authorize('create', [ Plot::class, $garden ]);

		/** @var PlantingMethod $planting_method */
		$planting_method = PlantingMethod::find($request->input('planting_method_uuid'));

		$plot = new Plot($validated);
		$plot->garden()->associate($garden);
		$plot->plantingMethod()->associate($planting_method);
		$plot->save();

		return PlotResource::make($plot);
	}


	public function show(Plot $plot)
	{
		return PlotResource::make($plot);
	}


	public function update(Request $request, Plot $plot)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'polygon' => [ 'nullable', 'json' ],
			'area' => [ 'nullable', 'numeric' ],
			'ph' => [ 'nullable', 'numeric' ],
		]);

		$plot->update($validated);

		return PlotResource::make($plot);
	}


	public function delete(Plot $plot)
	{
		$plot->delete();

		return response()->noContent();
	}
}
