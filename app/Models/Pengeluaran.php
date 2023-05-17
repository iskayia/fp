<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;


class Pengeluaran extends Model
{
    use HasFactory;
    protected $table='penjualan';
    protected $primaryKey='id_penjualan';
    protected $fillable=['id_produk','jumlah_penjualan','tgl_penjualan'];
    protected $dates=['tgl_penjualan'];
 
}
