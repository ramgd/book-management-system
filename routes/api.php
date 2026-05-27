<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;

// Public API routes (No token needed)
Route::post('/auth/register', [AuthController::class, 'register']);
// Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Protected API routes (JWT token required)
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/auth/profile', [AuthController::class, 'profile']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    // Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    // Route::get('/books/{id}', [BookController::class, 'show']);
    // Route::put('/books/{id}', [BookController::class, 'update']);
    // Route::delete('/books/{id}', [BookController::class, 'destroy']);

        Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});