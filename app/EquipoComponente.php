<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoComponente extends Model
{
    protected $fillable = [
        'id_equipo', 'id_componente',
    ];

    protected $table = "equipos_has_componentes";

}
