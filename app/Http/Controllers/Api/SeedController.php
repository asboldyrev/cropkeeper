<?php

namespace App\Http\Controllers\Api;

use App\Actions\CheckUserAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeedResource;
use App\Models\Garden;
use App\Models\Seed;
use Illuminate\Http\Request;

class SeedController extends Controller
{
	public function list(Request $request, CheckUserAuth $checkUserAuth)
	{
		$request->validate([
			'garden_uuid' => [ 'required', 'uuid' ]
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$checkUserAuth($garden->users()->get());

		return SeedResource::collection($garden->seeds);
	}


	public function store(Request $request, CheckUserAuth $checkUserAuth)
	{
		$validated = $request->validate([
			'garden_uuid' => [ 'required', 'uuid' ],
			'name' => [ 'required', 'string' ],
			'manufacturer' => [ 'nullable', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'bought_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'expiration_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'count' => [ 'nullable', 'numeric' ],
		]);

		/** @var Garden $garden */
		$garden = Garden::find($request->input('garden_uuid'));

		$checkUserAuth($garden->users()->get());

		$seed = $garden->seeds()->create($validated);

		return SeedResource::make($seed);
	}


	public function show(Seed $seed, CheckUserAuth $checkUserAuth)
	{
		/** @var Garden $garden */
		$garden = $seed->garden()->first();

		$checkUserAuth($garden->users()->get());

		return SeedResource::make($seed);
	}


	public function update(Request $request, Seed $seed, CheckUserAuth $checkUserAuth)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'manufacturer' => [ 'nullable', 'string' ],
			'description' => [ 'nullable', 'string' ],
			'bought_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'expiration_at' => [ 'nullable', 'date_format:Y-m-d\\TH:i:sP' ],
			'count' => [ 'nullable', 'numeric' ],
		]);

		/** @var Garden $garden */
		$garden = $seed->garden()->first();

		$checkUserAuth($garden->users()->get());

		$seed->update($validated);

		return SeedResource::make($seed);
	}


	public function delete(Seed $seed, CheckUserAuth $checkUserAuth)
	{
		/** @var Garden $garden */
		$garden = $seed->garden()->first();

		$checkUserAuth($garden->users()->get());

		$seed->delete();

		return response()->noContent();
	}
}
