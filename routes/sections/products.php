<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//Продажи
Route::prefix('')->group(function () {
    Route::get('/', [ProductController::class, "index"]);
});
