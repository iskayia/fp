<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;


class Penjualan extends Model
{
    use HasFactory;
    protected $table='penjualan';
    protected $primaryKey='id_penjualan';
    protected $fillable=['id_alamat','id_pelanggan','tgl_penjualan', 'tipe_pengambilan','status_transaksi'];
    protected $dates=['tgl_penjualan'];

    public function produk_penjualan() {
        return $this->hasMany(ProdukPenjualan::class, 'id_penjualan');
    }

    public function pelanggan()  {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class, 'id_penjualan');
    }

    public function alamat() {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }

    public function courier(){
        return $this->belongsTo(Courier::class, 'courier_id');
    }
 
}
