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
        Schema::create('produksi_beras', function (Blueprint $table) {
            $table->id('id_produksi');
            $table->bigInteger('id_padi')->unsigned(); // Foreign Key
            $table->bigInteger('id_produk')->unsigned(); // Foreign Key
            $table->date('tanggal_produksi');
            $table->integer('jumlah_padi');
            $table->integer('jumlah_beras');
            $table->text('keterangan');
            $table->foreign('id_padi')->references('id_padi')->on('padis');
            $table->foreign('id_produk')->references('id_produk')->on('produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_beras_');
    }
};
