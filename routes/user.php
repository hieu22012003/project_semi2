<?php
Route::get('/', function () {
    return view('welcome');
});

//nguoidung
Route::get("/usersPage/index",[App\Http\Controllers\UserController::class,"listChuyenbay"]);


Route::get("/usersPage/contract/{idchuyenbay}",[App\Http\Controllers\UserController::class,"form"]);
Route::post("/usersPage/contract1/",[App\Http\Controllers\UserController::class,"contract1"]);
Route::post("/usersPage/contract/",[App\Http\Controllers\UserController::class,"contract"]);


Route::get("/usersPage/about",[App\Http\Controllers\UserController::class,"about"]);
Route::get("/usersPage/blog",[App\Http\Controllers\UserController::class,"blog"]);
Route::get("/usersPage/blogDetail",[App\Http\Controllers\UserController::class,"blogDetail"]);
Route::get("/usersPage/book",[App\Http\Controllers\UserController::class,"book"])->middleware("auth");

Route::get("/usersPage/checkinOnline",[App\Http\Controllers\UserController::class,"checkinOnline"]);
Route::get("/usersPage/contact",[App\Http\Controllers\UserController::class,"contact"]);
Route::get("/usersPage/login",[App\Http\Controllers\UserController::class,"login"]);
Route::get("/usersPage/payment",[App\Http\Controllers\UserController::class,"payment"]);
Route::get("/usersPage/promotion",[App\Http\Controllers\UserController::class,"promotion"]);
Route::get("/usersPage/register",[App\Http\Controllers\UserController::class,"register"]);
