<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('books')->group(
    function () {

        Route::get('/', [BookController::class, 'read']);
        Route::post('/create', [BookController::class, 'create']);
    }
);
