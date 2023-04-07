<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian(){
        $pembelian= Pembelian::latest()
        ->join('produk','produk.id_produk','=','pembelian.id_pembelian')
        ->select('pembelian.*','produk.nama_produk')
        ->get();
        return view('mimin/pembelian')->with('pembelian',$pembelian);
    }

    public function add_pembelian(){
        return view('mimin/add_pembelian');
    }

}
