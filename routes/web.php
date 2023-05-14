<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get("/", [LoginController::class, 'showLoginForm'])->name("loginForm")->middleware("AuthCheck");
Route::post("/login", [LoginController::class, 'login'])->name('login')->middleware("AuthCheck");
//logout
Route::get("/logout", [HomeController::class, 'logout'])->name("logout");
Route::get("/home", [HomeController::class, 'index'])->name('home');
//category
Route::get("/get-category", [CategoryController::class, "index"])->name("category.index");
Route::get("/category", [CategoryController::class, "create"])->name("category.create");
Route::post("/category", [CategoryController::class, "store"])->name("category.store");
Route::post("/category-delete", [CategoryController::class, "destroy"])->name("category.destroy");
//tag
Route::get("/get-tag", [TagController::class, "index"])->name("tag.index");
Route::get("/tag", [TagController::class, "create"])->name("tag.create");
Route::post("/tag", [TagController::class, "store"])->name("tag.store");
Route::post("/tag-delete", [TagController::class, "destroy"])->name("tag.destroy");
