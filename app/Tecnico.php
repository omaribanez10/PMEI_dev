<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
	protected $table = "tecnicos";
	protected $fillable = [
		'nombre_1', 'nombre_2', 'apellido_1', 'apellido_2', 'tipo_documento', 'numero_documento', 'sexo', 'telefono', 'direccion', 'nombre_login', 'contrasena', 'profesion', 'cargo'
	];

}
