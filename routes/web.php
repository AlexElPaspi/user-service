<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkrole:bibliotecario'])->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $books = Book::all();
        $users = User::all();
        return view('dashboard', compact('books', 'users'));
    })->middleware(['verified', 'checkrole:bibliotecario'])->name('dashboard');

    Route::get('/browse', function () {
        $books = Book::all();
        return view('browse', compact('books'));
    })->middleware('verified')->name('browse');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('login', function () {
        return redirect(auth()->user()->role === 'cliente' ? '/browse' : '/dashboard');
    });
});

require __DIR__.'/auth.php';
