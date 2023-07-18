<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $primaryKey='courier_id';
    protected $fillable=['courier_name', 'courier_service_name','courier_service_code','courier_code'];

    
}
