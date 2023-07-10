<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{ 
    public function register()
    {
        $data['title'] = 'Register';
        return view('akun/register_adm', $data);
    }


    public function login_adm(){
        $data['title'] = 'Login ';
        return view('akun/login_adm', $data);
    }

    public function login_adm_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // var_dump(Hash::make($request->password));
        // die();
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/mimin');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function adm_profile(){
        $user= User::get();
        return view('mimin.adm_profile')->with('user',$user);
    }
}
