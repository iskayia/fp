<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $primaryKey= 'id_komentar';
    protected $fillable=['komentar', 'rate', 'id_produk', 'id_pelanggan','id_penjualan'];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
   }
}
