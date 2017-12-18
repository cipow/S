<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipe',['COWOK','CEWEK','CAMPUR']);
            $table->string('jenis',50)->unique();
            $table->integer('harga');
            $table->text('cover');
            $table->integer('jumlah');
            $table->text('fasilitas');
            $table->string('username',32);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
