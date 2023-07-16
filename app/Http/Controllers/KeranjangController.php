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

    public function add_keranjang(Request $request){
        $keranjang = Keranjang::latest()
                        ->where('id_produk', $request->id_produk)
                        ->where('id_pelanggan', Auth::guard('pelanggan')->id())->first();
        if($keranjang == null){
            $keranjang=new Keranjang([
                'id_produk'=>$request->id_produk,
                'jumlah'=>$request->jumlah,
                'id_pelanggan'=>Auth::guard('pelanggan')->id()
            ]);
            $keranjang->save();
        }else{
            $keranjang->jumlah +=$request->jumlah;
            $keranjang->save(); 
        }
        return redirect('keranjang');
        
    }

    public function hapus_keranjang($id){
        $keranjang= Keranjang::findOrFail($id);
        $keranjang->delete();
        return redirect()->route('keranjang')->with('success','data berhasil dihapus!');
    }
}
