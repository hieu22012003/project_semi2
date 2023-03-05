<?php

Route::get("/admin",[App\Http\Controllers\WebController::class,"admin"]);



//admin
// hoa don
Route::group(['prefix'=>"ve"],function (){

    Route::get("/list",[\App\Http\Controllers\HoadonController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\HoadonController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\HoadonController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\HoadonController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\HoadonController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\HoadonController::class,"delete"]);
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

    Route::get("/list",[\App\Http\Controllers\LienheController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\LienheController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\LienheController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\LienheController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\LienheController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\LienheController::class,"delete"]);
});

// chamsockhachhang

Route::group(['prefix'=>"chamsockhachhang"],function (){

    Route::get("/list",[\App\Http\Controllers\ChamsockhachhangController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\ChamsockhachhangController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\ChamsockhachhangController::class,"create"]);
    Route::get("/edit/{iduser}",[\App\Http\Controllers\ChamsockhachhangController::class,"edit"]);
    Route::put("/edit/{iduser}",[\App\Http\Controllers\ChamsockhachhangController::class,"update"]);
    Route::delete("/delete/{iduser}",[\App\Http\Controllers\ChamsockhachhangController::class,"delete"]);
});

//maybay
Route::group(['prefix'=>"maybay"],function (){
    Route::get("/list",[\App\Http\Controllers\MaybayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\MaybayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\MaybayController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\MaybayController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\MaybayController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\MaybayController::class,"delete"]);
});
//chuyenbay
Route::group(['prefix'=>"chuyenbay"],function (){
    Route::get("/list",[\App\Http\Controllers\ChuyenbayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\ChuyenbayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\ChuyenbayController::class,"create"]);
    Route::get("/edit/{id}",[\App\Http\Controllers\ChuyenbayController::class,"edit"]);
    Route::put("/edit/{id}",[\App\Http\Controllers\ChuyenbayController::class,"update"]);
    Route::delete("/delete/{id}",[\App\Http\Controllers\ChuyenbayController::class,"delete"]);
});


//sanbay
Route::group(['prefix'=>"sanbay"],function (){
    Route::get("/list",[\App\Http\Controllers\SanbayController::class,"all"]);
    Route::get("/create",[\App\Http\Controllers\SanbayController::class,"form"]);
    Route::post("/create",[\App\Http\Controllers\SanbayController::class,"create"]);
    Route::get("/edit/{idsanbay}",[\App\Http\Controllers\SanbayController::class,"edit"]);
    Route::put("/edit/{idsanbay}",[\App\Http\Controllers\SanbayController::class,"update"]);
    Route::delete("/delete/{idsanbay}",[\App\Http\Controllers\SanbayController::class,"delete"]);
});
