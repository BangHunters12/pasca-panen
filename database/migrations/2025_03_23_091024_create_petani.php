<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('petani', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('password');
            $table->timestamps();
        });
    }        

    public function down()
    {
        Schema::dropIfExists('petani');
    }
};
