<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// user
Route::get('/', function () {
    return view(view: 'home'); // Mengarah ke resources/views/user/user.blade.php
})->name('home');

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

    Route::get('/jenis_padi', function () {
        return view('admin.jenis_padi');
    })->name('jenis_padi');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');

    // Route::get('/login', function () {
    //     return view('admin.login');
    // })->name('login');

    

    // Perbaikan resource petani
    Route::resource('petani', PetaniController::class)->names('petani');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);