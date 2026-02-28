<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('loans')->group(
    function () {
        Route::get('/', [LoanController::class, 'index']);
        Route::post('/create', [LoanController::class, 'store']);
        Route::put('/update', [LoanController::class, 'update']);
        Route::get('/show', [LoanController::class, 'show']);
        Route::post('/delete', [LoanController::class, 'delete']);
    }
);
