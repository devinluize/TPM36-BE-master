<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/register",[AuthApiController::class,'Register']);
Route::post("/login",[AuthApiController::class,'Login']);

//book
//aku mau protect semua endpoint dibawah ini supaya gabisa diakses sama orang
//yang ga bawa token
//ada yang namanya grouping
//dia secara default akan otomatis balikin ke route yang namanya login kalau misalkan datanya gada

Route::get("/login",function (){
    return response()->json([
        'success'=>false,
        'message'=>"you are not login please login first"
    ]);
})->name('login');
//Route::post("/store",[BookApiController::class,'save'])->middleware('auth:api');

//Route::middleware(['auth:api'])->group(function () {
//    Route::post("/store",[BookApiController::class,'save']);
//    Route::get("/",[BookApiController::class,'index']);
//    Route::put("/update/{id}",[BookApiController::class,'update']);
//    Route::delete("/delete/{id}",[BookApiController::class,'delete']);
//});
//controller grouping
//Route::middleware('auth:api')->controller(BookApicontroller::class)->group(function () {
//    Route::post("/store",'save');
//    Route::get("/",'index');
//    Route::put("/update/{id}",'update');
//    Route::delete("/delete/{id}",'delete');
//});
//prefix
//misalkan didepan ini semua aku mau nambahin awalan library

Route::prefix('library')->middleware('auth:api')->controller(BookApicontroller::class)->group(function () {
    Route::post("/store",'save');
    Route::get("/",'index');
    Route::put("/update/{id}",'update');
    Route::delete("/delete/{id}",'delete');
});
