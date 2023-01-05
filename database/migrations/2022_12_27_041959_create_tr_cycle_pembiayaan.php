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
        Schema::create('tr_cycle_pembiayaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_laporan_marketing');
            $table->unsignedBigInteger('id_cycle');
            $table->string('keterangan')->nullable();
            $table->text('foto')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });

        Schema::table('tr_cycle_pembiayaan', function (Blueprint $table) {
            $table->foreign('id_laporan_marketing')->references('id')->on('tr_laporan_marketing')->onDelete('cascade');
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
        Schema::dropIfExists('tr_cycle_pembiayaan');
    }
};
