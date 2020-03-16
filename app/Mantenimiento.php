<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{

    protected $fillable = [
        'id_usuario_crea', 'id_usuario_recibe', 'id_equipo', 'id_sede', 'id_empresa',
        'ind_estado_aceptado', 'id_tipo_mantenimiento', 'problema', 'repuesto', 'observacion', 'fecha_aceptacion',
    ];

    protected $table = "mantenimientos";

    public static function getIdEquipo($id)
    {

        $sql = Mantenimiento::where('mantenimientos.id', $id)->select('mantenimientos.*')->get();
        return $sql;

    }

    public function scopeSearch($query, $search)
    {
        if (!trim(empty($search))) {
            $sql = $query->where('equipo', 'like', '%' . $search . '%')->orWhere('observacion', 'like', '%' . $search . '%')->orWhere('ubicacion', 'like', '%' . $search . '%')->get();
        }
    }

    public static function buscarMantenimientoEquipo($id)
    {

        $mantenimiento = Mantenimiento::where('id_equipo', $id)->where('mantenimientos.ind_estado_aceptado', 1)->join('equipos', 'equipos.id', '=', 'mantenimientos.id_equipo')->join('sedes', 'sedes.id_sede', '=', 'mantenimientos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'mantenimientos.id_empresa')->select('mantenimientos.*', 'equipos.id AS id_equipo', 'equipos.nombre_equipo', 'equipos.serie', 'equipos.marca', 'equipos.registro_invima', 'equipos.foto', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        //dd($mantenimiento);
        return $mantenimiento;

    }
    public static function getDatosEquipos()
    {

        $mantenimientos = Mantenimiento::select('mantenimientos.*', 'equipos.nombre_equipo', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa')->join('equipos', 'equipos.id', '=', 'mantenimientos.id_equipo')->join('sedes', 'sedes.id_sede', '=', 'mantenimientos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'mantenimientos.id_empresa')->get();
        return $mantenimientos;

    }

    public static function getMantenimientos_det($id_mantenimiento)
    {
        $id_mantenimiento = (int) $id_mantenimiento;

        $mantenimientos_det = Mantenimiento::where('mantenimientos.id', $id_mantenimiento)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_crea', '=', 'UT.id')->join('users AS UA', 'mantenimientos.id_usuario_recibe', '=', 'UA.id')->join('tipos_mantenimientos AS TP', 'mantenimientos.id_tipo_mantenimiento', '=', 'TP.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.modelo', 'equipos.registro_invima', 'equipos.foto','equipos.consecutivo', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_tec', 'UT.nombre_2 AS nombre2_tec', 'UT.apellido_1 AS apellido1_tec', 'UT.apellido_2 AS apellido2_tec', 'UA.name AS nombre1_admin', 'UA.nombre_2 AS nombre2_admin', 'UA.apellido_1 AS apellido1_admin', 'UA.apellido_2 AS apellido2_admin', 'TP.id AS tp_id', 'TP.nombre AS tp_nombre')->get();

        return $mantenimientos_det;


    }

    public static function getMantenimientosPendientes($id_user)
    {

        $sql = Mantenimiento::where('mantenimientos.id_usuario_recibe', $id_user)->where('mantenimientos.ind_estado_aceptado', 0)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_crea', '=', 'UT.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.modelo', 'equipos.id_tipo_equipo', 'equipos.registro_invima', 'equipos.foto', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_tec', 'UT.nombre_2 AS nombre2_tec', 'UT.apellido_1 AS apellido1_tec', 'UT.apellido_2 AS apellido2_tec')->get();
        return $sql;
    }

    public static function getMantenimientosPendientes_det($id_mantenimiento)
    {
        //dd($id_mantenimiento);
        $sql = Mantenimiento::where('mantenimientos.id', $id_mantenimiento)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_crea', '=', 'UT.id')->join('tipos_mantenimientos', 'mantenimientos.id_tipo_mantenimiento', 'tipos_mantenimientos.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.id_tipo_equipo', 'equipos.modelo', 'equipos.registro_invima', 'equipos.foto', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_tec', 'UT.nombre_2 AS nombre2_tec', 'UT.apellido_1 AS apellido1_tec', 'UT.apellido_2 AS apellido2_tec', 'tipos_mantenimientos.nombre AS tipo_mantenimiento')->first();
        return $sql;

    }

    public static function getMantenimientosAceptadosTecnicos($id_user)
    {
        $id_user = (int) $id_user;
        $sql     = Mantenimiento::where('mantenimientos.id_usuario_crea', $id_user)->where('mantenimientos.ind_estado_aceptado', 1)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_recibe', '=', 'UT.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.modelo', 'equipos.id_tipo_equipo', 'equipos.registro_invima', 'equipos.foto', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_admin', 'UT.nombre_2 AS nombre2_admin', 'UT.apellido_1 AS apellido1_admin', 'UT.apellido_2 AS apellido2_admin');
        //dd($sql);
        return $sql;
    }

    public static function getMantenimientosPendientesTecnicos($id_user)
    {
        $id_user = (int) $id_user;
        $sql     = Mantenimiento::where('mantenimientos.id_usuario_crea', $id_user)->where('mantenimientos.ind_estado_aceptado', 0)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_recibe', '=', 'UT.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.modelo', 'equipos.id_tipo_equipo', 'equipos.registro_invima', 'equipos.foto', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_admin', 'UT.nombre_2 AS nombre2_admin', 'UT.apellido_1 AS apellido1_admin', 'UT.apellido_2 AS apellido2_admin');
        return $sql;
    }
    public static function getMantenimientosRechazadosTecnicos($id_user)
    {
        $id_user = (int) $id_user;
        $sql     = Mantenimiento::where('mantenimientos.id_usuario_crea', $id_user)->where('mantenimientos.ind_estado_aceptado', 2)->join('equipos', 'mantenimientos.id_equipo', '=', 'equipos.id')->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')->join('empresas', 'mantenimientos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'mantenimientos.id_sede', '=', 'sedes.id_sede')->join('users AS UT', 'mantenimientos.id_usuario_recibe', '=', 'UT.id')->select('mantenimientos.*', 'equipos.nombre_equipo', 'equipos.marca', 'equipos.serie', 'equipos.modelo', 'equipos.registro_invima', 'equipos.id_tipo_equipo', 'equipos.foto', 'empresas.nombre AS nombre_empresa', 'empresas.logo AS logo_empresa', 'sedes.nombre AS nombre_sede', 'sedes.logo AS logo_sede', 'UT.name AS nombre1_admin', 'UT.nombre_2 AS nombre2_admin', 'UT.apellido_1 AS apellido1_admin', 'UT.apellido_2 AS apellido2_admin');
        return $sql;

    }

}
