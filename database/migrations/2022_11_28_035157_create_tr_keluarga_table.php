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
        Schema::create('tr_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('nama');
            $table->string('status');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('bpjs')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->timestamps();
        });

        Schema::table('tr_keluarga', function (Blueprint $table) {
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
        Schema::dropIfExists('tr_keluarga');
    }
};
