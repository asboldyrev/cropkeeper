<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('gardens')
	->controller(GardenController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{garden}', 'show')->middleware('can:view,garden');
		$router->post('update/{garden}', 'update')->middleware('can:update,garden');
		$router->post('delete/{garden}', 'delete')->middleware('can:delete,garden');

	});
