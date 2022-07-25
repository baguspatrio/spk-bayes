<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePemodelan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perhitungan', function (Blueprint $table) {
            $table->integer('totalMacet')->change();
            $table->integer('totalLancar')->change();
            $table->float('probLancar')->change();
            $table->float('probMacet')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perhitungan', function (Blueprint $table) {
            //
        });
    }
}
