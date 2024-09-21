<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
    Route::post('create', [UserController::class, 'createUser']);
    Route::put('update', [UserController::class, 'updateUser']);
});
Route::prefix('authentication')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});
Route::prefix('category')->group(function () {
    Route::post('create', [CategoryController::class, 'createCategory']);
    Route::put('update', [CategoryController::class, 'updateCategory']);
});
