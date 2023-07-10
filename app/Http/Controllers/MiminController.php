<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiminController extends Controller
{
    public function mimin(){
        $produk= Produk::latest()->where('stok', '<', 10)->get();

        return view('mimin/beranda')->with('produk',$produk);

    }

    public function chart(){
        
    }

    public function data(){
        $produk= Produk::latest()
        ->join('supplier','supplier.id_supplier','=','produk.id_supplier')
        ->select('produk.*','supplier.nama_supplier')
        ->get();
        return view('mimin/data')->with('produk',$produk);
    }

    public function add_data(){
        $supplier = Supplier::latest()->get();
        return view('mimin/add_data')->with('supplier',$supplier);
    
    }

    public function add_data_action(Request $request){
       
        $request->validate([
            'nama_produk'=>'required',
            'id_supplier'=>'required',
            'stok'=>'required',
            'harga_produk'=>'required',
            'gambar_produk'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=>'required',
        ]);

        $gambar  = 'FP-'.time().'.'.$request->gambar_produk->extension();

        $request->gambar_produk->move(public_path('gambar'), $gambar);

        $dataproduk = new Produk([
            'nama_produk'=>$request->nama_produk, 
            'id_supplier'=>$request->id_supplier,
            'stok'=>$request->stok,
            'harga_produk'=>$request->harga_produk,
            'gambar_produk'=>$gambar,
            'deskripsi'=>$request->deskripsi
        ]);
        $dataproduk->save();

        return redirect()->route('data')->with('success','data have been save!');
    }
     
    public function edit_data($id){
        $produk=Produk::findOrFail($id);
        $supplier = Supplier::latest()->get();
        return view('mimin/edit_data')->with('produk',$produk)->with('supplier', $supplier);
    }

    public function update_data(Request $request, $id){
        //validasi form dulu
        $request->validate([
            'nama_produk'=>'required',
            'id_supplier'=>'required',
            'stok'=>'required',
            'harga_produk'=>'required',
            'gambar_produk'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'=>'required',
        ]);
        $produk = Produk::findOrFail($id);
        
        if (isset($request->gambar_produk)){
                //untuk upload gambar baru

                $gambar  = 'FP-'.time().'.'.$request->gambar_produk->extension();
                $request->gambar_produk->move(public_path('gambar'), $gambar);

                //update id dengan gambar baru
                if(file_exists(public_path('gambar') .'/'.$produk->gambar_produk)){
                    unlink(public_path('gambar') .'/'.$produk->gambar_produk);
                }

                $produk->update([
                    'nama_produk'=>$request->nama_produk, 
                    'id_supplier'=>$request->id_supplier,
                    'stok'=>$request->stok,
                    'harga_produk'=>$request->harga_produk,
                    'gambar_produk'=>$gambar,
                    'deskripsi'=>$request->deskripsi
                ]);
        } else{
            //update tanpa gambar 
            $produk->update([
                'nama_produk'=>$request->nama_produk, 
                'id_supplier'=>$request->id_supplier,
                'stok'=>$request->stok,
                'harga_produk'=>$request->harga_produk,
                'deskripsi'=>$request->deskripsi
            ]);
        }
        return redirect()->route('data')->with('success','data have been save!');
    }

    public function hapus_data($id){
        $produk=Produk::findOrFail($id);
        Storage::delete('public/gambar/'.$produk->gambar_produk);
        $produk->delete();
        return redirect()->route('data')->with('success','data berhasil dihapus!');
    }

    public function cari_adm(Request $request){
        if($request->has('cari_adm')){
            $produk= Produk::where('nama_produk','LIKE','%'.$request->cari_adm.'%')->get();
        }else{
            $produk= Produk::All();
        }
        return view('mimin/data',['produk'=>$produk]);
    }

    public function add_stok($id){
        $produk= Produk::findorFail($id);
        $namaproduk = $produk->nama_produk;
        return view('mimin/add_stok',['namaproduk'=>$namaproduk]);
    }


    public function add_stok_action(Request $request){
        $request->validate([
            'id_produk'=>'required',
            'jumlah_pembelian'=>'required',
            'harga_pembelian'=>'required',
            'tgl_pembelian'=>'required'
        ]);
        $pembelian= Pembelian::find('id_produk');
        $pembelian->update(
            [
            'id_produk'=>$request->id_produk,
            'jumlah_pembelian'=>$request->jumlah_pembelian,
            'harga_pembelian'=>$request->harga_pembelian,
            'tgl_pembelian'=>$request->tgl_pembelian
            ]
        );
        $produk = Produk::find($request->id_produk);
        $produk->stok = $produk->stok + intval($request->jumlah_pembelian);
        $produk->save();
        return redirect()->route('mimin')->with('success','data have been save!');
    }

}
