<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('akun/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required',
            'kontak_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $user = new User([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'kontak_pelanggan' => $request->kontak_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'password' => Hash::make($request->password),

        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('akun/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email_pelanggan' => 'required',
            'password' => 'required',
        ]);
        // var_dump(Hash::make($request->password));
        // die();
        if (Auth::attempt(['email_pelanggan' => $request->email_pelanggan, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function pelanggan(){
        $pelanggan= User::all();
        return view('mimin/pelanggan')->with('pelanggan',$pelanggan);
    }

    public function edit_pelanggan($id){
        $pelanggan= User::find($id);
        return view('mimin/edit_pelanggan')->with('pelanggan',$pelanggan);
    }

    public function update_pelanggan(Request $request,$id){
        $request->validate([
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required',
            'kontak_pelanggan' => 'required',
            'alamat_pelanggan' => 'required'
        ]);
        $pelanggan= User::find($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'kontak_pelanggan' => $request->kontak_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan
        ]);
        return redirect()->route('pelanggan')->with('success','data have been save!');

    }

    public function hapus_pelanggan($id){
        $pelanggan= User::find($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan')->with('success','data have been delete!');
    }
}
