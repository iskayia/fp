<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Ecom;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function pengeluaran(){
        $penjualan= Pengeluaran::latest()
        ->join('produk','produk.id_produk','=','penjualan.id_produk')
        ->select('penjualan.*','produk.nama_produk')
        ->get();
        return view('mimin/pengeluaran')->with('penjualan',$penjualan);
    }

    public function add_pengeluaran(){
        $produk = Ecom::latest()->get();
        return view('mimin/add_pengeluaran')->with('produk',$produk);
    }

    public function add_pengeluaran_action(Request $request){
        $request->validate([
            'id_produk'=>'required',
            'jumlah_penjualan'=>'required',
            'tgl_penjualan'=>'required'
        ]);


        $databeli = new Pengeluaran([
            'id_produk'=>$request->id_produk,
            'jumlah_penjualan'=>$request->jumlah_penjualan,
            'tgl_penjualan'=>$request->tgl_penjualan
        ]);
        $databeli->save();

        $produk = Ecom::find($request->id_produk);
        $produk->stok = $produk->stok - intval($request->jumlah_penjualan);
        $produk->save();
        return redirect()->route('pengeluaran')->with('success','data have been save!');
    }
}
