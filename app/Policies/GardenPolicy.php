<?php

namespace App\Policies;

use App\Models\Garden;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GardenPolicy
{
	public function view(User $user, Garden $garden): bool
	{
		$uuids = $garden->users()->pluck('uuid')->toArray();

		return in_array($user->uuid, $uuids);
	}


	public function update(User $user, Garden $garden): bool
	{
		$uuids = $garden->users()->pluck('uuid')->toArray();

		return in_array($user->uuid, $uuids);
	}


	public function delete(User $user, Garden $garden): bool
	{
		$uuids = $garden->users()->pluck('uuid')->toArray();

		return in_array($user->uuid, $uuids);
	}
}
