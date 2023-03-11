<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('harvests')
	->controller(HarvestController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{harvest}', 'show')->middleware('can:view,harvest');
		$router->post('update/{harvest}', 'update')->middleware('can:update,harvest');
		$router->post('delete/{harvest}', 'delete')->middleware('can:delete,harvest');

	});
