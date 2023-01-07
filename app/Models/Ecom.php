<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ecom extends Model
{
    use HasFactory;

    protected $table= 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable= ['nama_produk', 'harga_produk','gambar_produk'];



}
