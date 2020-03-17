<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    //Se crea la relación Many to Many con la tabla componentes

    protected $fillable = [
        'nombre_equipo', 'id_empresa', 'serie', 'marca', 'modelo', 'id_sede', 'id_tipo_equipo', 'foto', 'registro_invima', 'id_proveedor', 'consecutivo', 'descripcion', 'id_ubicacion', 'id_riesgo', 'id_usuario_crea', 'id_estado_equipo', 'ind_baja',
    ];

    protected $table = "equipos";

    /** public function sedes()
    {
    return this->hasOne(Sede::class);
    }*/

    public function equipo_componentes()
    {
        return $this->belongsToMany(Componente::class, 'equipo_has_componentes', 'id_equipo', 'id_componente');

    }

    public static function get_equipos_det($id)
    {

        $equipo = Equipo::where('equipos.id', $id)->where('ind_baja', 0)->join('tipos_equipos', 'tipos_equipos.id_tipo_equipo', '=', 'equipos.id_tipo_equipo'
            )->leftJoin('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->leftJoin(
            'sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->leftJoin('ubicaciones', 'ubicaciones.id_ubicacion', '=', 'equipos.id_ubicacion'
            )->leftJoin('riesgos', 'riesgos.id_riesgo', '=', 'equipos.id_riesgo')->leftJoin(
            'users', 'users.id', '=', 'equipos.id_usuario_crea')->leftJoin('proveedores', 'proveedores.id_proveedor', '=', 'equipos.id_proveedor'
            )->leftJoin('estados_equipos', 'estados_equipos.id_estado_equipo', '=', 'equipos.id_estado_equipo'
            )->select('equipos.*', 'tipos_equipos.nombre AS tipo_equipo', 'empresas.nombre AS empresa', 'sedes.nombre AS sede', 
            'ubicaciones.nombre AS ubicacion', 'riesgos.nombre AS riesgo', 'users.name', 'users.nombre_2', 'users.apellido_1', 
            'users.apellido_2', 'proveedores.nombre AS proveedor', 'proveedores.nombre AS proveedor', 
            'estados_equipos.nombre AS estado_equipo')->get();
        return $equipo;

    }

    public static function buscarsedeEquipo($id)
    {

        $equipo = Equipo::where('id', $id)->get();
        foreach ($equipo as $value) {
            $sede_equipo = $value->id_sede;
        }
        $equipo_sede = Equipo::where('equipos.id_sede', $sede_equipo)->join('sedes', 'equipos.id_sede', '=', 'sedes.id_sede')
            ->select('sedes.id_sede', 'sedes.nombre')->first();
        return $equipo_sede;

    }

    public static function buscartipoEquipo($id)
    {

        $equipo = Equipo::where('id', $id)->get();

        foreach ($equipo as $value) {
            $tipo_equipo = $value->id_tipo_equipo;

        }

        $tipo_equipo = Equipo::where('equipos.id_tipo_equipo', $tipo_equipo)->join('tipos_equipos', 'equipos.id_tipo_equipo', '=', 'tipos_equipos.id_tipo_equipo')
            ->select('tipos_equipos.id_tipo_equipo', 'tipos_equipos.nombre')->first();
        return $tipo_equipo;

    }

    public static function buscarproveedorEquipo($id)
    {

        $equipo = Equipo::where('id', $id)->get();
        //dd($equipo);
        foreach ($equipo as $value) {
            $proveedor_equipo = $value->id_proveedor;
            // dd($proveedor_equipo);

        }

        $proveedor_equipo = Equipo::where('equipos.id_proveedor', $proveedor_equipo)->join('proveedores', 'equipos.id_proveedor', '=', 'proveedores.id_proveedor')
            ->select('proveedores.id_proveedor', 'proveedores.nombre')->first();
        return $proveedor_equipo;

    }
    public static function buscarestadoEquipo($id)
    {

        $equipo = Equipo::where('id', $id)->get();

        foreach ($equipo as $value) {
            $estado_equipo = (int) $value->estado;

        }

        $estado_equipo = Equipo::where('equipos.estado', $estado_equipo)->join('estados_equipos', 'equipos.estado', '=', 'estados_equipos.id_estado_equipo')
            ->select('estados_equipos.id_estado_equipo', 'estados_equipos.nombre')->first();
        return $estado_equipo;

    }
    public static function buscarempresaEquipo($id)
    {

        $equipo = Equipo::where('id', $id)->get();
        foreach ($equipo as $value) {
            $id_empresa_equipo = (int) $value->id_empresa;
            //dd($id_empresa_equipo);
        }

        $empresa_equipo = Equipo::where('equipos.id_empresa', $id_empresa_equipo)->join('empresas', 'equipos.id_empresa', '=', 'empresas.id_empresa')
            ->select('empresas.id_empresa', 'empresas.nombre')->first();
        return $empresa_equipo;
        //dd($empresa_equipo);

    }

    public static function getEquipoInformacion($id_equipo)
    {

        $equipo = Equipo::where('equipos.id', $id_equipo)->join('empresas', 'equipos.id_empresa', '=', 'empresas.id_empresa')->join('sedes', 'equipos.id_sede', "=", 'sedes.id_sede')->select('empresas.nombre AS nombre_empresa', 'sedes.nombre AS nombre_sede');
        return $equipo;
    }

    public static function getEquipoDatos()
    {

        $equipos = Equipo::select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa'
        )->where('ind_baja', 0)->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede'
        )->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa');
        return $equipos;

    }
    public function scopeSearch($query, $search)
    {

        if (!trim(empty($search))) {

            $sql = $query->where('nombre_equipo', 'like', '%' . $search . '%')->orWhere('serie', 'like', '%' . $search . '%')->orWhere('modelo', 'like', '%' . $search . '%')->where('ind_baja', 0)->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
            return $sql;
        } else {
            $this->getEquipoDatos();
        }

    }
    public static function searchbyTipoEquipo($tipo_equipo)
    {
        $sql = Equipo::where('equipos.id_tipo_equipo', $tipo_equipo)->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        return $sql;
    }

    public static function searchbyParametros($tipo_equipo, $search)
    {
        $sql = Equipo::where('equipos.id_tipo_equipo', $tipo_equipo)->where('nombre_equipo', 'like', '%' . $search . '%')->orWhere('serie', 'like', '%' . $search . '%')->orWhere('modelo', 'like', '%' . $search . '%')->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');

        return $sql;
    }

    public static function searchbyParametrosSede($tipo_equipo, $search, $sede_filtro)
    {

        $sql = Equipo::where('equipos.id_tipo_equipo', $tipo_equipo)->where('equipos.id_sede', $sede_filtro)->where('nombre_equipo', 'like', '%' . $search . '%')->orWhere('serie', 'like', '%' . $search . '%')->orWhere('modelo', 'like', '%' . $search . '%')->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        return $sql;

    }
    public static function searchbyParametrosTipoEquipo($tipo_equipo, $sede_filtro)
    {

        $sql = Equipo::where('equipos.id_tipo_equipo', $tipo_equipo)->where('equipos.id_sede', $sede_filtro)->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        return $sql;

    }
    public static function searchbyParametrosSearch($search, $sede_filtro)
    {

        $sql = Equipo::where('equipos.id_sede', $sede_filtro)->where('nombre_equipo', 'like', '%' . $search . '%')->orWhere('serie', 'like', '%' . $search . '%')->orWhere('modelo', 'like', '%' . $search . '%')->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        return $sql;

    }

    public static function searchbySede($sede_filtro)
    {

        $sql = Equipo::where('equipos.id_sede', $sede_filtro)->join('sedes', 'sedes.id_sede', '=', 'equipos.id_sede')->join('empresas', 'empresas.id_empresa', '=', 'equipos.id_empresa')->where('ind_baja', 0)->select('equipos.*', 'sedes.nombre AS nombre_sede', 'empresas.nombre AS nombre_empresa');
        return $sql;
    }

    public static function get_equipos_sin_barcode($id_empresa)
    {
        //Se verifica en el caso en el que el SELECT se envie sin ningún parámetro y de no ser así se hace el filtro
        if ($id_empresa == 0) {
            $sql = null;
        } else {
            $sql = Equipo::where('equipos.ind_codigo_barras', '=', null)->where('equipos.id_empresa', '=', $id_empresa)->where('equipos.ind_baja', '!=', 1)->leftJoin('empresas', 'empresas.id_empresa', 'equipos.id_empresa')->leftJoin('estados_equipos', 'estados_equipos.id_estado_equipo', 'equipos.id_estado_equipo')->select('equipos.*', 'empresas.nombre AS empresa', 'estados_equipos.nombre AS estado_equipo')->get();
        }
        return $sql;
    }

}
