<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiminController extends Controller
{
    public function mimin(){
        return view('mimin/beranda');

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
            'gambar_produk'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $gambar  = 'FP-'.time().'.'.$request->gambar_produk->extension();

        $request->gambar_produk->move(public_path('gambar'), $gambar);

        $dataproduk = new Produk([
            'nama_produk'=>$request->nama_produk, 
            'id_supplier'=>$request->id_supplier,
            'stok'=>$request->stok,
            'harga_produk'=>$request->harga_produk,
            'gambar_produk'=>$gambar
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
            'gambar_produk'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
                    'gambar_produk'=>$gambar
                ]);
        } else{
            //update tanpa gambar 
            $produk->update([
                'nama_produk'=>$request->nama_produk, 
                'id_supplier'=>$request->id_supplier,
                'stok'=>$request->stok,
                'harga_produk'=>$request->harga_produk
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

}
