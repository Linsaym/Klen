<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;


//Продажи
Route::prefix('')->group(function () {
    Route::get('/', [SaleController::class, "index"]);
    Route::post('/', [SaleController::class, "store"]);
});
