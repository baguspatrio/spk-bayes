<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cratetableperhitungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('perhitungan', function (Blueprint $table) {
            $table->id();
            $table->string('atribut');
            $table->string('nilai');
            $table->string('totalMacet');
            $table->string('totalLancar');
            $table->string('probMacet');
            $table->string('probLancar');
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
        //
    }
}
