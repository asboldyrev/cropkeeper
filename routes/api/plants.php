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
		$router->post('show/{plant}', 'show')->middleware('can:view,plant');
		$router->post('update/{plant}', 'update')->middleware('can:update,plant');
		$router->post('delete/{plant}', 'delete')->middleware('can:delete,plant');

	});
