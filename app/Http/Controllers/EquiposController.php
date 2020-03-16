<?php

namespace App\Http\Controllers;

use App\Calibracion;
use App\Empresa;
use App\Equipo;
use App\EquipoBaja;
use App\EstadoEquipo;
use App\EquipoComponente;
use App\Http\Requests\EquiposBajaRequest;
use App\Http\Requests\SaveEquipoRequest;
use App\Http\Requests\SaveEquipoComponenteRequest;
use App\Mantenimiento;
use App\Proveedor;
use App\ReporteAntiguo;
use App\Riesgo;
use App\Sede;
use App\TipoEquipo;
use App\Ubicacion;
use App\Componente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EquiposController extends Controller
{
    /*function __construct(){
    $this->middleware('roles:1');
}*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    Esta funcion muestra la vista equipos index, es decir la pantalla principal de equipos, además contiene los diferentes filtros que aparecen en la parte superior de la pantalla, que permiten la búsqueda especifica de un equipo o grupo de equipos
     */
    public function index(Request $request)
    {
        $tipos_equipos     = TipoEquipo::buscarTiposEquipos();
        $sedes_disponibles = Sede::obtenerSedesActivas();

        /*** FILTROS EN CADA UNA DE LAS BÚSQUEDAS**/
        $search      = $request->get('search');
        $tipo_equipo = $request->get('tipo_equipo');
        $sede_filtro = $request->get('sedes_disponibles');

        // Algoritmo que permite mostrar los equipos deseados dependiendo del filtro seleccionado

        if (is_null($search) && is_null($tipo_equipo) && is_null($sede_filtro)) {

            $equipos = Equipo::getEquipoDatos()->paginate(20);
            return view(
                'equipos.index',
                [
                    'equipo' => new Equipo
                ],
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (!is_null($search) && is_null($tipo_equipo) && is_null($sede_filtro)) {

            $equipos = Equipo::search($search)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (!is_null($search) && !is_null($tipo_equipo) && is_null($sede_filtro)) {

            $tipo_equipo = (int) $tipo_equipo;
            $equipos     = Equipo::searchbyParametros($tipo_equipo, $search)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (!is_null($search) && !is_null($tipo_equipo) && !is_null($sede_filtro)) {

            $tipo_equipo = (int) $tipo_equipo;
            $equipos     = Equipo::searchbyParametrosSede($tipo_equipo, $search, $sede_filtro)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (is_null($search) && !is_null($tipo_equipo) && !is_null($sede_filtro)) {

            $tipo_equipo = (int) $tipo_equipo;
            $equipos     = Equipo::searchbyParametrosTipoEquipo($tipo_equipo, $sede_filtro)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (is_null($search) && is_null($tipo_equipo) && !is_null($sede_filtro)) {

            $sede_filtro = (int) $sede_filtro;
            $equipos     = Equipo::searchbySede($sede_filtro)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (is_null($search) && !is_null($tipo_equipo) && is_null($sede_filtro)) {

            $tipo_equipo = (int) $tipo_equipo;
            $equipos     = Equipo::searchbyTipoEquipo($tipo_equipo)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        } elseif (!is_null($search) && is_null($tipo_equipo) && !is_null($sede_filtro)) {

            $tipo_equipo = (int) $tipo_equipo;
            $equipos     = Equipo::searchbyParametrosSearch($search, $sede_filtro)->paginate(20);
            return view(
                'equipos.index',
                compact('equipos', 'tipos_equipos', 'sedes_disponibles')
            );
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cargarDatosSelect(Request $request)
    {

        $id_empresa = $request->id_empresa;
        return response()->json(array('success' => $id_empresa));
    }

    public function create(Request $request)
    {
        $empresas         = Empresa::all();
        $sedes            = Sede::all();
        $tipos_equipos    = TipoEquipo::all();
        $proveedores      = Proveedor::all();
        $estados          = EstadoEquipo::all();
        $riesgos          = Riesgo::all();
        $ubicaciones      = Ubicacion::all();
        $equipo_empresa   = "";
        $equipo_sede      = "";
        $equipo_tipo      = "";
        $equipo_proveedor = "";
        $equipo_estado    = "";
        $componentes      = Componente::all();



        return view('equipos.create', [
            'equipo' => new Equipo,
        ], compact('empresas', 'sedes', 'tipos_equipos', 'estados', 'proveedores', 'equipo_sede', 'equipo_tipo', 'equipo_proveedor', 'equipo_estado', 'equipo_empresa', 'riesgos', 'ubicaciones', 'componentes'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request/*SaveEquipoRequest $request, SaveEquipoComponenteRequest $request_2*/)
    {
        $equipo = new Equipo();
        $equipo->id_usuario_crea = $request->id_usuario_crea;
        $equipo->consecutivo = $request->consecutivo;
        $equipo->nombre_equipo = $request->nombre_equipo;
        $equipo->serie = $request->serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->marca = $request->marca;
        $equipo->modelo = $request->modelo;
        $equipo->id_empresa = $request->id_empresa;
        $equipo->id_sede = $request->id_sede;
        $equipo->id_ubicacion = $request->id_ubicacion;
        $equipo->id_tipo_equipo = $request->id_tipo_equipo;
        $equipo->id_proveedor = $request->id_proveedor;
        $equipo->id_estado_equipo = $request->id_estado_equipo;
        $equipo->registro_invima = $request->registro_invima;
        $equipo->id_riesgo = $request->id_riesgo;
        $equipo->save();

        if ($request->hasFile('foto') && $equipo->save() == true) {

            $image = $request->file('foto');
            $filename = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('storage'), $filename);
            $equipo->foto = $filename;
            $equipo->save();
        }

        if ($equipo->save() == true) {
            return response()->json(array('success'=>"El equipo se ha guardado correctamente"));

        } else {
            return response()->json(['fail' => 'Falló al intentar guardar el equipo']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id                    = (int) $id;
        $reportesAntiguos      = ReporteAntiguo::getReportesAntiguos($id)->paginate(2);
        $mantenimientos_equipo = Mantenimiento::buscarMantenimientoEquipo($id)->paginate(2);
        $calibraciones_equipo  = Calibracion::buscarCalibracionEquipo($id)->paginate(2);
        $equipo                = Equipo::get_equipos_det($id);

        return view('equipos.show', [
            'equipo',
        ], compact('reportesAntiguos', 'mantenimientos_equipo', 'calibraciones_equipo', 'equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas         = Empresa::all();
        $sedes            = Sede::all();
        $tipos_equipos    = TipoEquipo::all();
        $proveedores      = Proveedor::all();
        $estados          = EstadoEquipo::all();
        $empresas         = Empresa::all();
        $riesgos          = Riesgo::all();
        $ubicaciones      = Ubicacion::all();
        $equipo_empresa   = "";
        $equipo_sede      = "";
        $equipo_tipo      = "";
        $equipo_proveedor = "";
        $equipo_estado    = "";
        $equipo_empresa   = Equipo::buscarempresaEquipo($id);
        $equipo_sede      = Equipo::buscarsedeEquipo($id);
        $equipo_tipo      = Equipo::buscartipoEquipo($id);
        $equipo_proveedor = Equipo::buscarproveedorEquipo($id);
        $equipo_estado    = Equipo::buscarestadoEquipo($id);
        $componentes = "";

        return view('equipos.edit', [
            'equipo' => Equipo::findOrFail($id),
        ], compact('empresas', 'sedes', 'tipos_equipos', 'estados', 'proveedores', 'equipo_sede', 'equipo_tipo', 'equipo_proveedor', 'equipo_estado', 'equipo_empresa', 'riesgos', 'ubicaciones', 'componentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Equipo $equipo, SaveEquipoRequest $request)
    {
        $equipo->update($request->validated());
        if ($request->hasFile('foto')) {
            $path         = $request->file('foto')->store('public');
            $equipo->foto = $path;
            $equipo->update();
        }

        if ($equipo) {
            return redirect()->route('equipos.show', $equipo);
        } else {
            return 'No se pudo guardar los datos, error en conexión';
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para dar de baja a un equipo
    public function destroy(Equipo $equipo, EquiposBajaRequest $request)
    {
        //Insertar el equipo en tabla equipos baja y si la respuesta es true se cambia el estado del equipo

        $equipo_baja = EquipoBaja::create($request->validated());
        $equipo_baja->save();
        if ($equipo_baja->save()) {
            $rta = $equipo->update([
                'ind_baja' => 1,
            ]);
            if ($equipo_baja->save() && $rta) {
                Alert::success('El equipo ' . $equipo->nombre_equipo . ' se ha dado de baja');
                return redirect()->route('equipos.index');
            } else {
                Alert::error('Error, al intentar dar de baja al equipo ' . $equipo->nombre_equipo);
                return redirect()->route('equipos.show', $equipo);
            }
        }
    }

    public function codigo_barra()
    {
    }
}
