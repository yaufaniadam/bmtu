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
        Schema::create('tr_penempatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->unsignedBigInteger('id_cabang')->nullable();
            $table->unsignedBigInteger('id_posisi')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('file_sk')->nullable();
            $table->string('status_penempatan')->nullable();
            $table->timestamps();
        });

        Schema::table('tr_penempatan', function (Blueprint $table) {
            $table->foreign('id_pegawai')->references('id')->on('tr_pegawai')->onDelete('cascade');
            $table->foreign('id_cabang')->references('id')->on('mstr_cabang')->onDelete('cascade');
            $table->foreign('id_posisi')->references('id')->on('mstr_posisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_penempatan');
    }
};
