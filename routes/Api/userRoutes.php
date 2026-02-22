<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(
    function () {
        Route::post('/login', [UserController::class, 'login']);
        Route::post('/register', [UserController::class, 'register']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::put('/update/{user}', [UserController::class, 'update']);
            Route::post('/logout', [UserController::class, 'logout']);
            Route::delete('/delete/{user}', [UserController::class, 'delete']);
        });

    }
);
