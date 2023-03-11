<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('planting_methods')
	->controller(PlantingMethodController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');

	});
