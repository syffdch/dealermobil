<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MsCaraousel extends Migration
{

    public function up()
    {
        Schema::create('ms_caraousel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_caraousel');
    }
}
