<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CommandeController;
use App\Http\Controllers\Api\CartController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::middleware('auth.check:admin')->group(function () {
        Route::post('/createcategorie', [CategoryController::class, 'create']);
        Route::post('/createproduct', [ProductController::class, 'create']);
        Route::put('/updateproduct', [ProductController::class, 'update']);
        Route::put('/updatecategorie', [CategoryController::class, 'update']);
        Route::delete('/deleteproduct', [ProductController::class, 'delete']);
        Route::delete('/deletecategorie', [CategoryController::class, 'delete']);
    });

    Route::middleware('auth.check:user')->group(function () {
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/passcommande', [CommandeController::class, 'passCommande']);
        Route::post('/addtocart', [CartController::class, 'addToCart']);
        Route::delete('/deletefromcart', [CartController::class, 'deleteFromCart']);
    });

});
