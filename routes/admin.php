<?php

Route::get("/admin",[App\Http\Controllers\WebController::class,"admin"]);



//admin
// hoa don
Route::group(['prefix'=>"ve"],function (){

    Route::get("/list",[\App\Http\Controllers\VeController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\VeController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\VeController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\VeController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\VeController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\VeController::class,"delete"]);
});
// users

Route::group(['prefix'=>"users"],function (){

    Route::get("/list",[\App\Http\Controllers\UsersController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\UsersController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\UsersController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\UsersController::class,"edit"]);
    Route::put("/edit/{users}",[\App\Http\Controllers\UsersController::class,"update"]);
    Route::delete("/delete/{users}",[\App\Http\Controllers\UsersController::class,"delete"]);
});

// lienhe

Route::group(['prefix'=>"lienhe"],function (){

    Route::get("/list",[\App\Http\Controllers\LienHeController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\LienHeController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\LienHeController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\LienHeController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\LienHeController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\LienHeController::class,"delete"]);
});

// cskh

Route::group(['prefix'=>"cskh"],function (){

    Route::get("/list",[\App\Http\Controllers\ChamSocKhachHangController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\ChamSocKhachHangController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\ChamSocKhachHangController::class,"create"]);
    Route::get("/edit/{iduser}",[\App\Http\Controllers\ChamSocKhachHangController::class,"edit"]);
    Route::put("/edit/{iduser}",[\App\Http\Controllers\ChamSocKhachHangController::class,"update"]);
    Route::delete("/delete/{iduser}",[\App\Http\Controllers\ChamSocKhachHangController::class,"delete"]);
});

//maybay
Route::group(['prefix'=>"maybay"],function (){
    Route::get("/list",[\App\Http\Controllers\MayBayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\MayBayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\MayBayController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\MayBayController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\MayBayController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\MayBayController::class,"delete"]);
});
//chuyenbay
Route::group(['prefix'=>"chuyenbay"],function (){
    Route::get("/list",[\App\Http\Controllers\ChuyenBayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\ChuyenBayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\ChuyenBayController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\ChuyenBayController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\ChuyenBayController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\ChuyenBayController::class,"delete"]);
});


//sanbay
Route::group(['prefix'=>"sanbay"],function (){
    Route::get("/list",[\App\Http\Controllers\SanBayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\SanBayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\SanBayController::class,"create"]);
    Route::get("/edit/{idsanbay}",[\App\Http\Controllers\SanBayController::class,"edit"]);
    Route::put("/edit/{idsanbay}",[\App\Http\Controllers\SanBayController::class,"update"]);
    Route::delete("/delete/{idsanbay}",[\App\Http\Controllers\SanBayController::class,"delete"]);
});
