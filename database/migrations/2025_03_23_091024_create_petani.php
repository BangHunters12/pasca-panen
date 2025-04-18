<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('petani', function (Blueprint $table) {
            $table->id('id_petani'); // Primary key
            $table->string('nama_petani', 100);
            $table->text('alamat_petani');
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('no_hp', 20);
            $table->enum('level', ['prepetani', 'petani', 'admin'])->default('prepetani'); // Status petani
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('petani');
    }
};
