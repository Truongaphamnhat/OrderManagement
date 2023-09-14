<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        return view('frontend.loginuser.login');
    }

    public function postLogin(LoginUserRequest $request)
    {

        // dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' =>  $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('get.index');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('get_user.login');
    }
}
