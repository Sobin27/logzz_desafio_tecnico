<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('jwt')->group(function (){
    Route::prefix('user')->group(function () {
        Route::post('create', [UserController::class, 'createUser'])->withoutMiddleware('jwt');
        Route::put('update', [UserController::class, 'updateUser']);
    });
    Route::prefix('authentication')->group(function () {
        Route::post('login', [LoginController::class, 'login'])->withoutMiddleware('jwt');
    });
    Route::prefix('category')->group(function () {
        Route::post('create', [CategoryController::class, 'createCategory']);
        Route::put('update', [CategoryController::class, 'updateCategory']);
    });
    Route::prefix('products')->group(function () {
        Route::post('create', [ProductsController::class, 'createProducts']);
        Route::put('update', [ProductsController::class, 'updateProducts']);
        Route::delete('delete/{id}', [ProductsController::class, 'deleteProducts']);
        Route::get('list', [ProductsController::class, 'listProducts']);
    });
});
