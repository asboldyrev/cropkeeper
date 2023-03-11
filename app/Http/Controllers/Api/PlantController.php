<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Models\Garden;
use App\Models\Plant;
use App\Models\Plot;
use App\Models\Seed;
use Illuminate\Http\Request;

class PlantController extends Controller
{
	public function list(Request $request)
	{
		$request->validate([
			'garden_uuid' => [ 'required', 'uuid' ],
			'plot_uuid' => [ 'nullable', 'uuid' ]
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$this->authorize('viewAny', [ Plant::class, $garden ]);

		$plot_uuid = $request->input('plot_uuid');

		$plots = $garden
			->plots()
			->when($plot_uuid, function($query) use ($plot_uuid) {
				return $query->where('uuid', $plot_uuid);
			})
			->get();

		$plants = Plant
			::whereHas('plot', function($query) use($plots) {
				return $query->whereIn('uuid', $plots->pluck('uuid'));
			})
			->get();

		return PlantResource::collection($plants);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'plot_uuid' => [ 'required', 'uuid' ],
			'seed_uuid' => [ 'required', 'uuid' ],
			'name' => [ 'required', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'is_seedling' => [ 'nullable', 'boolean' ],
			'is_transplanted' => [ 'nullable', 'boolean' ],
			'planted_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'harvested_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
		]);

		/** @var $plot $plot */
		$plot = Plot::find($request->input('plot_uuid'));

		$this->authorize('viewAny', [ Plant::class, $plot->garden()->first() ]);

		/** @var  $planting_method */
		$seed = Seed::find($request->input('seed_uuid'));

		$plant = new Plant($validated);
		$plant->plot()->associate($plot);
		$plant->seed()->associate($seed);
		$plant->save();

		return PlantResource::make($plant);
	}


	public function show(Plant $plant)
	{
		return PlantResource::make($plant);
	}


	public function update(Request $request, Plant $plant)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'is_seedling' => [ 'nullable', 'boolean' ],
			'is_transplanted' => [ 'nullable', 'boolean' ],
			'planted_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'harvested_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
		]);

		$plant->update($validated);

		return PlantResource::make($plant);
	}


	public function delete(Plant $plant)
	{
		$plant->delete();

		return response()->noContent();
	}
}
