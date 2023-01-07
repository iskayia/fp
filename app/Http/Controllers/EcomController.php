<?php

namespace App\Http\Controllers;

use App\Models\Ecom;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class EcomController extends Controller
{
    public function ecom(){
       $produk= Ecom::latest()->get();

        return view('ecom/e_index',['produk'=> $produk]);
    }

    public function ecom_request(Request $request){
        $request->validate([
            'id_produk'=> 'required|unique:produk',
            'nama_produk'=> 'required',
            'harga_produk'=>'required',
            'stok'=>'required',
            'gambar_produk'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        
    }

    public function tampil_jual(){
        $produk= Ecom::latest()->get();
        return view('ecom/tampilan_jual',['produk'=>$produk]);

    }

    public function beli(){
        return view('ecom/beli');
    }

    public function keranjang(){

        $keranjang= Keranjang::latest()
        ->join('produk','produk.id_produk','=', 'keranjang.id_produk')
        ->select('keranjang.*', 'produk.harga_produk','produk.nama_produk','produk.gambar_produk')
        ->where('keranjang.id_pelanggan',Auth::id())
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
