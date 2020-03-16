<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposHasComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_has_componentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_equipo')->unsigned();
            $table->bigInteger('id_componente')->unsigned();
            $table->bigInteger('id_estado_componente')->unsigned()->nullable();
             $table->bigInteger('observacion')->nullable();
            $table->timestamps();
        });

        Schema::table('equipos_has_componentes', function ($table) {
            $table->foreign('id_equipo')->references('id')->on('equipos');
            $table->foreign('id_componente')->references('id_componente')->on('componentes');
            $table->foreign('id_estado_componente')->references('id_estado_componente')->on('estado_componentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_has_componentes');
    }
}
