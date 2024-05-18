<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        return redirect('/utama');
    }
    public function register() {
        return view('auth.register');
    }
    public function create(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
        'email_verified_at' => $request->email_verified_at,
        'remember_token' => '123456',
        'created_at' => $request->created_at,
        'updated_at' => $request->updated_at
    ]);
    return redirect('/login');
}

}
