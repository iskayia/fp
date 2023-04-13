<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Ecom;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian(){
        $pembelian= Pembelian::latest()
        ->join('produk','produk.id_produk','=','pembelian.id_produk')
        ->select('pembelian.*','produk.nama_produk')
        ->get();
        return view('mimin/pembelian')->with('pembelian',$pembelian);
    }

    public function add_pembelian(){
        $produk = Ecom::latest()->get();
        return view('mimin/add_pembelian')->with('produk',$produk);
    }

    public function add_pembelian_action(Request $request){
        $request->validate([
            'id_produk'=>'required',
            'jumlah_pembelian'=>'required',
            'harga_pembelian'=>'required',
            'tgl_pembelian'=>'required'
        ]);


        $databeli = new Pembelian([
            'id_produk'=>$request->id_produk,
            'jumlah_pembelian'=>$request->jumlah_pembelian,
            'harga_pembelian'=>$request->harga_pembelian,
            'tgl_pembelian'=>$request->tgl_pembelian
        ]);
        $databeli->save();

        $produk = Ecom::find($request->id_produk);
        $produk->stok = $produk->stok + intval($request->jumlah_pembelian);
        $produk->save();
        return redirect()->route('pembelian')->with('success','data have been save!');
    }
}
