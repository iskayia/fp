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
    protected $fillable= ['nama_pelanggan','email_pelanggan','kontak_pelanggan','alamat_pelanggan','password'];
}