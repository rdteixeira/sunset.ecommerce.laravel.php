<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(HomeController::class)->prefix('')->group(function() {
    Route::get('home', 'index');
});

Route::apiResource('banner', BannerController::class);
Route::apiResource('product', ProductController::class);
