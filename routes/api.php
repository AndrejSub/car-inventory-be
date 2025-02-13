<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;


Route::get('/cars/filter', [CarController::class, 'filter']);
Route::apiResource('cars',CarController::class);
Route::apiResource('parts', PartController::class);

Route::get("/cars/{car}/parts",[CarController::class,'getCarParts']);




