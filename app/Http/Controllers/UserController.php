<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;

class UserController extends Controller
{

    public function sendMsg(Request $request)
    {
        $valid = $request->validate([
                User::PHONE=>['required','numeric']
        ]);

        $user=User::query()->updateOrCreate($valid,[
            User::OTP_CODE=>rand(1000,9999),
        ]);


        $this->sendSms($request->input(User::PHONE),$user->otp_code);
    }

    public function sendSms($phone,$rand)
    {
        $client = new \GuzzleHttp\Client();

        dd($rand);

        $result=$client->send(new \GuzzleHttp\Psr7\Request('GET','http://ippanel.com:8080'),[
            'query'=>[
                'fnum'=>'981000002365',
                'tnum'=>$phone,
                'pid'=>'rrc2bdz9g9xpzls',
                'apikey'=>'2vxdfguS-zpxy3DV5J3f1UlrEjwxDuy5AaVb-3hxIJE=',
                'p1'=>'verification-code',
                'v1'=>$rand
            ]
        ]);

        return $result->getBody()->getContents();
    }

    public function confirmToken(Request $request)
    {
       $request->validate([
           User::PHONE=> ['required','numeric'],
           User::OTP_CODE=> ['required','numeric'],
       ]);

        $user = User::query()->where([
            [User::PHONE , $request->input(User::PHONE)] ,
            [User::OTP_CODE , $request->input(User::OTP_CODE)] ,
        ])->firstOrFail();

        return $user->createToken('login')->plainTextToken;
    }
}
