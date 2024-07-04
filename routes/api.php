<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get("/category", [CategoryController::class, "index"]);
Route::get("/category/{id}", [CategoryController::class, "show"]);
Route::get("/category/standalone/{id}", [CategoryController::class, "showStandalone"]);
Route::post("/category", [CategoryController::class, "createStandalone"]);
Route::post("/category/{id}", [CategoryController::class, "createLeaf"]);
Route::delete("/category/{id}", [CategoryController::class, "destroy"]);
