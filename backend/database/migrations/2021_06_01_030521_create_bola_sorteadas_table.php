<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolaSorteadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bola_sorteadas', function (Blueprint $table) {
            $table->id();
            $table->integer('bola');
            $table->boolean('status');
            $table->unsignedBigInteger('partida_id');
            $table->foreign('partida_id')->references('id')->on('partidas');
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
        Schema::dropIfExists('bola_sorteadas');
    }
}
