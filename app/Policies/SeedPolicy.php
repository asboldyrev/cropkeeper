<?php

namespace App\Policies;

use App\Models\Garden;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SeedPolicy
{
	public function viewAny(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function view(User $user, Seed $seed): bool
	{
		$garden = $seed->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function create(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function update(User $user, Seed $seed): bool
	{
		$garden = $seed->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function delete(User $user, Seed $seed): bool
	{
		$garden = $seed->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}
}
