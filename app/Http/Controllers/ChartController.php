<?php

namespace App\Http\Controllers;

use App\Charts\ProdukChart;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart(){
        $penjualan = Penjualan::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(qty) as total")
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->get();

    $labels = $penjualan->pluck('month');
    $totals = $penjualan->pluck('total');

    return view('mimin/beranda')->with('labels',$labels)->with('totals',$totals);
    }
}
