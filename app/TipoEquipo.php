<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
	protected $table = "tipos_equipos";

	public static function  buscarTiposEquipos(){

		$tipos_equipos = TipoEquipo::all();
		return $tipos_equipos;
	}
}
