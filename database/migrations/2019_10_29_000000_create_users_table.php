<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('id_rol')->unsigned();
            $table->string('name');
            $table->string('nombre_2')->nullable();
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->string('direccion')->nullable();
            $table->string('telefono_1')->nullable();
            $table->string('telefono_2');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('nombre_login')->unique();
            $table->string('tipo_documento');
            $table->bigInteger('numero_documento')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('ind_estado_activo')->default(1)->nullable();
            $table->rememberToken();
            $table->timestamps();
            });

            Schema::table('users', function($table) {
               $table->foreign('id_rol')->references('id_rol')->on('roles');
           });


        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
