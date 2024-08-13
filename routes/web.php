<?php

use Core\Router\Web\Route;

Route::get("/", [\App\Http\Controllers\HomeControllers::class, 'index']);
Route::get("/users", [\App\Http\Controllers\UserControllers::class, 'index']);
Route::get("/create_user", [\App\Http\Controllers\UserControllers::class, 'create']);
Route::post("/store_user", [\App\Http\Controllers\UserControllers::class, 'store']);
Route::get("/edit_user/{id}", [\App\Http\Controllers\UserControllers::class, 'edit']);
Route::put("/update_user/{id}", [\App\Http\Controllers\UserControllers::class, 'update']);
Route::delete("/delete_user/{id}", [\App\Http\Controllers\UserControllers::class, 'delete']);

Route::get("/categories", [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get("/create_category", [\App\Http\Controllers\CategoryController::class, 'create']);
Route::get("/edit_category/{id}", [\App\Http\Controllers\CategoryController::class, 'edit']);
