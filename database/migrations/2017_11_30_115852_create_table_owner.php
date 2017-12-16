<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            //$table->increments('id');
            //$table->timestamps();
            $table->string('username',32)->unique();
            $table->string('password');
            $table->string('telepon',20);
            $table->string('nama',30);
            $table->text('alamat');
            $table->text('foto')->nullable();
            $table->string('nama_kos',30)->nullable();
            $table->text('geo')->nullable();
            $table->text('lain_lain')->nullable();
            $table->string('api_token')->nullable();

            $table->primary('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
