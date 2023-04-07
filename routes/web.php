<?php

use App\Http\Controllers\miminController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SupplierController;
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

Route::get('pelanggan',[MiminController::class, 'pelanggan'])->name('pelanggan');
Route::get('mimin',[MiminController::class, 'mimin'])->name('mimin');
Route::get('data',[MiminController::class, 'data'])->name('data');
Route::get('add_data',[MiminController::class, 'add_data'])->name('add_data');
Route::post('add_data_action', [MiminController::class,'add_data_action'])->name('add_data_action');

Route::get('pembelian',[PembelianController::class, 'pembelian'])->name('pembelian');
Route::get('add_pembelian',[PembelianController::class, 'add_pembelian'])->name('add_pembelian');

Route::get('pengeluaran',[PengeluaranController::class, 'pengeluaran'])->name('pengeluaran');
Route::get('add_pengeluaran',[PengeluaranController::class, 'add_pengeluaran'])->name('add_pengeluaran');

Route::get('supplier',[SupplierController::class, 'supplier'])->name('supplier');
Route::get('add_supplier',[SupplierController::class, 'add_supplier'])->name('add_supplier');

Route::get('laporan',[LaporanController::class, 'laporan'])->name('laporan');



