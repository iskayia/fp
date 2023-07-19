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
        // if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/mimin');
        // }

        $credentials = $request->only('username', 'password');
        
            if (Auth::attempt($credentials)) {
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

    public function logout_adm(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login_adm');
    }

    // public function authenticate_admin(Request $request)
    // {   
    //     $request->validate([
    //         'email'=>'required|string',
    //         'password'=>'required|string'
    //     ]);
    //     $user = User::where('email', $request->email)->first();
        
    //     if($user != null) {
    //         if ($user->status == 0) {
    //             return redirect()
    //                 ->back()
    //                 ->withInput()
    //                 ->with([
    //                     'error' => 'akun belum aktif silakan hubungi admin Dapur Digital'
    //                 ]);
    //         }
    //         $credentials = $request->only('email', 'password');
        
    //         if (Auth::attempt($credentials)) {
    //             $request->session()->regenerate();
    //             return redirect('/');
    //         }
    //     }
    
    //     return redirect()
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'email atau Password salah'
    //             ]);
    // }
}
