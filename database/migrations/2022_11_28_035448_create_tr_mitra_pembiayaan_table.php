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
        Schema::create('tr_mitra_pembiayaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pegawai');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('kabupaten');
            $table->string('telepon');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->text('foto')->nullable();
            $table->timestamps();
        });

        Schema::table('tr_mitra_pembiayaan', function (Blueprint $table) {
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
        Schema::dropIfExists('tr_mitra_pembiayaan');
    }
};
