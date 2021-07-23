<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::resource("products",\App\Http\Controllers\productsController::class);
Route::get("products",[\App\Http\Controllers\productsController::class,'index']);
Route::get("products/{id}",[\App\Http\Controllers\productsController::class,'show']);
Route::get("products/search/{name}",[\App\Http\Controllers\productsController::class,'search']);
Route::post("register",[\App\Http\Controllers\authController::class,'register']);
Route::post("login",[\App\Http\Controllers\authController::class,'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']],function (){
    Route::post("logout",[\App\Http\Controllers\authController::class,'logout']);
    Route::delete("products/destroy/{id}",[\App\Http\Controllers\productsController::class,'destroy']);
    Route::put("products/update/{id}",[\App\Http\Controllers\productsController::class,'update']);
    Route::post("products",[\App\Http\Controllers\productsController::class,'store']);
});

//Route::middleware('auth:sanctum')->get('/products/search/{name}',[\App\Http\Controllers\productsController::class,'search']);
