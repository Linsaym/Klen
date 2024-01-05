<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Продажи
Route::prefix('/sales')->group(base_path('routes/sections/sales.php'));
Route::prefix('/products')->group(base_path('routes/sections/products.php'));
Route::prefix('/tasks')->group(base_path('routes/sections/tasks.php'));
