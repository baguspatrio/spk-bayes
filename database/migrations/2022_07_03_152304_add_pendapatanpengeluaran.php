<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendapatanpengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_asli', function (Blueprint $table) {
            $table->integer('pendapatan')->after('metodePembayaran');
            $table->integer('pengeluaran')->after('pendapatan');
            $table->string('kapasitasBulanan')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_asli', function (Blueprint $table) {
            //
        });
    }
}
