<?php

namespace App\Http\Controllers;

use App\Models\Ecom;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\User;
use App\Models\Supplier;
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
        return view('mimin/add_data');
    }
    
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

    public function pelanggan(){
        $pelanggan= User::all();
        return view('mimin/pelanggan')->with('pelanggan',$pelanggan);
    }

    public function supplier(){
        $supplier= Supplier::all();
        return view('mimin/supplier')->with('supplier',$supplier);
    }

    public function add_supplier(){
        return view('mimin/add_supplier');
    }

    public function laporan(){
        return view('mimin/laporan');
    }
}
