<?php

namespace App\Http\Controllers;

use App\Models\Ecom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MiminController extends Controller
{
    public function mimin(){
        return view('mimin/header_mimin');
    }
    
}
