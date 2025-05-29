<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"])->name('auth.login');
Route::post("/signup", [AuthController::class, "signup"])->name('auth.register');
Route::get("/logout", [AuthController::class, "logout"]);