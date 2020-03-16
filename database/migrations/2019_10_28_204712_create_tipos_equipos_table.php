<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_equipos', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_equipo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('funcion')->nullable();
            $table->tinyInteger('ind_estado')->nullable();
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
        Schema::dropIfExists('tipos_equipos');
    }
}
