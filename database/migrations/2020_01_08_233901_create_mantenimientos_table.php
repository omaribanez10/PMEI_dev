<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario_crea')->unsigned()->nullable();
            $table->bigInteger('id_usuario_recibe')->unsigned()->nullable();
            $table->bigInteger('id_equipo')->unsigned()->nullable();
            $table->tinyInteger('ind_estado_aceptado')->unsigned()->nullable();
            $table->bigInteger('id_sede')->unsigned()->nullable();
            $table->bigInteger('id_empresa')->unsigned()->nullable();
            $table->bigInteger('id_tipo_mantenimiento')->unsigned()->nullable();
            $table->text('problema')->nullable();
            $table->text('repuesto')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
            $table->timestamp('fecha_aceptacion')->nullable();

        });

        Schema::table('mantenimientos', function($table) {

            $table->foreign('id_usuario_crea')->references('id')->on('users');
            $table->foreign('id_usuario_recibe')->references('id')->on('users');
            $table->foreign('id_equipo')->references('id')->on('equipos');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
            $table->foreign('id_tipo_mantenimiento')->references('id')->on('tipos_mantenimientos');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}
