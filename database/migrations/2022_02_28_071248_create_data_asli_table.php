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
            $table->string('tempatUsaha');
            $table->integer('jumlahTanggungan');
            $table->integer('kapasitasKemampuan');
            $table->integer('jumlahPinjaman');
            $table->integer('jumlahAngsuran');
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
