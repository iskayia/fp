<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function pengeluaran(){
        $penjualan= Pengeluaran::latest()
        ->join('produk','produk.id_produk','=','penjualan.id_penjualan')
        ->select('penjualan.*','produk.nama_produk')
        ->get();
        return view('mimin/pengeluaran')->with('penjualan',$penjualan);
    }

    public function add_pengeluaran(){
        return view('mimin/add_pengeluaran');
    }
}
