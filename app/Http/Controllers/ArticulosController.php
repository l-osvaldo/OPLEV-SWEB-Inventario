<?php

namespace App\Http\Controllers;

use Alert;
use App;
use App\areas;
use App\articulos;
use App\articulosecos;
use App\empleados;
use App\partidas;
use DB;
use Illuminate\Http\Request;
use PDF;

/*************** Funciones para el módulo de Bienes OPLE *****************************/
class ArticulosController extends Controller
{
    /* **********************************************************************************

    Funcionalidad: Constructor  de la clase, sirve para mantener este controlador con la autentificación del logueo del usuario
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

     ********************************************************************************** */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* **********************************************************************************

    Funcionalidad: Obtiene el número maximo del campo consecutivo de la tabla de artículos
    y la tabla articulosecos para obtener el mayor y sumarle uno para obtener
    el numero de inventario para asignar al nuevo artículo
    Parámetros: partida, linea y sublinea
    Retorna: Numero consecutivo maximo de ambas tablas en formato JSON

     ********************************************************************************** */
    public function numeroInventarioMax(Request $request)
    {

        $numeroInventarioMaxOPLE = articulos::where([['partida', $request->partida], ['linea', $request->linea], ['sublinea', $request->sublinea]])->max('consecutivo');

        $numeroInventarioMaxECO = articulosecos::where([['partida', $request->partida], ['linea', $request->linea], ['sublinea', $request->sublinea]])->max('consecutivo');

        if ($numeroInventarioMaxOPLE == null && $numeroInventarioMaxECO == null) {
            $numeroInventarioMax = 0;
        } else {
            if ($numeroInventarioMaxOPLE == null) {
                $numeroInventarioMax = $numeroInventarioMaxECO;
            } else {
                if ($numeroInventarioMaxECO == null) {
                    $numeroInventarioMax = $numeroInventarioMaxOPLE;
                } else {
                    if ($numeroInventarioMaxOPLE < $numeroInventarioMaxECO) {
                        $numeroInventarioMax = $numeroInventarioMaxECO;
                    } else {
                        $numeroInventarioMax = $numeroInventarioMaxOPLE;
                    }
                }
            }
        }

        return response()->json($numeroInventarioMax);
    }

    /* **********************************************************************************
    Funcionalidad: Registra uno y varios artículos en la tabla articulos
    Parámetros: partida, descpartida, linea, desclinea, sublinea, descsublinea, consecutivo, numeroinv,
    concepto, marca, importe, colores, fechacomp, idarea, nombrearea, numemple, nombreemple,
    numserie, medidas, modelo, material, clvestado, estado, factura
    Retorna: Un Alert de registro exitoso y redirecciona a la vista de Bienes.blade.php

     ********************************************************************************** */
    public function store(Request $request)
    {
        //print_r($request);

        $arrayPartida     = explode("*", $request->input('partidaAltaArticulo'));
        $arrayLinea       = explode("*", $request->input('lineaAltaArticulo'));
        $arraySubLinea    = explode("*", $request->input('sublineaAltaArticulo'));
        $arrayConsecutivo = explode(",", $request->txtConsecutivo);
        $arrayNumeroInv   = explode(",", $request->txtArregloNumInv);

        for ($i = 0; $i < sizeof($arrayConsecutivo); $i++) {

            $fecha = explode("-", $request->dateFechaCompra);

            $fechaOPLE = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];

            $articulo = new articulos();

            $articulo->iev          = 'OPLE';
            $articulo->partida      = $arrayPartida[0];
            $articulo->descpartida  = $arrayPartida[1];
            $articulo->linea        = $arrayLinea[0];
            $articulo->desclinea    = $arrayLinea[1];
            $articulo->sublinea     = $arraySubLinea[0];
            $articulo->descsublinea = $arraySubLinea[1];
            $articulo->consecutivo  = $arrayConsecutivo[$i];
            $articulo->numeroinv    = $arrayNumeroInv[$i];
            $articulo->concepto     = $request->txtConceptoEnv;
            $articulo->marca        = $request->txtMarca;
            $articulo->importe      = $request->txtImporte;
            $articulo->colores      = $request->txtColor;
            $articulo->fechacomp    = $fechaOPLE;
            $articulo->idarea       = $request->txtAreaClave;
            $articulo->nombrearea   = $request->txtAreaNombre;
            $articulo->numemple     = $request->txtResponsableNumEmpleado;
            $articulo->nombreemple  = $request->txtResponsableNombre;
            $articulo->numserie     = $request->txtNumSerie;
            $articulo->medidas      = $request->txtMedidas;
            $articulo->modelo       = $request->txtModelo;
            $articulo->material     = $request->txtMaterial;
            $articulo->clvestado    = $request->txtEstadoClave;
            $articulo->estado       = $request->txtEstadoNombre;
            $articulo->factura      = $request->txtFactura;
            $articulo->idclasi      = '0';

            $articulo->save();

        }

        Alert::success('Artículo guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('catalogos');
    }

    // ************ vista de reportes ************

    /* **********************************************************************************
    Funcionalidad: Vista principal del módulo de reportes
    Parámetros: No recibe parámetros
    Retorna: Una vista con las opciones de los reportes que puede ejegir, reportes.blade.php

     ********************************************************************************** */
    public function reportes()
    {
        $usuario   = auth()->user();
        $partidas  = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $areas     = areas::distinct()->orderBy('idarea', 'ASC')->get(['idarea', 'nombrearea']);
        $empleados = empleados::orderBy('nombre', 'ASC')->get();

        return view('ople.reportes', compact('usuario', 'partidas', 'areas', 'empleados'));
    }

    // ************ vista previa de reportes ************

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte bienes por partida, de una partida en especial desplegara todos los bienes de esa partida.
    Parámetros: partida
    Retorna: Una vista previa del reporte, BienesPorPartida.blade.php

     ********************************************************************************** */
    public function BienesXPartida(Request $request)
    {

        $partida       = $request;
        $bienesPartida = articulos::where('partida', $request->numPartida)->orderBy('concepto')->get();
        $totalImporte  = DB::table('articulos')->select(DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();

        foreach ($totalImporte as $value) {
            $value->total = number_format($value->total, 2);
        }

        foreach ($bienesPartida as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        return view('ople.reportes.BienesPorPartida', compact('partida', 'bienesPartida', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte concentrado de bienes por área,
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, ImporteDeBienesPorArea.blade.php

     ********************************************************************************** */
    public function importeBienesPorArea()
    {

        $areaAndImporteTotal = areas::select('idarea','nombrearea')->orderBy('idarea','asc')->get();

        $totalImporte        = 0;

        foreach ($areaAndImporteTotal as $value) {
            $importe= articulos::select(DB::raw('SUM(importe) as importetotal'))->where('idarea', $value->idarea)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalPartida', $importeFormat);
            }else {
                array_add($value, 'importeTotalPartida', '0.00');
            } 
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('ople.reportes.ImporteDeBienesPorArea', compact('areaAndImporteTotal', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte concentrado de bienes por partida
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, ImporteDeBienesPorPartida.blade.php

     ********************************************************************************** */
    public function importeBienesPorPartida()
    {
        $partidaAndImporteTotal = partidas::select('partida','descpartida')->orderBy('partida','asc')->get();

        $totalImporte           = 0;

        foreach ($partidaAndImporteTotal as $value) {
            $importe= articulos::select(DB::raw('SUM(importe) as importetotal'))->where('partida', $value->partida)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalPartida', $importeFormat);
            }else {
                array_add($value, 'importeTotalPartida', '0.00');
            }
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('ople.reportes.ImporteDeBienesPorPartida', compact('partidaAndImporteTotal', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte inventario por área
    Parámetros: numArea
    Retorna: Una vista previa del reporte, InventarioPorArea.blade.php

     ********************************************************************************** */

    public function inventarioPorArea(Request $request)
    {

        $area         = $request;
        $bienesArea   = articulos::where('idarea', $request->numArea)->orderBy('concepto')->get();
        $totalImporte = 0;
        foreach ($bienesArea as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('ople.reportes.InventarioPorArea', compact('area', 'bienesArea', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte inventario por orden alfabetico, donde muestra todos lo artículos que existen en la tabla articulos por orden alfabetico
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, InventarioPorOrdenAlfabetico.blade.php

     ********************************************************************************** */

    public function inventarioPorOrdenAlfabetico()
    {

        $bienesAlfabetico = articulos::orderBy('concepto', 'DESC')->get();
        $totalImporte     = 0;
        foreach ($bienesAlfabetico as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('ople.reportes.InventarioPorOrdenAlfabetico', compact('bienesAlfabetico', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte resguado por empleado, donde muestra todos lo artículos que un empleado a su resguardo
    Parámetros: numEmpleado
    Retorna: Una vista previa del reporte, ResguardoPorEmpleado.blade.php

     ********************************************************************************** */

    public function ResguardoPorEmpleado(Request $request)
    {

        $datosEmpleado  = empleados::select('numemple', 'nombre', 'nombrearea')->where('numemple', $request->numEmpleado)->get();
        $articulos      = articulos::where('numemple', $request->numEmpleado)->get();
        $totalArticulos = DB::table('articulos')->select(DB::raw('COUNT(numeroinv) as total'))->where('numemple', $request->numEmpleado)->get();
        $totalImporte   = 0;
        foreach ($articulos as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }
        $totalImporte = number_format($totalImporte, 2);

        return view('ople.reportes.ResguardoPorEmpleado', compact('datosEmpleado', 'articulos', 'totalArticulos', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte importe de bienes por año de adquisición, donde muestra todos las partidas y su importe total por el año que se seleccione.
    Parámetros: anioAdquisicón
    Retorna: Una vista previa del reporte, ImporteDeBienesPorAnioAdquisicion.blade.php

     ********************************************************************************** */

    public function importeBienesAnioAdquisicion(Request $request)
    {
        $partidas        = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $anioAdquisicion = $request;

        foreach ($partidas as $value) {
            $articulos = DB::table('articulos')->select('fechacomp', 'importe')->where([['partida', $value->partida], ['fechacomp', 'like', '%' . $request->anioAdquisicion . '%']])->whereNotIn('fechacomp', ['  -   -'])->get();

            $meses = array("0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00");
            $total = "0.00";

            foreach ($articulos as $art) {
                if (strpos($art->fechacomp, '-')) {
                    $fecha = explode("-", $art->fechacomp);
                } else {
                    $fecha = explode("/", $art->fechacomp);
                }

                $meses[$fecha[1] - 1] = $meses[$fecha[1] - 1] + $art->importe;
                $total                = $total + $art->importe;

            }
            $total = number_format($total, 2);
            array_add($value, 'meses', $meses);
            array_add($value, 'total', $total);
        }

        return view('ople.reportes.ImporteDeBienesPorAnioAdquisicion', compact('partidas', 'anioAdquisicion'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte bienes por área y ordenado por empleado, donde muestra todos los bienes que cuenta un área en especifico ordenado por el empleado que lo tiene en su resguardo
    Parámetros: area
    Retorna: Una vista previa del reporte, BienesDeUnAreaOrdenadoPorEmpleado.blade.php

     ********************************************************************************** */

    public function bienesAreaOrdenadoEmpleado(Request $request)
    {
        $area = explode("*", $request->area);

        $idarea     = $area[0];
        $nombrearea = $area[1];

        $articulos = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreemple', 'ASC')->get();

        foreach ($articulos as $articulo) {
            $articulo->importe = number_format($articulo->importe, 2);
        }

        return view('ople.reportes.BienesDeUnAreaOrdenadoPorEmpleado', compact('nombrearea', 'articulos'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte inventario por orden alfabetico nuevo, donde muestra todos los artículos ordenados por partida y luego por orden alfabetico
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, InventarioPorOrdenAlfabeticoNuevo.blade.php

     ********************************************************************************** */
    public function inventarioPorOrdenAlfabeticoNuevo()
    {

        $partidas = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);

        foreach ($partidas as $partida) {
            $articulos    = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'factura', 'importe')->where('partida', $partida->partida)->orderBy('concepto', 'ASC')->get();
            $totalImporte = 0;

            foreach ($articulos as $key => $articulo) {
                $totalImporte += $articulo->importe;
                $articulo->importe = number_format($articulo->importe, 2);
            }

            $totalImporte = number_format($totalImporte, 2);

            array_add($partida, 'totalImportePartida', $totalImporte);
            array_add($partida, 'articulos', $articulos);
        }

        //echo $partidas;

        return view('ople.reportes.InventarioPorOrdenAlfabeticoNuevo', compact('partidas'));
    }

    public function inventarioDeLaBodega()
    {

        $articulos = articulos::select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where('idarea', '15')->get();

        $totalImporte = articulos::select(DB::raw('SUM(importe) as total'))->where('idarea', '15')->get();

        $totalImporte = number_format($totalImporte[0]->total, 2);

        return view('ople.reportes.InventarioDeLaBodega', compact('articulos', 'totalImporte'));
    }

    public function inventarioAnioPartidaFactura(Request $request)
    {
        $articulos = articulos::select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')
            ->where([['fechacomp', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])
            ->orderBy('factura', 'ASC')
            ->get();

        $totalImporte = articulos::select(DB::raw('SUM(importe) as total'))
            ->where([['fechacomp', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])->get();

        $totalImporte = number_format($totalImporte[0]->total, 2);

        $anio        = $request->anio;
        $partida     = $request->partida;
        $descpartida = $request->descpartida;

        return view('ople.reportes.InventarioOrdenadoPorAnioPartidaFactura', compact('articulos', 'totalImporte', 'anio', 'partida', 'descpartida'));
    }

    // ************ generar reportes ************

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de bienes por partida, donde muentra todos los bienes que tiene una partida en especifico.
    Parámetros: numPartida
    Retorna: Retorna un pdf, BienesPorPartidaPDF.pdf

     ********************************************************************************** */
    public function BienesPorPartida(Request $request)
    {

        $partida       = $request;
        $bienesPartida = articulos::where('partida', $request->numPartida)->orderBy('concepto')->get();
        $totalImporte  = DB::table('articulos')->select(DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();

        foreach ($totalImporte as $value) {
            $value->total = number_format($value->total, 2);
        }

        foreach ($bienesPartida as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        $pdf = PDF::loadView('ople.reportes.pdf.BienesPorPartidaPDF', compact('partida', 'bienesPartida', 'totalImporte'))->setPaper('legal', 'landscape');

        return $pdf->inline('BienesPorPartida-' . $request->nombrePartida . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de concentrado de bienes por área, donde muentra todas las áreas y su total de importe de todos los artículos de esa área
    Parámetros: no recibe parámetros
    Retorna: Retorna un pdf, ImporteDeBienesPorArea.pdf

     ********************************************************************************** */
    public function importeBienesPorAreaPDF()
    {
        $areaAndImporteTotal = areas::select('idarea','nombrearea')->orderBy('idarea','asc')->get();

        $totalImporte        = 0;

        foreach ($areaAndImporteTotal as $value) {
            $importe= articulos::select(DB::raw('SUM(importe) as importetotal'))->where('idarea', $value->idarea)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalPartida', $importeFormat);
            }else {
                array_add($value, 'importeTotalPartida', '0.00');
            } 
        }

        $totalImporte = number_format($totalImporte, 2);
        $hoy          = getdate();

        $fecha = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'];

        $pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorAreaPDF', compact('fecha', 'totalImporte', 'areaAndImporteTotal'))->setPaper('letter', 'portrait');
        return $pdf->inline('ImporteDeBienesPorArea.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de concentrado de bienes por partida, donde muentra todas las partidas y su total de importe de todos los artículos de esas partidas
    Parámetros: no recibe parámetros
    Retorna: Retorna un pdf, ImporteBienesPorPartida.pdf

     ********************************************************************************** */
    public function importeBienesPorPartidaPDF()
    {

        $partidaAndImporteTotal = partidas::select('partida','descpartida')->orderBy('partida','asc')->get();

        $totalImporte           = 0;

        foreach ($partidaAndImporteTotal as $value) {
            $importe= articulos::select(DB::raw('SUM(importe) as importetotal'))->where('partida', $value->partida)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalPartida', $importeFormat);
            }else {
                array_add($value, 'importeTotalPartida', '0.00');
            }
        }

        $totalImporte = number_format($totalImporte, 2);

        $hoy = getdate();

        $fecha = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'];

        $pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorPartidaPDF', compact('fecha', 'partidaAndImporteTotal', 'totalImporte'))->setPaper('letter', 'portrait');
        return $pdf->inline('ImporteBienesPorPartida.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de inventario por área, donde muestra todos los artículos de una área en especial.
    Parámetros: numArea.
    Retorna: Retorna un pdf, InventarioPorArea.pdf

     ********************************************************************************** */
    public function inventarioPorAreaPDF(Request $request)
    {
        $area         = $request;
        $bienesArea   = articulos::where('idarea', $request->numArea)->orderBy('concepto')->get();
        $totalImporte = 0;
        foreach ($bienesArea as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        $pdf = PDF::loadView('ople.reportes.pdf.InventarioPorAreaPDF', compact('area', 'bienesArea', 'totalImporte'))->setPaper('legal', 'landscape');
        return $pdf->inline('InventarioPorArea-' . $request->nombreArea . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de inventario por orden alfabético , donde muestra todos los artículos la base de datos, de la tabla articulos ordenados alfabeticamente.
    Parámetros: No recibe parámetros
    Retorna: Retorna un pdf, inventarioPorOrdenAlfabetico.pdf

     ********************************************************************************** */
    public function inventarioPorOrdenAlfabeticoPDF()
    {

        $bienesAlfabetico = articulos::orderBy('concepto', 'ASC')->get();
        $totalImporte     = 0;
        foreach ($bienesAlfabetico as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        $pdf = PDF::loadView('ople.reportes.pdf.InventarioPorOrdenAlfabeticoPDF', compact('bienesAlfabetico', 'totalImporte'))->setPaper('legal', 'landscape');
        return $pdf->inline('inventarioPorOrdenAlfabetico.pdf');

    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF del resguardo por empleado , donde muestra todos los artículos que tiene en su resguardo un empleado es especifico.
    Parámetros: numEmpleado
    Retorna: Retorna un pdf, ResguardoPorEmpleado.pdf

     ********************************************************************************** */
    public function ResguardoPorEmpleadoPDF(Request $request)
    {

        $datosEmpleado  = empleados::select('numemple', 'nombre', 'nombrearea', 'cargo')->where('numemple', $request->numEmpleado)->get();
        $articulos      = articulos::where('numemple', $request->numEmpleado)->get();
        $totalArticulos = DB::table('articulos')->select(DB::raw('COUNT(numeroinv) as total'))->where('numemple', $request->numEmpleado)->get();
        $totalImporte   = 0;
        foreach ($articulos as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }
        $totalImporte = number_format($totalImporte, 2);

        $hoy = getdate();

        $fecha = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'];

        $pdf = PDF::loadView('ople.reportes.pdf.ResguardoPorEmpleadoPDF', compact('datosEmpleado', 'articulos', 'totalArticulos', 'totalImporte', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->inline('ResguardoPorEmpleado-' . $request->nombreEmpleado . '.pdf');

    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF del importe de bienes por año de adquisición, donde muestra todos las partidas y su importe total por el año que se seleccione.
    Parámetros: anioAdquisicón
    Retorna: Retorna un pdf, ImporteDeBienesPorAñoDeAdquisicion.pdf

     ********************************************************************************** */
    public function importeBienesAnioAdquisicionPDF(Request $request)
    {
        $partidas        = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $anioAdquisicion = $request;

        foreach ($partidas as $value) {
            $articulos = DB::table('articulos')->select('fechacomp', 'importe')->where([['partida', $value->partida], ['fechacomp', 'like', '%' . $request->anioAdquisicion . '%']])->whereNotIn('fechacomp', ['  -   -'])->get();

            $meses = array("0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00",
                "0.00");
            $total = "0.00";

            foreach ($articulos as $art) {
                if (strpos($art->fechacomp, '-')) {
                    $fecha = explode("-", $art->fechacomp);
                } else {
                    $fecha = explode("/", $art->fechacomp);
                }

                $meses[$fecha[1] - 1] = $meses[$fecha[1] - 1] + $art->importe;
                $total                = $total + $art->importe;
            }

            array_add($value, 'meses', $meses);
            array_add($value, 'total', $total);
        }

        $pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorAnioAdquisicionPDF', compact('partidas', 'anioAdquisicion'))->setPaper('letter', 'landscape');
        return $pdf->inline('ImporteDeBienesPorAñoDeAdquisicion-' . $request->anioAdquisicion . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de bienes por área ordenados por empleados, donde muestra todos los artículos de un área ordenados por empleado
    Parámetros: area
    Retorna: Retorna un pdf, BienesDeUnAreaOrdenadoPorEmpleado.pdf

     ********************************************************************************** */

    public function bienesAreaOrdenadoEmpleadoPDF(Request $request)
    {
        $area = explode("*", $request->area);

        $idarea     = $area[0];
        $nombrearea = $area[1];

        $articulos = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreemple', 'ASC')->get();

        $pdf = PDF::loadView('ople.reportes.pdf.BienesDeUnAreaOrdenadoPorEmpleadoPDF', compact('nombrearea', 'articulos'))->setPaper('letter', 'landscape');
        return $pdf->inline('BienesDeUnAreaOrdenadoPorEmpleado-' . $nombrearea . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de inventario por orden alfabético nuevo, donde muestra todos los artículos del sistema de la tabla articulos, ordenados por partida y luego por orden alfabético.
    Parámetros: No recibe parámetros
    Retorna: Retorna un pdf, InventarioPorOrdenAlfabeticoNuevo.pdf

     ********************************************************************************** */
    public function inventarioPorOrdenAlfabeticoNuevoPDF()
    {
        $partidas    = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $numPartidas = partidas::count();

        foreach ($partidas as $partida) {
            $articulos           = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'factura', 'importe')->where('partida', $partida->partida)->orderBy('concepto', 'ASC')->get();
            $numArticulosPartida = articulos::where('partida', $partida->partida)->count();
            $totalImporte        = 0;
            foreach ($articulos as $key => $articulo) {
                $totalImporte += $articulo->importe;
                $articulo->importe = number_format($articulo->importe, 2);
            }

            $totalImporte = number_format($totalImporte, 2);

            array_add($partida, 'totalImportePartida', $totalImporte);
            array_add($partida, 'articulos', $articulos);
            array_add($partida, 'numeroArticulos', $numArticulosPartida);
        }

        $pdf = PDF::loadView('ople.reportes.pdf.InventarioPorOrdenAlfabeticoNuevoPDF', compact('partidas', 'numPartidas'))->setPaper('letter', 'landscape');
        return $pdf->inline('InventarioPorOrdenAlfabeticoNuevo.pdf');
    }

    public function inventarioDeLaBodegaPDF()
    {
        $articulos = articulos::select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where('idarea', '15')->get();

        $totalImporte = articulos::select(DB::raw('SUM(importe) as total'))->where('idarea', '15')->get();
        $totalBienes  = articulos::where('idarea', '15')->count();

        $totalImporte = number_format($totalImporte[0]->total, 2);
        $totalBienes  = number_format($totalBienes);

        $pdf = PDF::loadView('ople.reportes.pdf.InventarioDeLaBodegaDPF', compact('articulos', 'totalImporte', 'totalBienes'))->setPaper('letter', 'landscape');
        return $pdf->inline('InventarioDeLaBodegaDPF.pdf');
    }

    public function inventarioAnioPartidaFacturaPDF(Request $request)
    {
        $articulos = articulos::select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')
            ->where([['fechacomp', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])
            ->orderBy('factura', 'ASC')
            ->get();

        $totalImporte = articulos::select(DB::raw('SUM(importe) as total'))
            ->where([['fechacomp', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])->get();

        $totalImporte = number_format($totalImporte[0]->total, 2);

        $anio        = $request->anio;
        $partida     = $request->partida;
        $descpartida = $request->descpartida;

        $pdf = PDF::loadView('ople.reportes.pdf.InventarioOrdenadoPorAnioPartidaFacturaPDF', compact('articulos', 'totalImporte', 'anio', 'partida', 'descpartida'))->setPaper('letter', 'landscape');

        return $pdf->inline('InventarioOrdenadoPorAñoPartidaFacturaPDF-' . $anio . '-' . $partida . '-' . $descpartida . '.pdf');
    }

    // ************ editar artículo ************

    /* **********************************************************************************

    Funcionalidad: Obtiene toda la información de un artículo en especial, obtenida por el numeroinv de este
    Parámetros: numeroinv
    Retorna: Regresa con un JSON con toda la información obtenida del artículo en la base de datos:
    partida, descpartida, linea, desclinea, sublinea, descsublinea, consecutivo, numeroinv,
    concepto, marca, importe, colores, fechacomp, idarea, nombrearea, numemple, nombreemple,
    numserie, medidas, modelo, material, clvestado, estado, factura

     ********************************************************************************** */
    public function InformacionArticulo(Request $request)
    {

        $infoArticulo = articulos::where('numeroinv', $request->numInventario)->get();

        foreach ($infoArticulo as $value) {
            if ($value->fechacomp == '  -   -') {
                $value->fechacomp = '0';
            } else {
                if (strpos($value->fechacomp, '/')) {

                    $fecha = explode("/", $value->fechacomp);
                    if (strlen($fecha[2]) == 4) {
                        $dia  = $fecha[0];
                        $mes  = $fecha[1];
                        $anio = $fecha[2];

                        $value->fechacomp = $anio . '-' . $mes . '-' . $dia;
                    }
                }

            }
        }

        return response()->json($infoArticulo);
    }

    /* **********************************************************************************

    Funcionalidad: Actualiza la información de un artículo en especial.
    Parámetros: estado, clvestado, medidas, material, colores, numserie, modelo, marca, fechacomp, importe, factura
    Retorna: Regresa un Alert con el mensaje de actualización exitosa y redirecciona a la vista de Bienes OPLE

     ********************************************************************************** */

    public function EditarArticulos(Request $request)
    {

        $nombreEstado = '';

        switch ($request->editarEstado) {
            case '1':
                $nombreEstado = 'BUENO';
                break;
            case '2':
                $nombreEstado = 'REGULAR';
                break;
            case '3':
                $nombreEstado = 'OBSOLETO';
                break;
            case '4':
                $nombreEstado = 'INSERVIBLE';
                break;
            case '6':
                $nombreEstado = 'NO LOCALIZADO';
                break;
        }

        if ($request->editarDateFechaCompra === '' || $request->editarDateFechaCompra == null) {
            $fechaOPLE = '- -';
        } else {
            $fecha = explode("-", $request->editarDateFechaCompra);

            $fechaOPLE = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
        }

        $articulo = articulos::where('numeroinv', $request->numeroInventario)
            ->update([
                'estado'    => $nombreEstado,
                'clvestado' => $request->editarEstado,
                'medidas'   => $request->editarMedidas,
                'material'  => $request->editarMaterial,
                'colores'   => $request->editarColor,
                'numserie'  => $request->EditarNumSerie,
                'modelo'    => $request->editarModelo,
                'marca'     => $request->editarMarca,
                'fechacomp' => $fechaOPLE,
                'importe'   => $request->editarImporte,
                'factura'   => $request->editarFactura]);

        Alert::success('Datos Actualizados', 'Actualización Exitoso')->autoclose(2500);
        return redirect()->route('catalogos');
    }

    // ************ Depreciación ************

    /* **********************************************************************************

    Funcionalidad: Obtiene todas las partidas para la vista principal del módulo de depreciación
    Parámetros: No recibe parámetros
    Retorna: Vista del menu de depreciación, depreciacionMenu.blade.php

     ********************************************************************************** */
    public function depreciacion()
    {
        $usuario  = auth()->user();
        $partidas = partidas::select('partida', 'descpartida')->whereNotNull(['porcentajeDepreciacion', 'aniosvida'])->get();

        return view('depreciacion.depreciacionMenu', compact('usuario', 'partidas'));
    }

    /* **********************************************************************************

    Funcionalidad: Calcula de depreciación de los artículos de una partida en especial
    Parámetros: numPartida
    Retorna: Vista del resultado de la depreciación, tablaDepreciacion.blade.php

     ********************************************************************************** */

    public function calculoDepreciacion(Request $request)
    {
        $partida        = $request;
        $articulos      = articulos::select('numeroinv', 'concepto', 'fechacomp', 'importe')->where('partida', $request->numPartida)->whereNotIn('fechacomp', ['  -   -'])->get();
        $noDepreciacion = articulos::select('numeroinv', 'concepto', 'importe')->where([['partida', $request->numPartida], ['fechacomp', '=', '  -   -']])->get();
        $datosPartida   = partidas::where('partida', $request->numPartida)->get();

        // Año anterior al año en curso
        $anioAnterior = date('Y', strtotime('-1 year'));
        $anioActual   = date('Y');
        $mesActual    = date('m');

        foreach ($articulos as $value) {

            // valor del bien por el porcentaje de depreciación
            $valorResidual = round(($value->importe * ($datosPartida[0]['porcentajeDepreciacion'] / 100)), 2);

            // VALOR DEL BIEN MENOS VALOR RESIDUAL
            $valorDelBienMenosValorResidual = round(($value->importe - $valorResidual), 2);

            //Depreciación anual ((VALOR DEL BIEN MENOS VALOR RESIDUAL) / (años de devaluación))
            $depreciacionAnual = round(($valorDelBienMenosValorResidual / $datosPartida[0]['aniosvida']), 2);

            // Depreciación mensual (depreciación anual / 12)
            $depreciacionMensual = round(($depreciacionAnual / 12), 2);

            // clasificación por fecha
            $fecha = str_replace('/', '-', $value->fechacomp);

            $anioCompra = date("Y", strtotime($fecha));

            $fecha = date("d-m-Y", strtotime($fecha . "+ " . $datosPartida[0]['aniosvida'] . " year"));

            $anioArticuloDepreciacion = date('Y', strtotime($fecha)); // año del artículo mas los años de depreciación

            $mesArticuloDepreciacion = date('m', strtotime($fecha));

            $saldo = $value->importe;

            if ($anioArticuloDepreciacion < $anioActual) {
                $eneroD      = ' - ';
                $febreroD    = ' - ';
                $marzoD      = ' - ';
                $abrilD      = ' - ';
                $mayoD       = ' - ';
                $junioD      = ' - ';
                $julioD      = ' - ';
                $agostoD     = ' - ';
                $septiembreD = ' - ';
                $octubreD    = ' - ';
                $noviembreD  = ' - ';
                $diciembreD  = ' - ';

                $eneroSaldo      = $valorResidual;
                $febreroSaldo    = $valorResidual;
                $marzoSaldo      = $valorResidual;
                $abrilSaldo      = $valorResidual;
                $mayoSaldo       = $valorResidual;
                $junioSaldo      = $valorResidual;
                $julioSaldo      = $valorResidual;
                $agostoSaldo     = $valorResidual;
                $septiembreSaldo = $valorResidual;
                $octubreSaldo    = $valorResidual;
                $noviembreSaldo  = $valorResidual;
                $diciembreSaldo  = $valorResidual;

                $saldo = $valorResidual;

            } else {

                if ($mesActual <= $mesArticuloDepreciacion) {
                    $mes = $mesActual;
                } else {
                    $mes = $mesArticuloDepreciacion;
                }
                for ($i = 0; $i < 12; $i++) {
                    if ($mes >= ($i + 1)) {
                        if ($i == 0) {
                            $eneroD = $depreciacionMensual;

                            $aniosFaltaDepreciacion = $anioArticuloDepreciacion - $anioActual;
                            $aniosDepreciando       = $anioActual - $anioCompra;

                            for ($j = 0; $j < ($aniosDepreciando - 1); $j++) {
                                $saldo = $saldo - $depreciacionAnual;
                            }

                            $eneroSaldo = $saldo - $depreciacionMensual;
                            $saldo      = $eneroSaldo;
                        }
                        if ($i == 1) {
                            $febreroD     = $depreciacionMensual;
                            $febreroSaldo = $eneroSaldo - $depreciacionMensual;
                            $saldo        = $febreroSaldo;
                        }
                        if ($i == 2) {
                            $marzoD     = $depreciacionMensual;
                            $marzoSaldo = $febreroSaldo - $depreciacionMensual;
                            $saldo      = $marzoSaldo;
                        }
                        if ($i == 3) {
                            $abrilD     = $depreciacionMensual;
                            $abrilSaldo = $marzoSaldo - $depreciacionMensual;
                            $saldo      = $abrilSaldo;
                        }
                        if ($i == 4) {
                            $mayoD     = $depreciacionMensual;
                            $mayoSaldo = $abrilSaldo - $depreciacionMensual;
                            $saldo     = $mayoSaldo;
                        }
                        if ($i == 5) {
                            $junioD     = $depreciacionMensual;
                            $junioSaldo = $mayoSaldo - $depreciacionMensual;
                            $saldo      = $junioSaldo;
                        }
                        if ($i == 6) {
                            $julioD     = $depreciacionMensual;
                            $julioSaldo = $junioSaldo - $depreciacionMensual;
                            $saldo      = $julioSaldo;
                        }
                        if ($i == 7) {
                            $agostoD     = $depreciacionMensual;
                            $agostoSaldo = $julioSaldo - $depreciacionMensual;
                            $saldo       = $agostoSaldo;
                        }
                        if ($i == 8) {
                            $septiembreD     = $depreciacionMensual;
                            $septiembreSaldo = $agostoSaldo - $depreciacionMensual;
                            $saldo           = $septiembreSaldo;
                        }
                        if ($i == 9) {
                            $octubreD     = $depreciacionMensual;
                            $octubreSaldo = $septiembreSaldo - $depreciacionMensual;
                            $saldo        = $octubreSaldo;
                        }
                        if ($i == 10) {
                            $noviembreD     = $depreciacionMensual;
                            $noviembreSaldo = $octubreSaldo - $depreciacionMensual;
                            $saldo          = $noviembreSaldo;
                        }
                        if ($i == 11) {
                            $diciembreD     = $depreciacionMensual;
                            $diciembreSaldo = $noviembreSaldo - $depreciacionMensual;
                            $saldo          = $diciembreSaldo;
                        }
                    } else {
                        if ($i == 0) {
                            $eneroD     = ' - ';
                            $eneroSaldo = $saldo;
                        }
                        if ($i == 1) {
                            $febreroD     = ' - ';
                            $febreroSaldo = $saldo;
                        }
                        if ($i == 2) {
                            $marzoD     = ' - ';
                            $marzoSaldo = $saldo;
                        }
                        if ($i == 3) {
                            $abrilD     = ' - ';
                            $abrilSaldo = $saldo;
                        }
                        if ($i == 4) {
                            $mayoD     = ' - ';
                            $mayoSaldo = $saldo;
                        }
                        if ($i == 5) {
                            $junioD     = ' - ';
                            $junioSaldo = $saldo;
                        }
                        if ($i == 6) {
                            $julioD     = ' - ';
                            $julioSaldo = $saldo;
                        }
                        if ($i == 7) {
                            $agostoD     = ' - ';
                            $agostoSaldo = $saldo;
                        }
                        if ($i == 8) {
                            $septiembreD     = ' - ';
                            $septiembreSaldo = $saldo;
                        }
                        if ($i == 9) {
                            $octubreD     = ' - ';
                            $octubreSaldo = $saldo;
                        }
                        if ($i == 10) {
                            $noviembreD     = ' - ';
                            $noviembreSaldo = $saldo;
                        }
                        if ($i == 11) {
                            $diciembreD     = ' - ';
                            $diciembreSaldo = $saldo;
                        }
                    }
                }

            }

            $fecha = str_replace('-', '/', $fecha);
            set_time_limit(5000);

            // agregar los nuevos campos de los cálculos realizados al arreglo de los artículos
            array_add($value, 'valorresidual', $valorResidual);
            array_add($value, 'bienmenosresidual', $valorDelBienMenosValorResidual);
            array_add($value, 'saldo', $saldo);
            array_add($value, 'depreciacionMensual', $depreciacionMensual);
            array_add($value, 'depreciacionAnual', $depreciacionAnual);

            array_add($value, 'eneroD', $eneroD);
            array_add($value, 'febreroD', $febreroD);
            array_add($value, 'marzoD', $marzoD);
            array_add($value, 'abrilD', $abrilD);
            array_add($value, 'mayoD', $mayoD);
            array_add($value, 'junioD', $junioD);
            array_add($value, 'julioD', $julioD);
            array_add($value, 'agostoD', $agostoD);
            array_add($value, 'septiembreD', $septiembreD);
            array_add($value, 'octubreD', $octubreD);
            array_add($value, 'noviembreD', $noviembreD);
            array_add($value, 'diciembreD', $diciembreD);

            array_add($value, 'eneroSaldo', $eneroSaldo);
            array_add($value, 'febreroSaldo', $febreroSaldo);
            array_add($value, 'marzoSaldo', $marzoSaldo);
            array_add($value, 'abrilSaldo', $abrilSaldo);
            array_add($value, 'mayoSaldo', $mayoSaldo);
            array_add($value, 'junioSaldo', $junioSaldo);
            array_add($value, 'julioSaldo', $julioSaldo);
            array_add($value, 'agostoSaldo', $agostoSaldo);
            array_add($value, 'septiembreSaldo', $septiembreSaldo);
            array_add($value, 'octubreSaldo', $octubreSaldo);
            array_add($value, 'noviembreSaldo', $noviembreSaldo);
            array_add($value, 'diciembreSaldo', $diciembreSaldo);

        }

        return view('depreciacion.tablaDepreciacion', compact('partida', 'articulos', 'noDepreciacion', 'datosPartida', 'anioAnterior', 'anioActual'));
    }

    /* **********************************************************************************

    Funcionalidad: Muestra de depreciación de un mes en especifico, de todas las partidas su total y su depreciación mensual.
    Parámetros: fecha
    Retorna: Un reporte en pdf, DEPRECIACIÓN.pdf

     ********************************************************************************** */

    public function reportePDFDepreciacion(Request $request)
    {

        $fecha = explode("-", $request->fecha);
        $meses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');

        $mes  = $fecha[1];
        $anio = $fecha[2];

        $totalDiasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
        $nombreMes    = $meses[$mes - 1];

        if ($anio < 2000) {
            $anio = ' DE ' . $anio;
        } else {
            $anio = ' DEL ' . $anio;
        }

        if ($mes != 1) {
            $mesAnterior = $meses[$mes - 2];
        } else {
            $anio2        = $fecha[2];
            $anioAnterior = intval($anio2) - 1;
            $mesAnterior  = $meses[11] . ' (' . $anioAnterior . ')';
        }

        $partidas = articulos::select('partida', 'descpartida', DB::raw('ROUND(SUM(importe),2) as totalimporte'))->whereNotIn('partida', ['56900001'])->orderBy('partida')->groupBy('partida', 'descpartida')->get();

        $anioActual = date('Y');
        $mesActual  = $mes;

        $totalPartidaRegistroPasado = 0;
        $totaldepreciacionActual    = 0;
        $totalDelMes                = 0;

        $totalesPartidas     = array();
        $totalesDepreciacion = array();
        $totalesTotal        = array();

        foreach ($partidas as $partida) {
            // echo $partida['partida'];
            // exit;

            $articulos = articulos::select('numeroinv', 'fechacomp', 'importe')->where('partida', $partida['partida'])->whereNotIn('fechacomp', ['  -   -'])->get();

            $datosPartida = partidas::where('partida', $partida['partida'])->get();

            $totalPorPartida = 0;

            $totalDepreciacionPartida = 0;

            $registroPasadoMenosDepreciacion = 0;

            foreach ($articulos as $articulo) {

                if ($datosPartida[0]['porcentajeDepreciacion'] !== null) {
                    // valor del bien por el porcentaje de depreciación
                    $valorResidual = round(($articulo->importe * ($datosPartida[0]['porcentajeDepreciacion'] / 100)), 2);

                    // VALOR DEL BIEN MENOS VALOR RESIDUAL
                    $valorDelBienMenosValorResidual = round(($articulo->importe - $valorResidual), 2);

                    //Depreciación anual ((VALOR DEL BIEN MENOS VALOR RESIDUAL) / (años de devaluación))
                    $depreciacionAnual = round(($valorDelBienMenosValorResidual / $datosPartida[0]['aniosvida']), 2);

                    // Depreciación mensual (depreciación anual / 12)
                    $depreciacionMensual = round(($depreciacionAnual / 12), 2);

                    // clasificación por fecha
                    $fecha = str_replace('/', '-', $articulo->fechacomp);

                    $anioCompra = date("Y", strtotime($fecha));

                    $fecha = date("d-m-Y", strtotime($fecha . "+ " . $datosPartida[0]['aniosvida'] . " year"));

                    $anioArticuloDepreciacion = date('Y', strtotime($fecha)); // año del artículo mas los años de depreciación

                    $mesArticuloDepreciacion = date('m', strtotime($fecha));

                    $saldo = $articulo->importe;

                    if ($anioArticuloDepreciacion < $anioActual) {

                        $saldo = $valorResidual;

                    } else {

                        $totalDepreciacionPartida += $depreciacionMensual;

                        if ($mesActual <= $mesArticuloDepreciacion) {
                            $mes = $mesActual;
                        } else {
                            $mes = $mesArticuloDepreciacion;
                        }
                        for ($i = 0; $i < 12; $i++) {
                            if ($mes >= ($i + 1)) {

                                $saldo -= $depreciacionMensual;
                            }
                        }

                    }
                }
                $totalPorPartida += $saldo;

            }

            $registroPasadoMenosDepreciacion = $totalPorPartida - $totalDepreciacionPartida;

            // dd(is_float($totalPorPartida));

            array_push($totalesPartidas, $totalPorPartida);
            array_push($totalesDepreciacion, $totalDepreciacionPartida);
            array_push($totalesTotal, $registroPasadoMenosDepreciacion);

            $totalPorPartida                 = number_format($totalPorPartida, 2);
            $totalDepreciacionPartida        = number_format($totalDepreciacionPartida, 2);
            $registroPasadoMenosDepreciacion = number_format($registroPasadoMenosDepreciacion, 2);

            array_add($partida, 'totalPorPartida', $totalPorPartida);
            array_add($partida, 'totalDepreciacionPartida', $totalDepreciacionPartida);
            array_add($partida, 'registroPasadoMenosDepreciacion', $registroPasadoMenosDepreciacion);
            //echo $datosPartida[0]['porcentajeDepreciacion'] . '  ';

        }

        foreach ($totalesPartidas as $value) {
            $totalPartidaRegistroPasado += $value;
        }

        foreach ($totalesDepreciacion as $value) {
            $totaldepreciacionActual += $value;
        }

        $totalDelMes = $totalPartidaRegistroPasado - $totaldepreciacionActual;

        //print_r($partidas);
        //exit;

        $totalPartidaRegistroPasado = number_format($totalPartidaRegistroPasado, 2);
        $totaldepreciacionActual    = number_format($totaldepreciacionActual, 2);
        $totalDelMes                = number_format($totalDelMes, 2);

        $pdf = PDF::loadView('depreciacion.pdf.DepreciacionPDF',
            compact('totalDiasMes', 'nombreMes', 'anio', 'mesAnterior', 'partidas', 'totalPartidaRegistroPasado', 'totaldepreciacionActual', 'totalDelMes'))->setPaper('letter', 'landscape');
        return $pdf->inline('DEPRECIACIÓN ' . $nombreMes . $anio . '.pdf');
    }

}
