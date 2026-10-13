<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/vehicles',              [VehicleController::class, 'index']);
Route::post('/vehicles',             [VehicleController::class, 'store']);
Route::get('/vehicles/{vehicle}',    [VehicleController::class, 'show']);
Route::put('/vehicles/{vehicle}',    [VehicleController::class, 'update']);
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy']);