<?php
use Illuminate\Support\Facades\Route;

// Prefix untuk admin agar lebih rapi
Route::prefix('/')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/petani', function () {
        return view('admin.petani');
    })->name('admin.petani');

    Route::get('/penjualan-padi', function () {
        return view('admin.penjualan_padi');
    })->name('admin.penjualan_padi');

    Route::get('/produk', function () {
        return view('admin.produk');
    })->name('admin.produk');

    Route::get('/penyewaan', function () {
        return view('admin.penyewaan');
    })->name('admin.penyewaan');

    Route::get('/pengiriman', function () {
        return view('admin.pengiriman');
    })->name('admin.pengiriman');

    Route::get('/produksi-beras', function () {
        return view('admin.produksi_beras');
    })->name('admin.produksi_beras');

    Route::get('/laporan', function () {
        return view('admin.laporan');
    })->name('admin.laporan');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('admin.pengaturan');
});
