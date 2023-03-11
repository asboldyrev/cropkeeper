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
		$router->post('show/{seed}', 'show');
		$router->post('update/{seed}', 'update');
		$router->post('delete/{seed}', 'delete');

	});
