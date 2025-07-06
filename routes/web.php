<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman depan
Route::get('/', function () {
    return view('welcome');
});

// Auth bawaan Laravel UI
Auth::routes();

// Setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 🔒 Untuk pengguna biasa (user)
Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/riwayat', [CheckoutController::class, 'riwayat'])->name('checkout.riwayat');
});

// 🔐 Untuk admin (harus login + admin)
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::resource('barang', BarangController::class);
});
