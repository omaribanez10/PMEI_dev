<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoriosEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesorios_equipos', function (Blueprint $table) {
            $table->bigIncrements('id_accesorio');
            $table->bigInteger('id_equipo')->unsigned()->nullable();;
            $table->string('nombre')->nullable();
            $table->string('tipo_accesorio')->nullable();
            $table->string('marca')->nullable();
            $table->text('observacion')->nullable();
            $table->string('estado')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::table('accesorios_equipos', function($table) {
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
        Schema::dropIfExists('accesorios_equipos');
    }
}
