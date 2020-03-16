<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReporteAntiguo extends Model
{
	protected $fillable = [
		'id_equipo','ruta','titulo','descripcion'
	];

	protected $table = "reportes_antiguos";

	public static function getReportesAntiguos($id){

		$reportes_antiguos = ReporteAntiguo::where('reportes_antiguos.id_equipo', $id);
		return $reportes_antiguos;
	}


}
