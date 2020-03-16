<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->bigIncrements('id_ubicacion');
            $table->bigInteger('id_sede')->unsigned()->nullable();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->tinyInteger('ind_estado')->nullable();


            $table->timestamps();
        });
        Schema::table('ubicaciones', function ($table) {
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
}
