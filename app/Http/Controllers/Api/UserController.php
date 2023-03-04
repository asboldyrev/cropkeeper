<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


	public function show(User $user)
	{
		if($user->uuid != Auth::user()->uuid) {
			return response(status: 403);
		}

		return UserResource::make($user);
	}


	public function update(Request $request, User $user)
	{
		if($user->uuid != Auth::user()->uuid) {
			return response(status: 403);
		}

		$user_data = $request->only(['login', 'password', 'first_name', 'last_name', 'locale']);
		$user->update($user_data);

		return UserResource::make($user);
	}


	public function delete(User $user)
	{
		return response(status: 403);
	}
}
