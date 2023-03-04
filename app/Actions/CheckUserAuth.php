<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserAuth
{
	public function __invoke(User|Collection $user): bool
	{
		if($user instanceof Collection) {
			foreach($user as $_user) {
				$this->check($_user);
			}

			return true;
		}

		return $this->check($user);
	}


	protected function check(User $user) {
		if($user->uuid == Auth::user()->uuid) {
			return true;
		}

		abort(403, Response::$statusTexts[403]);
	}
}
