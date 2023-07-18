<?php

namespace App\Http\Controllers;


use App\Models\Alamat;
use App\Models\Pelanggan;
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
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $pelanggan = new Pelanggan([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'password' => Hash::make($request->password),

        ]);
        $pelanggan->save();

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
        if (Auth::guard('pelanggan')->attempt(['email_pelanggan' => $request->email_pelanggan, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function akun_saya(){
        $id_pelanggan = Auth::guard('pelanggan')->id();
        $daftar_alamat = Alamat::where('id_pelanggan', '=', $id_pelanggan)->get();
        return view('akun.akun_saya')->with('daftar_alamat', $daftar_alamat);
    }

    public function pelanggan(){
        $pelanggan= Pelanggan::all();
        return view('mimin/pelanggan')->with('pelanggan',$pelanggan);
    }

    public function edit_pelanggan($id){
        $pelanggan= Pelanggan::find($id);
        return view('mimin/edit_pelanggan')->with('pelanggan',$pelanggan);
    }

    public function update_pelanggan(Request $request,$id){
        $request->validate([
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required',
            'kontak_pelanggan' => 'required',
        ]);
        $pelanggan= Pelanggan::find($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'kontak_pelanggan' => $request->kontak_pelanggan,
        ]);
        return redirect()->route('pelanggan')->with('success','data have been save!');

    }

    public function hapus_pelanggan($id){
        $pelanggan= Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan')->with('success','data have been delete!');
    }
}
