<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('books')->group(
    function () {
        Route::post('/create', [BookController::class, 'create']);
    }
);
