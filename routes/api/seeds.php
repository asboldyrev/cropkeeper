<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('seeds')
	->controller(SeedController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{seed}', 'show')->middleware('can:view,seed');
		$router->post('update/{seed}', 'update')->middleware('can:update,seed');
		$router->post('delete/{seed}', 'delete')->middleware('can:delete,seed');

	});
