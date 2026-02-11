<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post("/register","register");
    Route::post("/login","login");
});

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(ProfileController::class)->prefix('profile')->group(function(){
        Route::get('show','show');
        Route::patch('change_name','changeName');
        Route::patch('change_password','changePassword');
        Route::patch('logout','logout');
    });
    Route::apiResource('todos',TodoListController::class);
});