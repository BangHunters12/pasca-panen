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
        Schema::create('padis', function (Blueprint $table) {
            $table->id('id_padi');
            $table->string('nama_padi');
            $table->string(column: 'warna');
            $table->string(column: 'bentuk');
            $table->string('tekstur');
            $table->decimal(column: 'harga');
            $table->integer('stok')->default(0)->change();
            $table->string(column: 'gambar');
            $table->string('satuan')->default('kg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padis');
    }
};
