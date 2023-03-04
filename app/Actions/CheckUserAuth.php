<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserAuth
{
	public function __invoke(User $user): bool
	{
		if($user->uuid == Auth::user()->uuid) {
			return true;
		}

		abort(403, Response::$statusTexts[403]);
	}
}
