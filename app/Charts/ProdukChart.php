<?php

namespace App\Charts;

use App\Models\Penjualan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProdukChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $produkChart= Penjualan::get();
        $data1=[
            $produkChart->where('Month(created_at)')->count(),

        ];
        $data2=[
            $produkChart->where('qty')->count(),
        ];

        $label=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"           
    ];
        return $this->chart->lineChart()
            ->setTitle('Penjualan')
            ->setSubtitle('ini')
            ->addData('data 1', $data1)
            ->addData('data 2', $data2)
            ->setXAxis($label);
    }
}
