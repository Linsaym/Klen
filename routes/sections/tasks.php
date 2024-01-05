<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [TasksController::class, "index"]);
    Route::get('/{id}', [TasksController::class, "getOne"])->where('id', '[0-9]+');
});
