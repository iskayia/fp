<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table ='alamat';
    protected $primaryKey='id_alamat';
    protected $fillable =['alamat','id_pelanggan'];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function penjualan() {
        return $this->hasMany(Penjualan::class, 'id_pelanggan');
    }
}
