<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\ProduksiBerasController;
use App\Http\Controllers\PadiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanPadiController;
use App\Http\Controllers\PengajuanSewaController;


// user
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');
Route::get('/penjualan-padi', [PengajuanPadiController::class, 'info'])->name('user.penjualan_padi.penjualanpadi');
Route::get('/penjualan-padi', [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');

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


Route::get('/pengajuan_sewa', [PengajuanSewaController::class, 'index'])->name('penyewaan');
Route::post('/pengajuan_sewa', [PengajuanSewaController::class, 'store'])->name('pengajuan_sewa.store');
Route::put('/pengajuan_sewa/{id}', [PengajuanSewaController::class, 'update'])->name('pengajuan_sewa.update');
Route::delete('/pengajuan_sewa/{id}', [PengajuanSewaController::class, 'destroy'])->name('pengajuan_sewa.destroy');


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

    Route::resource('berita', BeritaController::class)->names('berita');
});
