<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calibracion extends Model
{
	protected $fillable = [
		'id_equipo', 'titulo','observacion', 'archivo'
	];


	protected $table = "calibraciones";

	public static function buscarCalibracionEquipo($id){

		$sql = Calibracion::where('id_equipo', $id);
		return $sql;
	}
}
