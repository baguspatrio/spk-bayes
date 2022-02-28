<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAsliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_asli', function (Blueprint $table) {
            $table->id();
            $table->string('kepribadian');
            $table->string('statusRumah');
            $table->string('statusTempatusaha');
            $table->integer('jumlahTanggungan');
            $table->biginteger('kemampuan')->nullable();
            $table->biginteger('jumlahPinjaman');
            $table->biginteger('nilaiJaminan')->nullable();
            $table->biginteger('angsuran');
            $table->integer('lamaAngsuran');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_asli');
    }
}
