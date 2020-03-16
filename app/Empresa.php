<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $table = "empresas";


	public static function getempresaEquipo($id){

		$empresa = Empresa::where('empresas.id_empresa', $id)->select('empresas.id_empresa','empresas.nombre')->first();;
		//dd($empresa);
		return $empresa;
	}
}
