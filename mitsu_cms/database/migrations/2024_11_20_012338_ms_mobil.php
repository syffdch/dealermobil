<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsMobil extends Migration
{
    public function up()
    {
        Schema::create('ms_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->integer('tipe_mobil_id');
            $table->string('transmisi')->nullable();
            $table->string('mesin')->nullable();
            $table->enum('bahan_bakar', ['bensin', 'diesel', 'listrik'])->nullable();
            $table->integer('kursi')->nullable;
            $table->string('warna')->nullable;
            $table->text('deskripsi');
            $table->json('gambar'); //pake dropzone
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_mobil');
    }
}
