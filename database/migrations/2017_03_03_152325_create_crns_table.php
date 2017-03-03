<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materia_id');
            $table->integer('periodo_id');
            $table->integer('profesor_id');
            $table->integer('grupo');
            $table->timestamps();

            $table->foreign('materia_id')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('profesor_id')->references('id')->on('profesores')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crns');
    }
}
