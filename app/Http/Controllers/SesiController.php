<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view(('auth.login'));
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
           'password' => 'required'
       ]);
       $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($infologin)) {
         if (Auth::user()->role == 'admin') {
              return redirect('/superadmin');
         } elseif (Auth::user()->role == 'user') {
            return redirect('/utama');
         }
    } else {
        return redirect('')->withErrors('email atau password salah')->withInput();
    }
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }

}
