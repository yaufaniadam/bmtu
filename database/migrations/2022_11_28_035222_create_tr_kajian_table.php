<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_kajian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('faidah');
            $table->string('foto');
            $table->string('tanggal');
            $table->timestamps();
        });

        Schema::table('tr_kajian', function (Blueprint $table) {
            $table->foreign('id_pegawai')->references('id')->on('tr_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_kajian');
    }
};
