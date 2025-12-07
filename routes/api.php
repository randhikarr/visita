<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuseumController;

// Museum Resource Routes (RESTful)
Route::apiResource('museums', MuseumController::class);

// Statistics Route
Route::get('museums/statistics/all', [MuseumController::class, 'statistics']);