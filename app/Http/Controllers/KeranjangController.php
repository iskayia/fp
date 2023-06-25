<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function keranjang(){

        $keranjang= Keranjang::latest()
        ->join('produk','produk.id_produk','=', 'keranjang.id_produk')
        ->select('keranjang.*', 'produk.harga_produk','produk.nama_produk','produk.gambar_produk')
        ->where('keranjang.id_pelanggan',Auth::guard('pelanggan')->id())
        ->get();
        return view('ecom/keranjang',['keranjang'=>$keranjang]);
       
    }

    public function add_keranjang($id){
        $keranjang = Keranjang::latest()
                        ->where('id_produk', $id)
                        ->where('id_pelanggan', Auth::id())->first();
        if($keranjang == null){
            $keranjang=new Keranjang([
                'id_produk'=>$id,
                'jumlah'=>1,
                'id_pelanggan'=>Auth::id()
            ]);
            $keranjang->save();
        }else{
            $keranjang->jumlah +=1;
            $keranjang->save(); 
        }
        return redirect('keranjang');
        
    }
}
