<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\ProduksiBerasController;
use App\Http\Controllers\PadiController;
use App\Http\Controllers\ProdukController;

// user
Route::get('/', function () {
    return view(view: 'user.beranda');
})->name(name: 'beranda');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/penjualan-padi', function () {
        return view('admin.penjualan_padi');
    })->name('penjualan_padi');

    Route::get('/produk', function () {
        return view('admin.produk');
    })->name('produk');

    Route::get('/penyewaan', function () {
        return view('admin.penyewaan');
    })->name('penyewaan');

    Route::get('/pengiriman', function () {
        return view('admin.pengiriman');
    })->name('pengiriman');

    
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/produksi_beras', [ProduksiBerasController::class, 'index'])->name('produksi_beras'); // Alias pendek
    Route::post('/produksi_beras', [ProduksiBerasController::class, 'store'])->name('produksi_beras.store');
    Route::put('/produksi_beras/{id}', [ProduksiBerasController::class, 'update'])->name('produksi_beras.update');
    Route::delete('/produksi_beras/{id}', [ProduksiBerasController::class, 'destroy'])->name('produksi_beras.destroy');

    Route::get('/hutang', function () {
        return view('admin.hutang');
    })->name('hutang');

    Route::get('/laporan', function () {
        return view('admin.laporan');
    })->name('laporan');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');

    // Perbaikan resource petani
    Route::resource('petani', PetaniController::class)->names('petani');
    
    Route::resource('padi', PadiController::class)->names('padi');
});
