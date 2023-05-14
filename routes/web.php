<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get("/", [LoginController::class, 'showLoginForm'])->name("loginForm")->middleware("AuthCheck");
Route::post("/login", [LoginController::class, 'login'])->name('login')->middleware("AuthCheck");
Route::get("/home", [HomeController::class, 'index'])->name('home');

//category
Route::get("/category", [CategoryController::class, "create"])->name("category.index");