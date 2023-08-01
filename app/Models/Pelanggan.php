<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pelanggan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'pelanggan';
    protected $primaryKey='id_pelanggan';
    protected $fillable= ['nama_pelanggan','email_pelanggan','kontak_pelanggan','password' ,'id_alamat'];

    public function alamat()
    {
        return $this->hasMany(Alamat::class, 'id_pelanggan');
    }

    public function penjualan() {
        return $this->hasMany(Penjualan::class, 'id_pelanggan');
    }
}
