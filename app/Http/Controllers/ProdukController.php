<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\JenisPembayaran;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\ProdukPenjualan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ProdukController extends Controller
{
   
    public function produk()
    {
        $produk = Produk::latest()->get();

        return view('ecom/e_index', ['produk' => $produk]);
    }

    public function detail_produk($id){
        $produk= Produk::findOrFail($id);
        return view('ecom/detail_produk',['produk'=>$produk]);
    }

    public function ecom_request(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|unique:produk',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok' => 'required',
            'gambar_produk' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    }

    public function tampil_jual()
    {
        $produk = Produk::latest()->get();
        return view('ecom/tampilan_jual', ['produk' => $produk]);
    }

    public function beli()
    {
        $keranjang = Keranjang::latest()
            ->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $jenis_pembayaran = JenisPembayaran::latest()->get();
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());

        return view('ecom/beli', ['keranjang' => $keranjang, 'jenis_pembayaran' => $jenis_pembayaran, 'pelanggan' => $pelanggan]);
    }

    public function update_jumlah(Request $request) {
        $keranjang = Keranjang::findOrFail($request->id_keranjang);
        $keranjang->jumlah = $request->jumlah;
        $keranjang->save();
    }   

    public function beli_action(Request $request)
    {
        $keranjang = Keranjang::latest()
            ->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());
        $jumlah_pembayaran = 0;
        $request->validate([
            'id_alamat' => 'required',
            'id_jenis_pembayaran' => 'required',
            'tipe_pengambilan' => 'required',
        ]);
        $penjualan = Penjualan::create([
            'id_alamat' => $request->id_alamat,
            'tgl_penjualan' => date('Y-m-d'),
            'tipe_pengambilan' => $request->tipe_pengambilan,
            'id_pelanggan' => $pelanggan->id_pelanggan
        ]);

        if ($penjualan) {
            foreach ($keranjang as $k) {
                $jumlah_pembayaran += $k->jumlah * $k->produk->harga_produk;
                ProdukPenjualan::create([
                    'id_produk' => $k->id_produk,
                    'id_penjualan' => $penjualan->id_penjualan,
                    'qty' => $k->jumlah
                ]);
            }

            Keranjang::where('id_pelanggan', $pelanggan->id_pelanggan)->delete();

            Pembayaran::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'id_status_pembayaran' => 1, //belum lunas
                'id_jenis_pembayaran' => $request->id_jenis_pembayaran,
                'jumlah_pembayaran' => $jumlah_pembayaran
            ]);
        }

        return view('ecom/detail_transaksi', ['pelanggan' => $pelanggan, 'penjualan' => $penjualan]);
    }

    public function beli_langsung(Request $request)
    {
        $id_produk = $request->id_produk;
        $jumlah = $request->jumlah;
        $produk =Produk::find($id_produk);
        $produk->stok = $produk->stok - intval($jumlah);
        $produk->save();
        $jenis_pembayaran = JenisPembayaran::latest()->get();
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());

        //cek jumlah beli produk apakah lebih dari stok produk
        if ($request->jumlah > $produk->stok) {
            return redirect()->route('beli_langsung')->with('gagal', 'Jumlah pesanan melebihi batas stok produk');
        }
        return view('ecom/beli_langsung', ['jumlah' => $jumlah, 'produk' => $produk, 'jenis_pembayaran' => $jenis_pembayaran, 'pelanggan' => $pelanggan]);
    }

    public function bayar_langsung(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());
        $request->validate([
            'id_produk' => 'required',
            'id_alamat' => 'required',
            'jumlah' => 'required',
            'id_jenis_pembayaran' => 'required',
            'tipe_pengambilan' => 'required',
            'jumlah_pembayaran' => 'required',
        ]);
        $penjualan = Penjualan::create([
            'id_alamat' => $request->id_alamat,
            'tgl_penjualan' => date('Y-m-d'),
            'tipe_pengambilan' => $request->tipe_pengambilan,
            'id_pelanggan' => $pelanggan->id_pelanggan
        ]);

        if ($penjualan) {
            ProdukPenjualan::create([
                'id_produk' => $request->id_produk,
                'id_penjualan' => $penjualan->id_penjualan,
                'qty' => $request->jumlah
            ]);
            Pembayaran::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'status_pembayaran' => 'Menunggu Pembayaran','Lunas',
                'id_jenis_pembayaran' => $request->id_jenis_pembayaran,
                'jumlah_pembayaran' => $request->jumlah_pembayaran
            ]);
        }

        return view('ecom/detail_transaksi', ['pelanggan' => $pelanggan, 'penjualan' => $penjualan]);
    }

    public function detail_transaksi($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('ecom/detail_transaksi', ['penjualan' => $penjualan]);
    }

    public function bayar($id){
        $penjualan = Penjualan::findOrFail($id);
        return view('ecom/bayar', ['penjualan' => $penjualan]);
    }

    public function bayar_action(Request $request){
        $request->validate([
            'bukti_bayar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $gambar  = 'FP-'.time().'.'.$request->bukti_bayar->extension();

        $request->bukti_bayar->move(public_path('gambar'), $gambar);

        $pembayaran = new Pembayaran([
            
        ]);
        return redirect()->route('ecom/detail_transaksi')->with('success','data have been save!');
    }
    public function list_transaksi()
    {
        $penjualan = Penjualan::latest()->get();
        return view('ecom/list_transaksi', ['penjualan' => $penjualan]);
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $produk= Produk::where('nama_produk','LIKE','%'.$request->cari.'%')->get();
        }else{
            $produk= Produk::All();
        }
        return view('ecom/tampilan_jual',['produk'=>$produk]);
    }

    public function rate(){
        return view('ecom.tampilan_jual');
    }

    public function komentar(){
        return view('ecom.komentar');
    }

    public function filter(Request $request)
    {
       
    
        return view('ecom.tampilan_jual');
    }


}
