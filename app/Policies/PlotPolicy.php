<?php

namespace App\Policies;

use App\Models\Garden;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlotPolicy
{
	public function viewAny(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function view(User $user, Plot $plot): bool
	{
		$garden = $plot->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function create(User $user, Garden $garden): bool
	{
		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function update(User $user, Plot $plot): bool
	{
		$garden = $plot->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}


	public function delete(User $user, Plot $plot): bool
	{
		$garden = $plot->garden()->first();

		return $garden->users()->where('uuid', $user->uuid)->count();
	}
}
