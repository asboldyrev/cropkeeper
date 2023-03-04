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
		$router->post('show/{garden}', 'show');
		$router->post('update/{garden}', 'update');
		$router->post('delete/{garden}', 'delete');

	});
