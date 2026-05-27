<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\DashboardController;

// Guest routes - No authentication needed
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');



// Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');
// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');









Route::post('/register', [AuthController::class, 'handleRegister'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Web routes - Use session authentication (automatic after login)

Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
});