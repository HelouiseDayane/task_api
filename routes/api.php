<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExternalCatApiController;

Route::apiResource('tasks', TaskController::class);
Route::get('/cats/random', [ExternalCatApiController::class, 'fetchCat']);
