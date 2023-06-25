<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LaporanController extends Controller
{
    public function laporan(){
        return view('mimin/laporan');
    }

    public function buka_laporan(Request $request) {
        $tanggal = explode(' - ',$request->daterange);
        $startDate = Carbon::createFromFormat('m/d/Y',$tanggal[0])->toDateString();
        $endDate = Carbon::createFromFormat('m/d/Y',$tanggal[1])->toDateString();
        if($request->laporan=='pembelian'){
           
      
            $pembelian= Pembelian::latest()
            ->join('produk','produk.id_produk','=','pembelian.id_produk')
            ->select('pembelian.*','produk.nama_produk')
            ->whereBetween('pembelian.tgl_pembelian', [$startDate, $endDate])
            ->get();
            return view('mimin/laporan_pembelian')->with('pembelian',$pembelian);

        } elseif($request->laporan=='penjualan'){

            $penjualan= Penjualan::whereBetween('created_at', [$startDate, $endDate])
            ->get();
            return view('mimin/laporan_penjualan')->with('penjualan',$penjualan);
        }elseif($request->laporan=='keuangan'){

            $pembelian= Pembelian::latest()
            ->join('produk','produk.id_produk','=','pembelian.id_produk')
            ->select('pembelian.*','produk.nama_produk')
            ->whereBetween('pembelian.tgl_pembelian', [$startDate, $endDate])
            ->get();

            $penjualan= Penjualan::latest()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            $total_pembelian = 0;
            $total_penjualan = 0;
            $periode= date('d M Y', strtotime($startDate))." - ".date('d M Y', strtotime($endDate));

            foreach($pembelian as $p){
                $total_pembelian += intval($p->harga_pembelian)* intval($p->jumlah_pembelian);
                
            };
            foreach($penjualan as $p){
                $total_penjualan += intval($p->pembayaran->jumlah_pembayaran);
            }

            $laba_rugi = $total_penjualan - $total_pembelian;

            
            return view('mimin/laporan_keuangan')->with('total_pembelian',$total_pembelian)->with('total_penjualan',$total_penjualan)->with('laba_rugi',$laba_rugi)->with('periode',$periode);
        }
        return view('mimin/laporan');
    }

}
