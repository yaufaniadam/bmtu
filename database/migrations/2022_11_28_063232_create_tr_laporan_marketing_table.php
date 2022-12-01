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
        Schema::create('tr_laporan_marketing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mitra_pembiayaan');
            $table->unsignedBigInteger('id_cycle');
            $table->date('tanggal');
            $table->string('foto');
            $table->string('keterangan');
            $table->timestamps();
        });

        Schema::table('tr_laporan_marketing', function (Blueprint $table) {
            $table->foreign('id_mitra_pembiayaan')->references('id')->on('tr_pegawai')->onDelete('cascade');
            $table->foreign('id_cycle')->references('id')->on('mstr_cycle')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_laporan_marketing');
    }
};
