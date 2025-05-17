<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PetaniController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\PetaniRegisterController;
use App\Http\Controllers\PadiController;
// use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanPadiController;
// use App\Http\Controllers\PengajuanSewaController;
use App\Http\Controllers\PetaniAuthController;

// Admin - Protected by auth & role
// Route::prefix('/admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
//     // ... other admin views ...
    Route::resource('petani', PetaniAuthController::class)->names('petani');
//     Route::resource('padi', PadiController::class)->names('padi');
//     Route::resource('berita', BeritaController::class)->names('berita');
// });

// Public
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');
Route::get('/penjualan-padi', [HomeController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');


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


// Auth
Route::get('/login', [PetaniAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PetaniAuthController::class, 'login']);
Route::get('/register', [PetaniAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [PetaniAuthController::class, 'register']);
Route::post('/logout', [PetaniAuthController::class, 'logout'])->name('logout');

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

    Route::get('/pengajuan', [PengajuanPadiController::class, 'index'])->name('pengajuanpadi.index');
    Route::post('/pengajuan--', [PengajuanPadiController::class, 'store'])->name('pengajuanpadi.store');
    Route::put('/admin/pengajuan/{id_pengajuan}/status', [PengajuanPadiController::class, 'updateStatus'])->name('pengajuanpadi.updateStatus');

    // Route::resource('petani', PetaniController::class)->names('petani');
    
    Route::resource('padi', PadiController::class)->names('padi');

    Route::resource('berita', BeritaController::class)->names('berita');

    }); 
    
// Petani - Protected
Route::middleware(['auth', 'role:petani'])->group(function () {
 
}); 