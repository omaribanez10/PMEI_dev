<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->bigIncrements('id_componente');
            $table->string('nombre')->nullable();
            $table->tinyInteger('ind_estado')->nullable();
            $table->string('estado')->nullable();
            $table->text('descripcion')->nullable();
            $table->bigInteger('id_tipo_equipo')->unsigned()->nullable();
            $table->bigInteger('id_estado_componente')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('componentes', function($table) {
            $table->foreign('id_tipo_equipo')->references('id_tipo_equipo')->on('tipos_equipos');
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
        Schema::dropIfExists('componentes');
    }
}
