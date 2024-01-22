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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('id_user');
            $table->string('kategori');
            $table->string('properti');
            $table->string('tipe');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->integer('ukuran')->default(0);
            $table->integer('jk_tidur')->default(0);
            $table->integer('jk_mandi')->default(0);;
            $table->integer('luas_tanah')->default(0);;
            $table->integer('luas_bangun')->default(0);;
            $table->integer('harga');
            $table->string('frumah');
            $table->string('ftamu')->nullable();
            $table->string('ftidur')->nullable();
            $table->string('fdapur')->nullable();
            $table->string('fhalaman')->nullable();
            $table->string('fmandi')->nullable();
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
