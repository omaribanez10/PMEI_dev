<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_equipos', function (Blueprint $table) {
            $table->bigIncrements('id_estado_equipo');
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('estados_equipos');
    }
}
