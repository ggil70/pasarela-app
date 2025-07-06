<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ZAPIValUserController;
use App\Http\Controllers\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('validateUser',[ZAPIValUserController::class,'validateUser'])->name('validateUser');

//Route::post('updateLogo',[ZAPIValUserController::class,'validateUser'])->name('validateUser');

//Route::post('generarToken',[UserController::class,'generarToken'])->name('generarToken');





