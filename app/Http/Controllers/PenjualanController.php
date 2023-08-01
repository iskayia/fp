<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\StatusPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function penjualan()
    {
        $penjualan = Penjualan::latest()->get();
        return view('mimin/penjualan')->with('penjualan', $penjualan);
    }

    public function edit_penjualan($id)
    {
        $penjualan = Penjualan::find($id);
        $produk = Produk::latest()->get();
        $pembayaran = Pembayaran::get();
        return view('mimin/edit_penjualan')->with('penjualan', $penjualan)->with('produk', $produk)->with('pembayaran', $pembayaran);
    }

    public function update_penjualan(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required',
            'status_transaksi' => 'required',
        ]);
        $penjualan = Penjualan::find($id);
        $penjualan->update([
            'status_transaksi' => $request->status_transaksi,
        ]);
        $query = "UPDATE pembayaran SET status_pembayaran = :status_pembayaran WHERE id_penjualan = :id";

        DB::statement($query, [$request->status_pembayaran, 'id' => $id]);

        return redirect()->route('penjualan')->with('success', 'data have been save!');
    }

    public function update_status_penjualan(Request $request){
        $transaction_status = $request->transaction_status;
        $order_id = $request->order_id;
        $parts = explode("-", $order_id);
        $id = $parts[0];
        $penjualan = Penjualan::findOrFail($id);
        $pembayaran = Pembayaran::findOrFail($penjualan->pembayaran->id_pembayaran);
        if($transaction_status == 'capture' || $transaction_status == 'settlement'){
            $pembayaran->status_pembayaran = 'Lunas';
            $pembayaran->save();
        } else if ($transaction_status == 'deny' || $transaction_status == 'expire' || $transaction_status == 'cancel') {
             //
             $penjualan->status_transaksi='Pesanan Dibatalkan';
             $penjualan->save();
        }

        $data = [
            'message' => 'success',
            'order_id' => $order_id
        ];
    
        return response()->json($data, 200);
    }

    public function hapus_penjualan($id)
    {
        $penjualan = Penjualan::find($id);
        $produk_before = Produk::find($penjualan->id_produk);
        $produk_before->stok = $produk_before->stok + intval($penjualan->jumlah_penjualan);
        $produk_before->save();
        $penjualan->delete();
        return redirect()->route('penjualan')->with('success', 'data have been delete!');
    }

    public function detail_penjualan($id)
    {
        $penjualan = Penjualan::find($id);
        return view('mimin/detail_penjualan')->with('penjualan', $penjualan);
    }
}
