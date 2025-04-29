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
        Schema::create('giling_padis', function (Blueprint $table) {
            $table->id('id_giling');
            $table->bigInteger('id_petani')->unsigned(); // Foreign Key
            $table->bigInteger('id_padi')->unsigned(); // Foreign Key
            $table->date('tanggal_giling');
            $table->integer('jumlah_beras');
            $table->integer('jumlah_padi');
            $table->foreign('id_petani')->references('id_petani')->on('petanis');
            $table->foreign('id_padi')->references('id_padi')->on('padis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giling_padis');
    }
};
