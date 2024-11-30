<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipeMobil extends Migration
{
    public function up()
    {
        Schema::create('tipe_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipe_mobil');
    }
}
