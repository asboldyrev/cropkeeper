<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function() {
	Route::post('get-token', 'getToken');

	Route::middleware('auth:sanctum')->group(function() {
		Route::post('check-token', 'checkToken');
		Route::post('forget-token', 'forgetToken');
		Route::post('forgot-tokens', 'forgotTokens');
	});
});
