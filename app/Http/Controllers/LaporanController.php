<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Carbon\Carbon;
class LaporanController extends Controller
{
    public function laporan(){
        return view('mimin/laporan');
    }

    public function buka_laporan(Request $request) {
        $tanggal = explode(' - ',$request->daterange);
        $startDate = Carbon::createFromFormat('d/m/Y',$tanggal[0]);
        $endDate = Carbon::createFromFormat('d/m/Y',$tanggal[1]);
        if($request->laporan=='pembelian'){
           
      
            $pembelian= Pembelian::latest()
            ->join('produk','produk.id_produk','=','pembelian.id_produk')
            ->select('pembelian.*','produk.nama_produk')
            ->whereBetween('pembelian.created_at', [$startDate, $endDate])
            ->get();
            return view('mimin/laporan_pembelian')->with('pembelian',$pembelian);

        } 
        return view('mimin/laporan');
    }

}
