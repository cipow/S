<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationTableKamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->foreign('username')->references('username')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kamars', function (Blueprint $table) {
            // Schema::dropIfExists('kamars');
        });
    }
}
