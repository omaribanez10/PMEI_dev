<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = "componentes";

    public function componentes_equipos()
    {
    	return $this->belongsToMany(Equipo::class,  'equipo_has_componentes', 'id_componente','id_equipo');
    }

    public static function getComponentes()
    {
        $sql = Componente::select('componentes.*')->get();
        return $sql;
    }

}
