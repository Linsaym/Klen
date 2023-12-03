<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [ProductController::class, "index"]);
    Route::post('/', [ProductController::class, "store"]);
});
