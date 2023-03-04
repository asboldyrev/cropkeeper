<?php

use App\Http\Controllers\Api\PlotController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route
	::middleware('auth:sanctum')
	->prefix('plots')
	->controller(PlotController::class)
	->group(function (Router $router) {

		$router->post('list', 'list');
		$router->post('store', 'store');
		$router->post('show/{plot}', 'show');
		$router->post('update/{plot}', 'update');
		$router->post('delete/{plot}', 'delete');

	});
