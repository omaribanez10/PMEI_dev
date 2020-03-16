<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalibracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibraciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_equipo')->unsigned()->nullable();
            $table->string('titulo')->nullable();
            $table->text('observacion')->nullable();
            $table->text('foto')->nullable();
            $table->tinyInteger('ind_estado')->nullable();
            $table->string('archivo')->nullable();
            $table->timestamps();
        });

        Schema::table('calibraciones', function($table) {
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
        Schema::dropIfExists('calibraciones');
    }
}
