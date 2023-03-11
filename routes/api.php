<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

include_once base_path('routes/api/auth.php');
include_once base_path('routes/api/register.php');

include_once base_path('routes/api/users.php');
include_once base_path('routes/api/gardens.php');
include_once base_path('routes/api/plots.php');
include_once base_path('routes/api/planting_methods.php');
