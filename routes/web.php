<?php

use App\Http\Controllers\EcomController;
use App\Http\Controllers\PelangganController;
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

Route::get('register', [PelangganController::class, 'register'])->name('register');
Route::post('register', [PelangganController::class, 'register_action'])->name('register.action');
Route::get('login', [PelangganController::class, 'login'])->name('login');
Route::post('login', [PelangganController::class, 'login_action'])->name('login.action');
Route::get('logout', [PelangganController::class, 'logout'])->name('logout');

// Route::get('/jual', function(){
//     return view('tampilan_jual');
// });

Route::get('beli',[EcomController::class, 'beli'])->name('beli');
Route::get('beli_langsung',[EcomController::class, 'beli_langsung'])->name('beli_langsung');
Route::get('keranjang',[EcomController::class, 'keranjang'])->name('keranjang');
Route::get('add_keranjang/{id}',[EcomController::class, 'add_keranjang'])->name('add_keranjang');
Route::get('ecom',[EcomController::class, 'ecom'])->name('ecom');


