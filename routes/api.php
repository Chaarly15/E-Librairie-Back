<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['api'])->group(
    function () {
        require __DIR__.'/Api/userRoutes.php';
        require __DIR__.'/Api/bookRoutes.php';
        require __DIR__.'/Api/loanRoutes.php';
    }
);
