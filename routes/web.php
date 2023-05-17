<?php

use App\Http\Controllers\miminController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SupplierController;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[EcomController::class, 'tampil_jual'])->name('index');
Route::get('beli',[EcomController::class, 'beli'])->name('beli');
Route::get('beli_langsung',[EcomController::class, 'beli_langsung'])->name('beli_langsung');
Route::get('keranjang',[EcomController::class, 'keranjang'])->name('keranjang');
Route::get('add_keranjang/{id}',[EcomController::class, 'add_keranjang'])->name('add_keranjang');
Route::get('ecom',[EcomController::class, 'ecom'])->name('ecom');

Route::get('register', [PelangganController::class, 'register'])->name('register');
Route::post('register', [PelangganController::class, 'register_action'])->name('register.action');
Route::get('login', [PelangganController::class, 'login'])->name('login');
Route::post('login', [PelangganController::class, 'login_action'])->name('login.action');
Route::get('logout', [PelangganController::class, 'logout'])->name('logout');
Route::get('pelanggan',[PelangganController::class, 'pelanggan'])->name('pelanggan');
Route::get('edit_pelanggan/{id}', [PelangganController::class,'edit_pelanggan'])->name('edit_pelanggan');
Route::put('update_pelanggan/{id}', [PelangganController::class,'update_pelanggan'])->name('update_pelanggan');
Route::get('hapus_pelanggan/{id}', [PelangganController::class,'hapus_pelanggan'])->name('hapus_pelanggan');

Route::get('mimin',[MiminController::class, 'mimin'])->name('mimin');
Route::get('data',[MiminController::class, 'data'])->name('data');
Route::get('add_data',[MiminController::class, 'add_data'])->name('add_data');
Route::post('add_data_action', [MiminController::class,'add_data_action'])->name('add_data_action');
Route::get('edit_data/{id}', [MiminController::class,'edit_data'])->name('edit_data');
Route::put('update_data/{id}', [MiminController::class,'update_data'])->name('update_data');
Route::get('hapus_data/{id}', [MiminController::class,'hapus_data'])->name('hapus_data');


Route::get('pembelian',[PembelianController::class, 'pembelian'])->name('pembelian');
Route::get('add_pembelian',[PembelianController::class, 'add_pembelian'])->name('add_pembelian');
Route::post('add_pembelian_action',[PembelianController::class, 'add_pembelian_action'])->name('add_pembelian_action');
Route::get('edit_pembelian/{id}', [PembelianController::class,'edit_pembelian'])->name('edit_pembelian');
Route::put('update_pembelian/{id}', [PembelianController::class,'update_pembelian'])->name('update_pembelian');
Route::get('hapus_pembelian/{id}', [PembelianController::class,'hapus_pembelian'])->name('hapus_pembelian');


Route::get('pengeluaran',[PengeluaranController::class, 'pengeluaran'])->name('pengeluaran');
Route::get('add_pengeluaran',[PengeluaranController::class, 'add_pengeluaran'])->name('add_pengeluaran');
Route::post('add_pengeluaran_action',[PengeluaranController::class, 'add_pengeluaran_action'])->name('add_pengeluaran_action');
Route::get('edit_pengeluaran/{id}', [PengeluaranController::class,'edit_pengeluaran'])->name('edit_pengeluaran');
Route::put('update_pengeluaran/{id}', [PengeluaranController::class,'update_pengeluaran'])->name('update_pengeluaran');
Route::get('hapus_pengeluaran/{id}', [PengeluaranController::class,'hapus_pengeluaran'])->name('hapus_pengeluaran');


Route::get('supplier',[SupplierController::class, 'supplier'])->name('supplier');
Route::get('add_supplier',[SupplierController::class, 'add_supplier'])->name('add_supplier');
Route::post('add_supplier_action',[SupplierController::class, 'add_supplier_action'])->name('add_supplier_action');
Route::get('edit_supplier/{id}', [SupplierController::class,'edit_supplier'])->name('edit_supplier');
Route::put('update_supplier/{id}', [SupplierController::class,'update_supplier'])->name('update_supplier');
Route::get('hapus_supplier/{id}', [SupplierController::class,'hapus_supplier'])->name('hapus_supplier');

Route::get('laporan',[LaporanController::class, 'laporan'])->name('laporan');



