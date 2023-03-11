<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('plants')
	->controller(PlantController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{plant}', 'show');
		$router->post('update/{plant}', 'update');
		$router->post('delete/{plant}', 'delete');

	});
