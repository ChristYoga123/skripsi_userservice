<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('course')->group(function()
{
    Route::prefix('auth')->group(function()
    {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::get('me', [AuthController::class, 'getUser']);
        Route::get('is-admin', [AuthController::class, 'isAdmin']);
    });
});
