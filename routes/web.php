<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::get('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
Route::put('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');