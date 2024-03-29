<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('users')
	->controller(UserController::class)
	->group(function (Router $router) {

		$router->post('show/{user?}', 'show')->middleware('can:view,user');
		$router->post('update/{user?}', 'update')->middleware('can:update,user');

	});
