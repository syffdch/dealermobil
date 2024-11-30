<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DtMobil extends Migration
{
    public function up()
    {
        Schema::create('dt_mobil', function (Blueprint $table) {
            $table->id();
            $table->integer('ms_mobil_id');
            $table->string('seri_mobil');
            $table->text('deskripsi');
            $table->bigInteger('harga');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dt_mobil');
    }
}
