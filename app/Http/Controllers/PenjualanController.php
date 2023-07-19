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
