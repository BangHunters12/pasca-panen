<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaniController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\PetaniRegisterController;
use App\Http\Controllers\PadiController;
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

    Route::get('/penyewaan', function () {
        return view('admin.penyewaan');
    })->name('penyewaan');

    Route::get('/pengiriman', function () {
        return view('admin.pengiriman');
    })->name('pengiriman');

    Route::get('/produksi_beras', function () {
        return view('admin.produksi_beras');
    })->name('produksi_beras');

    Route::get('/hutang', function () {
        return view('admin.hutang');
    })->name('hutang');

    Route::get('/laporan', function () {    
        return view('admin.laporan');
    })->name('laporan');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');

    Route::resource('petani', PetaniController::class)->names('petani');
    
    Route::resource('padi', PadiController::class)->names('padi');

    Route::resource('berita', BeritaController::class)->names('berita');
});

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     Route::get('/register', [PetaniRegisterController::class, 'showForm'])->name('register');
//     Route::post('/register', [PetaniRegisterController::class, 'register']);
    
   Route::get('/alat_bajak', function () {
    return view('user.layanan.alatbajak');
});

Route::get('/alat_panen', function () {
    return view('user.layanan.alatpanen');
});

Route::get('/tenagatanam', function () {
    return view('user.layanan.tenagatanam');
});

Route::get('/petanibaru', function () {
    return view('user.layanan.petanibaru');
});

Route::post('/pengajuan/store', [PengajuanSewaController::class, 'store'])->name('pengajuan.store');

