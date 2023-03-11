<?php

namespace App\Policies;

use App\Models\Garden;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlantPolicy
{
	public function viewAny(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function view(User $user, Plant $plant): bool
	{
		$garden = $plant->plot()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function create(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function update(User $user, Plant $plant): bool
	{
		$garden = $plant->plot()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function delete(User $user, Plant $plant): bool
	{
		$garden = $plant->plot()->first()->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}
}
