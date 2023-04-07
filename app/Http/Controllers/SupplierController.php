<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplier(){
        $supplier= Supplier::all();
        return view('mimin/supplier')->with('supplier',$supplier);
    }

    public function add_supplier(){
        return view('mimin/add_supplier');
    }
}
