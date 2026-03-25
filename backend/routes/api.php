<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::middleware('auth.check:admin')->group(function () {
        Route::post('/createcategorie', [CategoryController::class, 'create']);
        Route::post('/createproduct', [ProductController::class, 'create']);
        Route::put('/updateproduct', [ProductController::class, 'update']);
        Route::delete('/deleteproduct', [ProductController::class, 'delete']);
        Route::put('/updatecategorie', [CategoryController::class, 'update']);
        Route::delete('/deletecategorie', [CategoryController::class, 'delete']);
    });
});
