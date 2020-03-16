<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposBajaTable extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
	Schema::create('equipos_baja', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->bigInteger('id_usuario')->unsigned();
		$table->bigInteger('id_equipo')->unsigned();
		$table->text('motivo')->nullable();
		$table->text('observacion')->nullable();
		$table->timestamps();
	});

	Schema::table('equipos_baja', function($table) {
		$table->foreign('id_equipo')->references('id')->on('equipos');
		$table->foreign('id_usuario')->references('id')->on('users');
	});



}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
	Schema::dropIfExists('equipos_baja');
}
}
