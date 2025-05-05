<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_petani');
            $table->date('tanggal_transaksi');
            $table->decimal('harga', 10, 2);
            $table->integer('jumlah');
            $table->decimal('total', 10, 2);
            $table->enum('status',  ['Cicil', 'Hutang', 'Lunas']);
            $table->enum('jenis_transaksi', ['Beli Produk', 'Jual padi', 'Sewa', 'Giling Padi']);
            $table->enum('tipe_transaksi', ['Masuk', 'Keluar']);
            $table->string('keterangan');
            $table->foreign('id_petani')->references('id_petani')->on('petanis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
