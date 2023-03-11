<?php

namespace App\Policies;

use App\Models\Plant;
use App\Models\PlantCare;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlantCarePolicy
{
	public function viewAny(User $user, Plant $plant): bool
	{
		$garden = $plant->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function view(User $user, PlantCare $plantCare): bool
	{
		$garden = $plantCare->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function create(User $user, Plant $plant): bool
	{
		$garden = $plant->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function update(User $user, PlantCare $plantCare): bool
	{
		$garden = $plantCare->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function delete(User $user, PlantCare $plantCare): bool
	{
		$garden = $plantCare->plant()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}
}
