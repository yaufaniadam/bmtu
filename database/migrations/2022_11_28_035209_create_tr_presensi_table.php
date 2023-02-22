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
        Schema::create('tr_presensi', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_pegawai');
            $table->string('nip')->nullable();
            $table->date('tanggal');
            $table->integer('bulan');
            $table->year('tahun');
            $table->string('jam_masuk')->nullable();
            $table->string('jam_pulang')->nullable();
            $table->string('hadir')->nullable();
            $table->string('terlambat')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        // Schema::table('tr_presensi', function (Blueprint $table) {
        //     $table->foreign('id_pegawai')->references('id')->on('tr_pegawai')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_presensi');
    }
};
