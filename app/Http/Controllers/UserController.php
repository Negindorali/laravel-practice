<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $request)
    {
        if ($request){

            return view('form',["title"=>$request]);
        }
        else return view('welcome');
    }
}
