<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class EquipoBaja extends Model
{
	protected $fillable = [
		'id_usuario', 'id_equipo','motivo', 'observacion'
	];

    protected $table = "equipos_baja";
}

