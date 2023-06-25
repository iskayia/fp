<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
   protected $table='keranjang';
   protected $primaryKey='id_keranjang';
   protected $fillable=['id_produk','id_pelanggan', 'jumlah'];

   public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
   }

   public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
   }

}
