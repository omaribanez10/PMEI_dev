<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mantenimiento;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!is_null(auth()->user())) {
          $id_user = auth()->user()->id;
          $mantenimientos_pendientes = Mantenimiento::getMantenimientosPendientes($id_user);
          $mantenimientos_tecnicos_aceptados = Mantenimiento::getMantenimientosAceptadosTecnicos($id_user)->paginate(8);
          $mantenimientos_tecnicos_pendientes = Mantenimiento::getMantenimientosPendientesTecnicos($id_user)->paginate(5);
          $mantenimientos_tecnicos_rechazados = Mantenimiento::getMantenimientosRechazadosTecnicos($id_user)->paginate(5);

      }else{
        $mantenimientos_pendientes = "";
        $mantenimientos_tecnicos_aceptados = "";
        $mantenimientos_tecnicos_pendientes = "";
        $mantenimientos_tecnicos_rechazados = "";
    }
   // Alert::success('Success Title', 'Success Message');
    return view('home', compact('mantenimientos_pendientes', 'mantenimientos_tecnicos_aceptados','mantenimientos_tecnicos_pendientes','mantenimientos_tecnicos_rechazados'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
