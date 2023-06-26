<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function penjualan(){
        $penjualan= Penjualan::latest()->get();
        return view('mimin/penjualan')->with('penjualan',$penjualan);
    }

    public function add_penjualan(){
        $produk = Produk::latest()->get();
        return view('mimin/add_penjualan')->with('produk',$produk);
    }

    public function add_penjualan_action(Request $request){
        $request->validate([
            'id_produk'=>'required',
            'jumlah_penjualan'=>'required',
            'tgl_penjualan'=>'required'
        ]);


        $databeli = new Penjualan([
            'id_produk'=>$request->id_produk,
            'jumlah_penjualan'=>$request->jumlah_penjualan,
            'tgl_penjualan'=>$request->tgl_penjualan
        ]);
        $databeli->save();

        $produk = Produk::find($request->id_produk);
        $produk->stok = $produk->stok - intval($request->jumlah_penjualan);
        $produk->save();
        return redirect()->route('penjualan')->with('success','data have been save!');
    }

    public function edit_penjualan($id){
        $penjualan= Penjualan::find($id);
        $produk= Produk::latest()->get();
        return view('mimin/edit_penjualan')->with('penjualan',$penjualan)->with('produk', $produk);
    }

    public function update_penjualan(Request $request,$id ){
        $request->validate([
            'id_produk'=>'required',
            'jumlah_penjualan'=>'required',
            'tgl_penjualan'=>'required'
        ]);
        $penjualan=Penjualan::find($id);
        $produk_before = Produk::find($penjualan->id_produk);
        $produk_before->stok = $produk_before->stok + intval($penjualan->jumlah_penjualan);
        $produk_before->save();
        $penjualan->update([
            'id_produk'=>$request->id_produk,
            'jumlah_penjualan'=>$request->jumlah_penjualan,
            'tgl_penjualan'=>$request->tgl_penjualan
        ]);
        $produk = Produk::find($request->id_produk);
        $produk->stok = $produk->stok - intval($request->jumlah_penjualan);
        $produk->save();
        return redirect()->route('penjualan')->with('success','data have been save!');

    }

    public function hapus_penjualan($id){
        $penjualan=Penjualan::find($id);
        $produk_before = Produk::find($penjualan->id_produk);
        $produk_before->stok = $produk_before->stok + intval($penjualan->jumlah_penjualan);
        $produk_before->save();
        $penjualan->delete();
        return redirect()->route('penjualan')->with('success','data have been delete!');

    }

    public function detail_penjualan($id){
        $penjualan=Penjualan::find($id);
        return view('mimin/detail_penjualan')->with('penjualan',$penjualan);
    }
}
