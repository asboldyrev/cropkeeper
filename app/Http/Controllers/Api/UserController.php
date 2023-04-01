<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
	public function show(User|null $user)
	{
		if(is_null($user)) {
			$user = Auth::user();
		}

		return UserResource::make($user);
	}


	public function update(Request $request, User|null $user)
	{
		if(is_null($user)) {
			/** @var User */
			$user = Auth::user();
		}

		$user_data = $request->only(['login', 'password', 'first_name', 'last_name', 'locale']);
		$user->update($user_data);

		return UserResource::make($user);
	}
}
