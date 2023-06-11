<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authanticate(Request $request)
    {

        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            Alert::success('Selamat', 'Anda sudah Login!');
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal! Silahkan coba lagi');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
        
        Alert::success('Anda Logout!');
        return redirect('/login');
    }
}