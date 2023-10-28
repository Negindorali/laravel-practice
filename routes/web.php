<?php

use Illuminate\Support\Facades\Route;




Route::get('/create',function (\Illuminate\Http\Request $request){

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return response('your account created',200);
});

Route::get('/val',function (\Illuminate\Http\Request $request){
    $title  = $request->query->get('title');

    if ($title){

        return view('form',["title"=>$title]);
    }
    else return view('welcome');

});

Route::get('/showMe/{name}',[\App\Http\Controllers\UserController::class,'show']);
