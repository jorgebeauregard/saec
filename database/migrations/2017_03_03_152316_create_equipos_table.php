<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_equipo')->unsigned();
            $table->integer('actividad_id')->unsigned();
            $table->string('contrasena', 4)->default('123');
            $table->string('file_path')->nullable()->default(NULL);
            $table->string('file_url')->nullable()->default(NULL);
            $table->integer('profesor_id')->usigned()->nullable()->dafault(NULL);
            $table->timestamps();

            $table->foreign('actividad_id')->references('id')->on('actividads')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('alumno_equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id')->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->timestamps();

            $table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('actividad_alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('actividad_id')->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->boolean('completada')->default(FALSE);
            $table->integer('equipo_id')->unsigned()->nullable()->default(NULL);

            $table->timestamps();

            $table->foreign('actividad_id')->references('id')->on('actividads')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onUpdate('cascade')->onDelete('cascade');
        });          
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('actividad_alumno');
        Schema::dropIfExists('alumno_equipo');
        Schema::dropIfExists('equipos');
    }
}
