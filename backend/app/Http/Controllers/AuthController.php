<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate(['email' => 'required|email', 'password' => 'required|string', 'remember' => 'boolean']);

        $creadentials = ['email' => $fields['email'], 'password' => $fields['password']];
    
        if(!Auth::attempt($creadentials,$fields['remember'])){
            throw ValidationException::withMessages(['email' => ['The provided Creadentials are incorrect!'],]);
        }

        session()->regenerate();
        return response()->json(['message'=>'Successfully logged In','user'=>Auth::user()]);
    }

    public function logout(){
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerate();
        return response('Logged Out',204);
    }
}
