<?php

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

Route::post('/otp',[\App\Http\Controllers\UserController::class,'sendMsg'])->name('login');
Route::post('/confirm',[\App\Http\Controllers\UserController::class,'confirmToken']);

//Route::middleware('auth:sanctum')->post('/login',[\App\Http\Controllers\UserController::class,'sendMsg']);
