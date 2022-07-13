<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updatetableuji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datauji', function (Blueprint $table) {
            $table->integer('pendapatan')->after('metodePembayaran');
            $table->integer('pengeluaran')->after('pendapatan');
            $table->dropcolumn('kapasitasBulanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datauji', function (Blueprint $table) {
            //
        });
    }
}
