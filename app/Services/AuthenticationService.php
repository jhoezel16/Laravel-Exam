<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
class AuthenticationService
{
    public function authenticate($credentials, $request):array{
    $return  = ["success"=>false];
        $credentials["email"]  = config("exam.default_email");
       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $token = auth()->user()->createToken('internal-token')->plainTextToken;
            session(['api_token' => $token]);
           $return ["success"]=true;
        }
        return $return;
    }

    public function logout($request):void{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}