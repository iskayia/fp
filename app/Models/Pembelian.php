<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table='pembelian';
    protected $key='id_pembelian';
    protected $fillable=['id_produk','tgl_pembelian','jumlah_pembelian','harga_pembelian'];
    protected $dates=['tgl_pembelian'];

}
