<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
	public function show(User $user)
	{
		return UserResource::make($user);
	}


	public function update(Request $request, User $user)
	{
		$user_data = $request->only(['login', 'password', 'first_name', 'last_name', 'locale']);
		$user->update($user_data);

		return UserResource::make($user);
	}
}
