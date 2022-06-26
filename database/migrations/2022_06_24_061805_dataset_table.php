<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pekerjaan');
            $table->integer('jumlahPengajuan');
            $table->string('jenisPembayaran');
            $table->integer('jangkaWaktu');
            $table->string('metodePembayaran');
            $table->string('kapasitasBulanan');
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
        Schema::dropIfExists('dataset');
    }
}
