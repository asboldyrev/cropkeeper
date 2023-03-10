<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GardenResource;
use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GardenController
{
	public function list()
	{
		/** @var User $user */
		$user = Auth::user();

		return GardenResource::collection($user->gardens);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'name' => [ 'required', 'string' ],
			'description' => [ 'string' ],
			'polygon' => [ 'json' ],
			'area' => [ 'numeric' ],
		]);

		/** @var User $user */
		$user = Auth::user();
		$garden = $user->gardens()->create($validated, [ 'role' => 'owner' ]);

		return GardenResource::make($garden);
	}


	public function show(Garden $garden)
	{
		return GardenResource::make($garden);
	}


	public function update(Request $request, Garden $garden)
	{
		$garden->update($request->only([ 'name', 'description', 'polygon', 'area' ]));

		return GardenResource::make($garden);
	}


	public function delete(Garden $garden)
	{
		$garden->delete();

		return response()->noContent();
	}
}
