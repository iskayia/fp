<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    use HasFactory;

    protected $table= 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable= ['id_supplier','nama_produk','stok', 'harga_produk','gambar_produk','deskripsi', 'berat'];

    public function keranjang()  {
        return $this->hasMany(Keranjang::class, 'id_produk');
    }
}
