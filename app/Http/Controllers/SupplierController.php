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

    public function add_supplier_action(Request $request){
        $request->validate([
            'nama_supplier'=>'required',
            'email_supplier'=>'required',
            'kontak_supplier'=>'required',
            'alamat_supplier'=>'required'
        ]);
        $datasupplier = new Supplier([
            'nama_supplier'=>$request->nama_supplier,
            'email_supplier'=>$request->email_supplier,
            'kontak_supplier'=>$request->kontak_supplier,
            'alamat_supplier'=>$request->alamat_supplier
        ]);
        $datasupplier->save();
        return redirect()->route('supplier')->with('success','data have been save!');
    }

    public function edit_supplier($id){
        $supplier= Supplier::find($id);
        return view('mimin/edit_supplier')->with('supplier',$supplier);
    }

    public function update_supplier(Request $request, $id){
        $request->validate([
            'nama_supplier'=>'required',
            'email_supplier'=>'required',
            'kontak_supplier'=>'required',
            'alamat_supplier'=>'required'
        ]);
        $supplier= Supplier::find($id);
        $supplier->update([
            'nama_supplier'=>$request->nama_supplier,
            'email_supplier'=>$request->email_supplier,
            'kontak_supplier'=>$request->kontak_supplier,
            'alamat_supplier'=>$request->alamat_supplier
        ]);
        return redirect()->route('supplier')->with('success','data have been save!');
    }

    public function hapus_supplier($id){
        $supplier= Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier')->with('success','data have been delete!');
    }
}
