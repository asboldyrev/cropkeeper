<?php

namespace App\Http\Controllers\Api;

use App\Actions\CheckUserAuth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
	public function list()
	{
		return response(status: 403);
	}


	public function store(Request $request)
	{
		return response(status: 403);
	}


	public function show(User $user, CheckUserAuth $checkUserAuth)
	{
		$checkUserAuth($user);

		return UserResource::make($user);
	}


	public function update(Request $request, User $user, CheckUserAuth $checkUserAuth)
	{
		$checkUserAuth($user);

		$user_data = $request->only(['login', 'password', 'first_name', 'last_name', 'locale']);
		$user->update($user_data);

		return UserResource::make($user);
	}


	public function delete(User $user)
	{
		return response(status: 403);
	}
}
