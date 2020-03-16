<?php
namespace App\Http\Controllers;

use App\Componente;
use App\Empresa;
use App\Equipo;
use App\EstadoComponente;
use App\Http\Requests\SaveMantenimientosRequest;
use App\Http\Requests\SaveReporteAntiguoRequest;
use App\Mantenimiento;
use App\ReporteAntiguo;
use App\Sede;
use App\TipoMantenimiento;
use App\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use RealRashid\SweetAlert\Facades\Alert;
use \PDF;

class MantenimientosController extends Controller
{
    /**function __construct(){
    $this->middleware('roles');
    }**/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search  = $request->get('search');
        $equipos = array();
        if (is_null($search)) {
            $mantenimientos = Mantenimiento::getDatosEquipos();
            return view('mantenimientos.index', [
                'mantenimiento' => new Mantenimiento],
                compact('mantenimientos'));
        } else {

            $mantenimientos = Mantenimiento::search($search)->paginate();
            return view('mantenimientos.index', compact('mantenimientos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Equipo $equipo)
    {
        $componente           = Componente::getComponentes();
        $estados_componente   = EstadoComponente::all();
        //dd($estados_componente);
        $tipos_mantenimientos = TipoMantenimiento::all();
        $id_sede              = (int) $equipo->id_sede;
        $id_empresa           = (int) $equipo->id_empresa;
        $sede_equipo          = Sede::getsedeEquipo($id_sede);
        $empresa_equipo       = Empresa::getempresaEquipo($id_empresa);
        $administradores      = User::getAdministradores();
        return view('mantenimientos.create', [
            'mantenimiento' => new Mantenimiento,
            'equipo'        => $equipo,
            'componente'    => $componente,
        ], compact('tipos_mantenimientos', 'sede_equipo', 'empresa_equipo', 'administradores', 'estados_componente'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveMantenimientosRequest $request)
    {
        $rta = Mantenimiento::create($request->validated());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mantenimientos.show', [
            'mantenimiento' => Mantenimiento::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_mantenimiento     = (int) $id;
        $mantenimiento        = Mantenimiento::getIdEquipo($id_mantenimiento)->first();
        $id_equipo            = $mantenimiento->id_equipo;
        $equipo               = Equipo::findOrFail($id_equipo);
        $componente           = Componente::all();
        $tipos_mantenimientos = TipoMantenimiento::all();
        $administradores      = User::getAdministradores();
        $id_empresa           = $equipo->id_empresa;
        $empresa_equipo       = Empresa::getempresaEquipo($id_empresa);
        $id_sede              = $equipo->id_sede;
        $sede_equipo          = Sede::getsedeEquipo($id_sede);
        return view('mantenimientos.edit', [
            'mantenimiento' => Mantenimiento::findOrFail($id),
            'equipo'        => $equipo,
            'componente'    => $componente,
        ], compact('tipos_mantenimientos', 'sede_equipo', 'empresa_equipo', 'administradores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Mantenimiento $mantenimiento, SaveMantenimientosRequest $request)
    {
        $rta = $mantenimiento->update($request->validated());
        if ($rta) {
            return redirect()->route('home', $mantenimiento);
        } else {
            return $rta;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index');
    }

    public function cargarpdf($equipo)
    {
        $equipo_id = (int) $equipo;
        return view('mantenimientos.cargar_pdf', compact('equipo_id'));

    }
    public function cargarPDF_store(SaveReporteAntiguoRequest $request)
    {

        $ReporteAntiguo = ReporteAntiguo::create($request->validated());
        if ($request->hasFile('ruta')) {
            $path                 = $request->file('ruta')->store('public/files');
            $ReporteAntiguo->ruta = $path;
            $ReporteAntiguo->save();
        }
        return redirect()->route('equipos.index');
    }

    public function ver_pdf_mantenimiento($id_mantenimiento)
    {
        $mantenimiento = Mantenimiento::getMantenimientos_det($id_mantenimiento);
        $pdf           = PDF::loadView('mantenimientos.pdf_mantenimientos', compact('mantenimiento'));
        PDF::setOptions(['dpi' => 150, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream('invoice.pdf');

    }

    /** Método que arma el excel del mantenimiento individualmente**/

    public function descargar_excel_mantenimiento($id_mantenimiento)
    {

        $mantenimiento = Mantenimiento::getMantenimientos_det($id_mantenimiento);
        $spreadsheet   = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("A")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("B")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("C")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("D")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("E")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("F")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("G")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("H")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("I")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("J")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("K")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("L")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("M")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("N")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("O")->setWidth(18);
        $spreadsheet->setActiveSheetIndex(0)->getColumnDimension("P")->setWidth(18);
        $contador_linea = 1;
        $spreadsheet->getActiveSheet()
            ->setCellValue("A" . $contador_linea, "FECHA")
            ->setCellValue("B" . $contador_linea, "EQUIPO")
            ->setCellValue("C" . $contador_linea, "MARCA")
            ->setCellValue("D" . $contador_linea, "SERIE")
            ->setCellValue("E" . $contador_linea, "MODELO")
            ->setCellValue("F" . $contador_linea, "REG. INVIMA")
            ->setCellValue("G" . $contador_linea, "EMPRESA")
            ->setCellValue("H" . $contador_linea, "SEDE")
            ->setCellValue("I" . $contador_linea, "PROBLEMA")
            ->setCellValue("J" . $contador_linea, "REPUESTO")
            ->setCellValue("K" . $contador_linea, "OBSERVACION")
            ->setCellValue("L" . $contador_linea, "NOMBRES TECNICO")
            ->setCellValue("M" . $contador_linea, "APELLIDOS TECNICO")
            ->setCellValue("N" . $contador_linea, "NOMBRES ADMIN")
            ->setCellValue("O" . $contador_linea, "APELLIDOS ADMIN")
            ->setCellValue("P" . $contador_linea, "ID MANT");
        $spreadsheet->getActiveSheet()->getStyle("A" . $contador_linea . ":P" . $contador_linea)->getFont()->setBold(true);
        $contador_linea++;

        foreach ($mantenimiento as $value) {

            $spreadsheet->getActiveSheet()
                ->setCellValue("A" . $contador_linea, $value->created_at)
                ->setCellValue("B" . $contador_linea, mb_strtoupper($value->nombre_equipo))
                ->setCellValue("C" . $contador_linea, mb_strtoupper($value->marca))
                ->setCellValue("D" . $contador_linea, mb_strtoupper($value->serie))
                ->setCellValue("E" . $contador_linea, mb_strtoupper($value->modelo))
                ->setCellValue("F" . $contador_linea, mb_strtoupper($value->registro_invima))
                ->setCellValue("G" . $contador_linea, mb_strtoupper($value->nombre_empresa))
                ->setCellValue("H" . $contador_linea, mb_strtoupper($value->nombre_sede))
                ->setCellValue("I" . $contador_linea, mb_strtoupper(strip_tags($value->problema)))
                ->setCellValue("J" . $contador_linea, mb_strtoupper(strip_tags($value->repuesto)))
                ->setCellValue("K" . $contador_linea, mb_strtoupper(strip_tags($value->observacion)))
                ->setCellValue("L" . $contador_linea, mb_strtoupper($value->nombre1_tec . " " . $value->nombre2_tec))
                ->setCellValue("M" . $contador_linea, mb_strtoupper($value->apellido1_tec . " " . $value->apellido2_tec))
                ->setCellValue("N" . $contador_linea, mb_strtoupper($value->nombre1_tec . " " . $value->nombre2_tec))
                ->setCellValue("O" . $contador_linea, mb_strtoupper($value->apellido1_tec . " " . $value->apellido2_tec))
                ->setCellValue("P" . $contador_linea, mb_strtoupper($value->id));
            $contador_linea++;
        }

        $spreadsheet->getActiveSheet()->setTitle("Reporte de mantenimiento");
        $spreadsheet->setActiveSheetIndex(0);
        $id_usuario = auth()->user()->id;
        $fecha      = getdate();
        $dia        = $fecha["mday"];
        $hora       = $fecha["hours"];
        $minutos    = $fecha["minutes"];
        $segundos   = $fecha["seconds"];
        $writer     = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-type:   application/x-msexcel; charset=utf-8");
        header('Content-Disposition: attachment; filename= "reporte_de_mantenimiento_' . $value->nombre_equipo . '.xlsx"');
        $writer->save('php://output');
        exit;

    }

    public function show_pendientes($mantenimiento_pendiente)
    {
        $id_mantenimiento              = (int) $mantenimiento_pendiente;
        $mantenimientos_pendientes_det = Mantenimiento::getMantenimientosPendientes_det($id_mantenimiento);
        return view('mantenimientos.mantenimientos_pendientes.show', [
        ], compact('mantenimientos_pendientes_det'));
    }

    public function accept($id_mantenimiento)
    {
        $id                        = (int) $id_mantenimiento;
        $mantenimiento             = Mantenimiento::find($id);
        $id_user                   = auth()->user()->id;
        $mantenimientos_pendientes = Mantenimiento::getMantenimientosPendientes($id_user);

        $rta = $mantenimiento->update([
            'ind_estado_aceptado' => 1,
            'fecha_aceptacion'    => NOW(),
        ]);
        if ($rta) {
            Alert::success('El mantenimiento ha sido aceptado');
            return view('home', compact('mantenimientos_pendientes'));
        } else {
            Alert::error('Ha ocurrido un error');
            return view('home', compact('mantenimientos_pendientes'));
        }

    }

    public function refuse($id_mantenimiento)
    {
        $id                        = (int) $id_mantenimiento;
        $mantenimiento             = Mantenimiento::find($id);
        $id_user                   = auth()->user()->id;
        $mantenimientos_pendientes = Mantenimiento::getMantenimientosPendientes($id_user);
        $rta                       = $mantenimiento->update([
            'ind_estado_aceptado' => 2,
        ]);
        if ($rta) {
            Alert::info('El mantenimiento se ha rechazado');
            return view('home', compact('mantenimientos_pendientes'));
        }

    }

}
