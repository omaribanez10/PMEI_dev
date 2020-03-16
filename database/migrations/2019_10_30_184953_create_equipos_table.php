<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('equipos', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('id_tipo_equipo')->unsigned()->nullable();
        $table->bigInteger('id_empresa')->unsigned()->nullable();
        $table->bigInteger('id_sede')->unsigned()->nullable();
        $table->bigInteger('id_ubicacion')->unsigned()->nullable();
        $table->bigInteger('id_proveedor')->unsigned()->nullable();
        $table->bigInteger('id_usuario_crea')->unsigned()->nullable();
        $table->bigInteger('id_riesgo')->unsigned()->nullable();
        $table->bigInteger('id_estado_equipo')->unsigned()->nullable();
        $table->string('nombre_equipo')->nullable();
        $table->string('consecutivo')->nullable();
        $table->string('descripcion')->nullable();
        $table->string('serie')->nullable();
        $table->string('marca')->nullable();
        $table->string('modelo')->nullable();
        $table->double('valor_compra')->nullable();
        $table->timestamp('fecha_compra')->nullable();
        $table->string('registro_invima')->nullable();
        $table->tinyInteger('id_funcion')->nullable();
        $table->string('estado')->default(1)->nullable();
        $table->tinyInteger('ind_baja')->default(0)->nullable();
        $table->tinyInteger('ind_codigo_barras')->nullable();
        $table->string('codigo_barras')->nullable();
        $table->string('foto')->default('apoyo-tecnico.svg')->nullable();
        $table->timestamps();
    });
      Schema::table('equipos', function($table) {
        $table->foreign('id_tipo_equipo')->references('id_tipo_equipo')->on('tipos_equipos');
        $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
        $table->foreign('id_sede')->references('id_sede')->on('sedes');
        $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
        $table->foreign('id_usuario_crea')->references('id')->on('users');
        $table->foreign('id_riesgo')->references('id_riesgo')->on('riesgos');
        $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones');
        $table->foreign('id_estado_equipo')->references('id_estado_equipo')->on('estados_equipos');
    });

  }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('equipos');
  }
}
