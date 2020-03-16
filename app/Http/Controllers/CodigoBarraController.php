<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Equipo;
use Illuminate\Http\Request;

class CodigoBarraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Se obtienen las empresas para mostrarlas en el select y realizar el respectivo filtro, según la empresa que seleccione el usuario
        $empresas = Empresa::all();
        /*** FILTROS PARA EL SELECT EMPRESAS **/

        $id_empresa = (int) $request->get('empresa');
        $equipos    = Equipo::get_equipos_sin_barcode($id_empresa);
        return view('equipos.codigos_barra.index', compact('empresas', 'equipos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos = Equipo::all();
        //return "Hola :)";
       // dd($equipos);
       return view('equipos.codigos_barra.create', compact('equipos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
