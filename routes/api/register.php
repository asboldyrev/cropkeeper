<?php

use Illuminate\Support\Facades\Route;

Route::prefix('register')->controller(RegisterController::class)->group(function() {

	Route::post('register', 'register');

	Route::post('confirm', 'confirm');

	Route::post('reset-password', 'resetPassword');

});
