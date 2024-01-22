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
        Schema::create('tanahs', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('id_user');
            $table->string('kategori');
            $table->string('type');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->integer('luas_tanah');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->string('ftanah1');
            $table->string('ftanah2');
            $table->string('ftanah3');
            $table->integer('harga');
            $table->string('deskripsi');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanahs');
    }
};
