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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->bigInteger('id_petani')->unsigned(); // Foreign Key
            $table->string('jenis_pengajuan', 100);
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['dalam_proses', 'setuju', 'ditolak']);
            $table->text('keterangan');
            $table->foreign('id_petani')->references('id_petani')->on('petanis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
