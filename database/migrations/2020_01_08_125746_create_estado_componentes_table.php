<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_componentes', function (Blueprint $table) {
            $table->bigIncrements('id_estado_componente');
            $table->string('nombre')->nullable();
            $table->string('nombre_corto')->nullable();
            $table->tinyInteger('ind_estado')->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('estado_componentes');
    }
}
