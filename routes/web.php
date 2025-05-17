<?php

use App\Http\Controllers\ProfileController;
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
    // Route::resource('petani', PetaniAuthController::class)->names('petani');
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


// Route::get('/', [HomeController::class, 'index'])->name('beranda');
    // Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');
    Route::get('/penjualan-padi', action: [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');

// Route::prefix('/admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/penjualan-padi', [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');




Route::middleware(['auth', 'PetaniMiddleware'])->group(function () {
    Route::get('petani',function(){
    return view ('welcome');
        // Route::get('/penjualan-padi', action: [PengajuanPadiController::class, 'penjualanView'])->name('user.penjualan_padi.penjualanpadi');
        // Route::get('/', [HomeController::class, 'index'])->name('beranda');
        // Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.show');

    });


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
    Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    // Route::resource('admin/padi', PadiController::class)->names('padi');
});
    });

    // Route::get('/pengajuan-sewa', [PengajuanSewaController::class, 'index'])->name('user.pengajuan_sewa.index');
    // Route::post('/pengajuan-sewa', [PengajuanSewaController::class, 'store'])->name('user.pengajuan_sewa.store');
    // Route::put('/pengajuan-sewa/{id}', [PengajuanSewaController::class, 'update'])->name('user.pengajuan_sewa.update');
    // Route::delete('/pengajuan-sewa/{id}', [PengajuanSewaController::class, 'destroy'])->name('user.pengajuan_sewa.destroy');

    //     // Produk
    // Route::get('/produk', [ProdukController::class, 'index'])->name('user.produk.index');
    // Route::post('/produk/store', [ProdukController::class, 'store'])->name('user.produk.store');
    // Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('user.produk.update');
    // Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('user.produk.destroy');

    //     // Produksi Beras
    // Route::get('/produksi-beras', [ProduksiBerasController::class, 'index'])->name('user.produksi_beras.index');
    // Route::post('/produksi-beras', [ProduksiBerasController::class, 'store'])->name('user.produksi_beras.store');
    // Route::put('/produksi-beras/{id}', [ProduksiBerasController::class, 'update'])->name('user.produksi_beras.update');
    // Route::delete('/produksi-beras/{id}', [ProduksiBerasController::class, 'destroy'])->name('user.produksi_beras.destroy');

    //     // Resourceful controllers
    //     // Route::resource('petani', controller: PetaniAuthController::class)->names('petani');
    //     Route::resource('padi', PadiController::class)->names('padi');
    //     Route::resource('berita', BeritaController::class)->names('berita');
    // });

    require __DIR__ . '/auth.php';




    //     Route::prefix('/admin')->name('admin.')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('admin.dashboard');
    //     })->name('dashboard');

    //     Route::get('/penjualan-padi', function () {
    //         return view('admin.penjualan_padi');
    //     })->name('penjualan_padi');

    //     Route::get('/produk', function () {
    //         return view('admin.produk');
    //     })->name('produk');

    //     Route::get('/penyewaan', function () {
    //         return view('admin.penyewaan');
    //     })->name('penyewaan');

    //     Route::get('/pengiriman', function () {
    //         return view('admin.pengiriman');
    //     })->name('pengiriman');

    //     Route::get('/produksi_beras', function () {
    //         return view('admin.produksi_beras');
    //     })->name('produksi_beras');

    //     Route::get('/hutang', function () {
    //         return view('admin.hutang');
    //     })->name('hutang');

    //     Route::get('/laporan', function () {    
    //         return view('admin.laporan');
    //     })->name('laporan');

    //     Route::get('/pengaturan', function () {
    //         return view('admin.pengaturan');
    //     })->name('pengaturan');

    //     // Route::resource('petani', PetaniController::class)->names('petani');

    //     Route::resource('padi', PadiController::class)->names('padi');

    //     Route::resource('berita', BeritaController::class)->names('berita');
    // });

    //    Route::get('/alat_bajak', function () {
    //     return view('user.layanan.alatbajak');
    // });

    // Route::get('/alat_panen', function () {
    //     return view('user.layanan.alatpanen');
    // });

    // Route::get('/tenagatanam', function () {
    //     return view('user.layanan.tenagatanam');
    // });

    // Route::get('/petanibaru', function () {
    //     return view('user.layanan.petanibaru');
    // });

    // Route::post('/pengajuan/store', [PengajuanSewaController::class, 'store'])->name('pengajuan.store');
    
// });
