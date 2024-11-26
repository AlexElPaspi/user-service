<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Rutas de UserController
Route::apiResource('users', UserController::class);
