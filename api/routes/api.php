<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"])->name("auth.login");
Route::post("/signup", [AuthController::class, "signup"])->name("auth.register");
Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");



Route::prefix('/')->group(function () {
    
    Route::resource('users', UserController::class)->except("create");

})->middleware("auth.sanctum");