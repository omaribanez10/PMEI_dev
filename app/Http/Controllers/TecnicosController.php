<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTecnicoRequest;
use App\Tecnico;
use Illuminate\Http\Request;

class TecnicosController extends Controller
{
  function __construct(){
    $this->middleware('roles:1');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tecnicos = Tecnico::get();
      return view('tecnicos.index', [
        'tecnico' => new Tecnico],
        compact('tecnicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('tecnicos.show', [
          'tecnico' => Tecnico::findOrFail($id)
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tecnicos.create', [
          'tecnico' => new Tecnico
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTecnicoRequest $request)
    {
      Tecnico::create($request->validated());
      return redirect()->route('tecnicos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('tecnicos.edit', [
          'tecnico' => Tecnico::findOrFail($id)
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Tecnico $tecnico, SaveTecnicoRequest $request)
    {
      $rta = $tecnico->update($request->validated());
      if ($rta) {
          return redirect()->route('tecnicos.show', $tecnico);
      } else {
          return 'No se pudieron guardar los datos, error en conexión';
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
      $tecnico->delete();
     return redirect()->route('tecnicos.index');
    }
}
