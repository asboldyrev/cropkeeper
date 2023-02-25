<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController
{
	public function getToken(Request $request) {
		$device_name = $request->input('device_name', $request->header('user-agent'));

		$request->validate([
			'login' => 'required',
			'password' => 'required',
		]);

		$user = User::where('login', $request->login)->first();

		if (!$user || !Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				'login' => ['The provided credentials are incorrect.'],
			]);
		}

		return [
			'token' => $user->createToken($device_name)->plainTextToken
		];
	}


	public function checkToken(Request $request) {
		return response()->json([ 'check' => $request->user()->exists() ?? false ]);
	}


	public function forgetToken() {
		Auth::user()->currentAccessToken()->delete();

		return response()->json(null, 200);
	}


	public function forgotTokens() {
		Auth::user()->tokens()->delete();

		return response()->json(null, 200);
	}
}
