<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey='id_pembayaran';
    protected $fillable=['id_jenis_pembayaran','status', 'id_penjualan', 'id_status_pembayaran', 'jumlah_pembayaran'];

    public function jenis_pembayaran() {
        return $this->belongsTo(JenisPembayaran::class, 'id_jenis_pembayaran'); 
    }

    public function penjualan() {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

   
}
