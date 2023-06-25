<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPenjualan extends Model
{
    use HasFactory;
    protected $table = 'produk_penjualan';
    protected $primaryKey = 'id_produk_penjualan';
    protected $fillable = [
        'id_produk',
        'id_penjualan',
        'qty',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function penjualan() {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }
}
