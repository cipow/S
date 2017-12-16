<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationTablePreview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('previews', function (Blueprint $table) {
            $table->foreign('kamar_id')->references('id')->on('kamars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('previews', function (Blueprint $table) {
            Schema::dropIfExists('previews');
        });
    }
}
