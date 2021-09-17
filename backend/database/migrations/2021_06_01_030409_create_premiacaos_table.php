<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiacaos', function (Blueprint $table) {
            $table->id();
            $table->string('moeda');
            $table->double('valor');
            $table->string('percentual');
            $table->boolean('linha');
            $table->float('linha_percentual');
            $table->boolean('linha_dupla');
            $table->float('linha_dupla_percentual');
//            $table->bigInteger('bingo');
            $table->float('bingo_percentual');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('premiacaos');
    }
}
