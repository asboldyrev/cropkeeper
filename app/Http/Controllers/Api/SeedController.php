<?php

namespace App\Http\Controllers\Api;

use App\Enums\SeedUnit;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeedResource;
use App\Models\Garden;
use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class SeedController extends Controller
{
	public function list(Request $request)
	{
		$request->validate([
			'garden_uuid' => [ 'required', 'uuid' ]
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$this->authorize('viewAny', [ Seed::class, $garden ]);

		return SeedResource::collection($garden->seeds);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'garden_uuid' => [ 'required', 'uuid' ],
			'name' => [ 'required', 'string' ],
			'manufacturer' => [ 'nullable', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'bought_at' => [ 'nullable', 'date_format:Y-m-d' ],
			'expiration_at' => [ 'nullable', 'date_format:Y-m-d' ],
			'count' => [ 'nullable', 'numeric' ],
			'unit' => [new Enum(SeedUnit::class)],
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$this->authorize('create', [ Seed::class, $garden ]);

		$seed = $garden->seeds()->create($validated);

		return SeedResource::make($seed);
	}


	public function show(Seed $seed)
	{
		return SeedResource::make($seed);
	}


	public function update(Request $request, Seed $seed)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'manufacturer' => [ 'nullable', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'bought_at' => [ 'nullable', 'date_format:Y-m-d' ],
			'expiration_at' => [ 'nullable', 'date_format:Y-m-d' ],
			'count' => [ 'nullable', 'numeric' ],
			'unit' => [new Enum(SeedUnit::class)],
		]);

		$seed->update($validated);

		return SeedResource::make($seed);
	}


	public function delete(Seed $seed)
	{
		$seed->delete();

		return response()->noContent();
	}
}
