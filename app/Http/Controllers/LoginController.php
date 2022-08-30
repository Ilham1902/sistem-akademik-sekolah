<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function loginUser(Request $request)
    {
    # validate
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    # check if user exists on database
    # authenticate the user
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level === "admin") {
                # code...
                return redirect()->intended('/informasi');
            }
            if (Auth::user()->level === "guru") {
                # code...
                return redirect()->intended('/informasi_sekolah');
            }
            if (Auth::user()->level === "siswa") {
                # code...
                return redirect()->intended('/informasi_sekolah');
            }
        }
    # redirect
        return back()->with('loginError', 'Login Failed!');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}
