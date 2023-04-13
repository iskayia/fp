<?php

namespace App\Http\Controllers;

use App\Models\Ecom;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MiminController extends Controller
{
    public function mimin(){
        return view('mimin/beranda');

    }

    public function data(){
        $produk= Ecom::latest()
        ->join('supplier','supplier.id_supplier','=','produk.id_supplier')
        ->select('produk.*','supplier.nama_supplier')
        ->get();
        return view('mimin/data')->with('produk',$produk);
    }

    public function add_data(){
        $supplier = Supplier::latest()->get();
        return view('mimin/add_data')->with('supplier',$supplier);
    
    }

    public function add_data_action(Request $request){
       
        $request->validate([
            'nama_produk'=>'required',
            'id_supplier'=>'required',
            'stok'=>'required',
            'harga_produk'=>'required',
            'gambar_produk'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $gambar  = 'FP-'.time().'.'.$request->gambar_produk->extension();

        $request->gambar_produk->move(public_path('gambar'), $gambar);

        $dataproduk = new Ecom([
            'nama_produk'=>$request->nama_produk, 
            'id_supplier'=>$request->id_supplier,
            'stok'=>$request->stok,
            'harga_produk'=>$request->harga_produk,
            'gambar_produk'=>$gambar
        ]);
        $dataproduk->save();

        return redirect()->route('data')->with('success','data have been save!');
    }
     
    public function pelanggan(){
        $pelanggan= User::all();
        return view('mimin/pelanggan')->with('pelanggan',$pelanggan);
    }
}
