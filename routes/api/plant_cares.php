<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('plant_cares')
	->controller(PlantCareController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{plantCare}', 'show')->middleware('can:view,plantCare');
		$router->post('update/{plantCare}', 'update')->middleware('can:update,plantCare');
		$router->post('delete/{plantCare}', 'delete')->middleware('can:delete,plantCare');

	});
