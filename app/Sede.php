<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
	protected $table = "sedes";


	public static function getsedeEquipo($id){

		$sede = Sede::where('sedes.id_sede', $id)->select('sedes.id_sede','sedes.nombre')->first();
		//dd($sede);
		return $sede;
	}

	public static function buscarSedeID($sede){
		$sede = Sede::where('sedes.id_sede', $sede);
		return $sede;
	}

	public static function obtenerSedesActivas(){

		$sedes = Sede::all();
		return $sedes;
	}
}
