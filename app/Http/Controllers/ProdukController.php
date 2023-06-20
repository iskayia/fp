<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\JenisPembayaran;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ProdukController extends Controller
{
    public function produk(){
       $produk= Produk::latest()->get();

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
        $produk= Produk::latest()->get();
        return view('ecom/tampilan_jual',['produk'=>$produk]);

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
    public function beli(){
        $keranjang= Keranjang::latest()
        ->join('produk','produk.id_produk','=', 'keranjang.id_produk')
        ->select('keranjang.*', 'produk.harga_produk','produk.nama_produk','produk.gambar_produk')
        ->where('keranjang.id_pelanggan',Auth::id())
        ->get();

        $jenis_pembayaran= JenisPembayaran::latest()->get();

        return view('ecom/beli',['keranjang'=>$keranjang,'jenis_pembayaran'=>$jenis_pembayaran]);
    }

    public function beli_action(){
        $keranjang= Keranjang::latest()
        ->join('produk','produk.id_produk','=', 'keranjang.id_produk')
        ->select('keranjang.*', 'produk.harga_produk','produk.nama_produk','produk.gambar_produk')
        ->where('keranjang.id_pelanggan',Auth::id())
        ->get();
    }
    
    public function beli_langsung(Request $request){
        $id_produk= $request->id_produk;
        $jumlah=$request->jumlah;
        $produk= Produk::findOrfail($id_produk);
        $jenis_pembayaran= JenisPembayaran::latest()->get();
        $pelanggan= Auth::guard('pelanggan')->user();
        return view('ecom/beli_langsung',['jumlah'=>$jumlah,'produk'=>$produk,'jenis_pembayaran'=>$jenis_pembayaran,'pelanggan'=>$pelanggan]);
    }

    public function detail_transaksi(){
        return view('ecom/detail_transaksi');
    }

}
