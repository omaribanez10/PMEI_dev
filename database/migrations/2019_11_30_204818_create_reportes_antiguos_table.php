<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesAntiguosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes_antiguos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_equipo')->unsigned();
            $table->string('ruta');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->tinyInteger('ind_estado')->nullable();
            $table->timestamps();
        });

        Schema::table('reportes_antiguos', function($table) {
            $table->foreign('id_equipo')->references('id')->on('equipos');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes_antiguos');
    }
}
