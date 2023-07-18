<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Courier;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\JenisPembayaran;
use App\Models\Komentar;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\ProdukPenjualan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Contracts\Service\Attribute\Required;
use DB;

class ProdukController extends Controller
{
   
    public function produk()
    {
        $produk = Produk::latest()->get();

        return view('ecom/e_index', ['produk' => $produk]);
    }

    public function detail_produk($id){
        $produk= Produk::findOrFail($id);
        $komentar =Komentar::where('id_produk', '=', $id)->get();
        return view('ecom/detail_produk',['produk'=>$produk,'komentar'=> $komentar]);
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
        foreach($produk as &$p){
            $rate = Komentar::where('id_produk', $p->id_produk)->avg('rate');
            $p->rate=!empty($rate) ? number_format($rate, 1) : 0;
        }
        return view('ecom/tampilan_jual', ['produk' => $produk]);
    }

    public function beli()
    {
        $keranjang = Keranjang::latest()
            ->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->get();
        $jenis_pembayaran = JenisPembayaran::latest()->get();
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());
        $couriers= Courier::latest()->get();

        return view('ecom/beli', ['keranjang' => $keranjang, 'jenis_pembayaran' => $jenis_pembayaran, 'pelanggan' => $pelanggan, 'couriers'=>$couriers]);
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
                $produk =Produk::find($k->id_produk);
                $produk->stok = $produk->stok - intval($k->jumlah);
                $produk->save();
            }

            Keranjang::where('id_pelanggan', $pelanggan->id_pelanggan)->delete();

            Pembayaran::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'status_pembayaran' =>'Menunggu Pembayaran', //belum lunas
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
        $jenis_pembayaran = JenisPembayaran::latest()->get();
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());
        $couriers= Courier::latest()->get();

        //cek jumlah beli produk apakah lebih dari stok produk
        if ($request->jumlah > $produk->stok) {
            return redirect()->route('beli_langsung')->with('gagal', 'Jumlah pesanan melebihi batas stok produk');
        }
        return view('ecom/beli_langsung', ['jumlah' => $jumlah, 'produk' => $produk, 'jenis_pembayaran' => $jenis_pembayaran, 'pelanggan' => $pelanggan, 'couriers'=>$couriers]);
    }

    public function bayar_langsung(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail(Auth::guard('pelanggan')->id());
        $request->validate([
            'id_produk' => 'required',
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
            $produk =Produk::find($request->id_produk);
            $produk->stok = $produk->stok - intval($request->jumlah);
            $produk->save();
            Pembayaran::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'status_pembayaran' => 'Menunggu Pembayaran',
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
        $gambar  = 'BB-'.time().'.'.$request->bukti_bayar->extension();
        $id_penjualan = $request->id_penjualan;

        $request->bukti_bayar->move(public_path('gambar'), $gambar);
        $pembayaran = Pembayaran::where('id_penjualan', '=', $id_penjualan)->first();
        $pembayaran->bukti_bayar=$gambar;
        $pembayaran->save();
        return redirect()->route('bayar', $id_penjualan)->with('success','data have been save!');
    }
    public function list_transaksi()
    {
        $penjualan = Penjualan::latest()->get();
        return view('ecom/list_transaksi', ['penjualan' => $penjualan]);
    }

    public function checkOngkir(Request $data)
    {
        $url = "https://api.biteship.com/v1/orders";
        $apiKey = env('BITESHIP_KEY');
        // var_dump($apiKey);
        $response = Http::withHeaders([
            "Authorization" => $apiKey,
            "Content-Type" => "application/json"
        ])->post($url, $data);

        // var_dump($data);

        // Handle the response
        if ($response->successful()) {
            $order = $response->json();
            // Process the order data
            $price = $order['price'];
            // ...
            // var_dump($order);die();
            // return response()->json([
            //     "success" => true,
            //     "price" => $price
            // ]);

            return $price;
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // var_dump($errorCode);
            // var_dump($errorMessage);die();
            // Handle the error
            // ...
            // return response()->json([
            //     "error" => $errorMessage
            // ], $errorCode);
            return 0;
        }
    }

    public function cari(Request $request){
        if($request->has('cari')){
            $produk= Produk::where('nama_produk','LIKE','%'.$request->cari.'%')->get();
        }else{
            $produk= Produk::All();
        }
        return view('ecom/tampilan_jual',['produk'=>$produk]);
    }

    public function komentar($id){
        $id_pelanggan = Auth::guard('pelanggan')->id();
        
        $produk_penjualan = ProdukPenjualan::where('id_penjualan', '=', $id)->get();
        foreach($produk_penjualan as &$produk){
            $komentar = Komentar::where('id_pelanggan','=',$id_pelanggan)
                        ->where('id_produk','=',$produk->id_produk)
                        ->where('id_penjualan','=',$produk->id_penjualan)->get();
            $produk['sudah_komen'] = count($komentar) > 0;
        }
        return view('ecom.komentar')->with('produk_penjualan', $produk_penjualan);
    }

    public function save_komentar(Request $request){
        $request->validate([
            'komentar'=>'required',
            'rate'=>'required',
        ]);
        $id_pelanggan = Auth::guard('pelanggan')->id();
        Komentar::create([
                'komentar'=>$request->komentar,
                'rate'=>$request->rate,
                'id_pelanggan'=>$id_pelanggan,
                'id_produk'=>$request->id_produk,
                'id_penjualan'=>$request->id_penjualan

        ]);
        return redirect()->route('komentar', $request->id_penjualan)->with('success','data have been save!');

    }

    public function filter(Request $request)
    {
        return view('ecom.tampilan_jual');
    }


}
