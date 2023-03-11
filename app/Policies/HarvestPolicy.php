<?php

namespace App\Policies;

use App\Models\Harvest;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HarvestPolicy
{
	public function viewAny(User $user, Plant $plant): bool
	{
		$garden = $plant->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function view(User $user, Harvest $harvest): bool
	{
		$garden = $harvest->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function create(User $user, Plant $plant): bool
	{
		$garden = $plant->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function update(User $user, Harvest $harvest): bool
	{
		$garden = $harvest->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function delete(User $user, Harvest $harvest): bool
	{
		$garden = $harvest->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}
}
