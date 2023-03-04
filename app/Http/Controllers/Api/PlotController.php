<?php

namespace App\Http\Controllers\Api;

use App\Actions\CheckUserAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlotResource;
use App\Models\Garden;
use App\Models\PlantingMethod;
use App\Models\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
	public function list(Request $request, CheckUserAuth $checkUserAuth)
	{
		$request->validate([
			'garden_uuid' => [ 'required', 'uuid' ]
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$checkUserAuth($garden->users()->get());

		return PlotResource::collection($garden->plots);
	}


	public function store(Request $request, CheckUserAuth $checkUserAuth)
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

		$checkUserAuth($garden->users()->get());

		/** @var PlantingMethod $planting_method */
		$planting_method = PlantingMethod::find($request->input('planting_method_uuid'));

		$plot = new Plot($validated);
		$plot->garden()->associate($garden);
		$plot->plantingMethod()->associate($planting_method);
		$plot->save();

		return PlotResource::make($plot);
	}


	public function show(Plot $plot, CheckUserAuth $checkUserAuth)
	{
		/** @var Garden $garden */
		$garden = $plot->garden()->first();

		$checkUserAuth($garden->users()->get());

		return PlotResource::make($plot);
	}


	public function update(Request $request, Plot $plot, CheckUserAuth $checkUserAuth)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'polygon' => [ 'nullable', 'json' ],
			'area' => [ 'nullable', 'numeric' ],
			'ph' => [ 'nullable', 'numeric' ],
		]);

		/** @var Garden $garden */
		$garden = $plot->garden()->first();

		$checkUserAuth($garden->users()->get());

		$plot->update($validated);

		return PlotResource::make($plot);
	}


	public function delete(Plot $plot, CheckUserAuth $checkUserAuth)
	{
		/** @var Garden $garden */
		$garden = $plot->garden()->first();

		$checkUserAuth($garden->users()->get());

		$garden->delete();

		return response()->noContent();
	}
}
