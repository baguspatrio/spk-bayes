<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatauji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datauji', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('jumlahPengajuan');
            $table->string('jenisPembayaran');
            $table->string('jangkaWaktu');
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
        Schema::dropIfExists('datauji');
    }
}
