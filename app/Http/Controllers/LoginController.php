<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.login');
    }

    public function authenticate(Request $request):RedirectResponse
    {
        $credentials = $request->validate([ 
            'user' =>['required'], 
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){

        $request->session()->regenerate();
        return redirect()->intended('/');
    
        }
        return back()->with('LoginError','Login Gagal (user atau password salah)');
            
    }
    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
