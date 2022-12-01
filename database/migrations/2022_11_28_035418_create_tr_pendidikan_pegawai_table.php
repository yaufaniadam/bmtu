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
        Schema::create('tr_pendidikan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('pendidikan');
            $table->year('tahun');
            $table->string('file_ijazah');
            $table->string('nama_lembaga_pendidikan');
            $table->string('jurusan');
            $table->timestamps();
        });

        Schema::table('tr_pendidikan_pegawai', function (Blueprint $table) {
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
        Schema::dropIfExists('tr_pendidikan_pegawai');
    }
};
