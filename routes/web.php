<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PetaniAuthController,
    PetaniController,
    ProduksiBerasController,
    PadiController,
    ProdukController,
    BeritaController,
    HomeController,
    PengajuanPadiController,
    PengajuanSewaController
};

// ===========================
// Public Routes
// ===========================
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');

// ===========================
// Authentication Routes
// ===========================
// Route::get('/login', [PetaniAuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [PetaniAuthController::class, 'login'])->name('loginPost');
// Route::get('/register', [PetaniAuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [PetaniAuthController::class, 'register']);
// Route::post('/logout', [PetaniAuthController::class, 'logout'])->name('logout');

// ===========================
// Admin Routes (with Middleware)
// ===========================
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    // Resourceful controllers
    // Route::resource('petani', PetaniAuthController::class)->names('petani');
    Route::resource('padi', PadiController::class)->names('padi');
    Route::resource('berita', BeritaController::class)->names('berita');
});

// ===========================
// Petani Routes (with Middleware)
// ===========================
Route::middleware(['petani'])->group(function () {
    // Penjualan Padi
    Route::get('/penjualan-padi', [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');

    // Pengajuan Sewa Alat
    Route::get('/pengajuan-sewa', [PengajuanSewaController::class, 'index'])->name('user.pengajuan_sewa.index');
    Route::post('/pengajuan-sewa', [PengajuanSewaController::class, 'store'])->name('user.pengajuan_sewa.store');
    Route::put('/pengajuan-sewa/{id}', [PengajuanSewaController::class, 'update'])->name('user.pengajuan_sewa.update');
    Route::delete('/pengajuan-sewa/{id}', [PengajuanSewaController::class, 'destroy'])->name('user.pengajuan_sewa.destroy');

    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('user.produk.index');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('user.produk.store');
    Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('user.produk.update');
    Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('user.produk.destroy');

    // Produksi Beras
    Route::get('/produksi-beras', [ProduksiBerasController::class, 'index'])->name('user.produksi_beras.index');
    Route::post('/produksi-beras', [ProduksiBerasController::class, 'store'])->name('user.produksi_beras.store');
    Route::put('/produksi-beras/{id}', [ProduksiBerasController::class, 'update'])->name('user.produksi_beras.update');
    Route::delete('/produksi-beras/{id}', [ProduksiBerasController::class, 'destroy'])->name('user.produksi_beras.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
