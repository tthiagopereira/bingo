<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolaCartelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bola_cartelas', function (Blueprint $table) {
            $table->id();
            $table->integer('bola');
            $table->boolean('status')->default(true);
            $table->integer('linha');
            $table->unsignedBigInteger('cartela_id');
            $table->foreign('cartela_id')->references('id')->on('cartelas');
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
        Schema::dropIfExists('bola_cartelas');
    }
}
