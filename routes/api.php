<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/otp',[UserController::class,'sendMsg'])->name('login');
Route::post('/confirm',[UserController::class,'confirmToken']);
Route::get('/getUser/{id}',[UserController::class,'getUser']);

Route::get('/users',[UserController::class,'allUser']);

//Route::middleware('auth:sanctum')->post('/login',[\App\Http\Controllers\UserController::class,'sendMsg']);
