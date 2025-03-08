<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request) {
        $request->validate([
            'username'     =>'required',
            'password'  =>'required',
        ]);

        $data  = [
            'username'     =>$request->username,
            'password'     =>$request->password

        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else {
            return redirect()->route('login')->with('error','Username atau Password anda salah');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Proses logout

        // Invalidate dan regenerate session token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

}
