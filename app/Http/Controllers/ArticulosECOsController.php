<?php

namespace App\Http\Controllers;

use Alert;
use App;
use App\areas;
use App\articulos;
use App\articulosecos;
use App\empleados;
use App\partidas;
use App\lineas;
use DB;
use Illuminate\Http\Request;
use PDF;

/*************** Funciones para el módulo de Bienes ECO *****************************/
class ArticulosECOsController extends Controller
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
    public function numeroInventarioMaxECO(Request $request)
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
    Funcionalidad: Registra uno y varios artículos en la tabla articulosecos
    Parámetros: partida, descpartida, linea, desclinea, sublinea, descsublinea, consecutivo, numeroinv,
    concepto, marca, importe, colores, fechacomp, idarea, nombrearea, numemple, nombreemple,
    numserie, medidas, modelo, material, clvestado, estado, factura
    Retorna: Un Alert de registro exitoso y redirecciona a la vista de BienesEco.blade.php

     ********************************************************************************** */

    public function store(Request $request)
    {

        $arrayPartida     = explode("*", $request->input('partidaAltaArticuloECO'));
        $arrayLinea       = explode("*", $request->input('lineaAltaArticuloECO'));
        $arraySubLinea    = explode("*", $request->input('sublineaAltaArticuloECO'));
        $arrayConsecutivo = explode(",", $request->txtConsecutivoECO);
        $arrayNumeroInv   = explode(",", $request->txtArregloNumInvECO);

        for ($i = 0; $i < sizeof($arrayConsecutivo); $i++) {

            $fecha = explode("-", $request->dateFechaCompraECO);

            $fechaOPLE = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];

            $articulo = new articulosecos();

            $articulo->iev                 = 'ECO';
            $articulo->partida             = $arrayPartida[0];
            $articulo->descripcionpartida  = $arrayPartida[1];
            $articulo->linea               = $arrayLinea[0];
            $articulo->descripcionlinea    = $arrayLinea[1];
            $articulo->sublinea            = $arraySubLinea[0];
            $articulo->descripcionsublinea = $arraySubLinea[1];
            $articulo->consecutivo         = $arrayConsecutivo[$i];
            $articulo->numeroinventario    = $arrayNumeroInv[$i];
            $articulo->concepto            = $request->txtConceptoEnvECO;
            $articulo->marca               = $request->txtMarcaECO;
            $articulo->importe             = $request->txtImporteECO;
            $articulo->colores             = $request->txtColorECO;
            $articulo->fechacompra         = $fechaOPLE;
            $articulo->idarea              = $request->txtAreaClaveECO;
            $articulo->nombrearea          = $request->txtAreaNombreECO;
            $articulo->numeroempleado      = $request->txtResponsableNumEmpleadoECO;
            $articulo->nombreempleado      = $request->txtResponsableNombreECO;
            $articulo->numeroserie         = $request->txtNumSerieECO;
            $articulo->medidas             = $request->txtMedidasECO;
            $articulo->modelo              = $request->txtModeloECO;
            $articulo->material            = $request->txtMaterialECO;
            $articulo->claveestado         = $request->txtEstadoClaveECO;
            $articulo->estado              = $request->txtEstadoNombreECO;
            $articulo->factura             = $request->txtFacturaECO;

            $articulo->save();

        }

        Alert::success('Artículo guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('catalogoeco');
    }

    // ************ editar artículo ************

    /* **********************************************************************************

    Funcionalidad: Obtiene toda la información de un artículo en especial, obtenida por el numeroinventario de este
    Parámetros: numeroinventario
    Retorna: Regresa con un JSON con toda la información obtenida del artículo en la base de datos:
    partida, descpartida, linea, desclinea, sublinea, descsublinea, consecutivo, numeroinv,
    concepto, marca, importe, colores, fechacomp, idarea, nombrearea, numemple, nombreemple,
    numserie, medidas, modelo, material, clvestado, estado, factura

     ********************************************************************************** */

    public function InformacionArticuloECO(Request $request)
    {
        $infoArticulo = articulosecos::where('numeroinventario', $request->numInventario)->get();

        foreach ($infoArticulo as $value) {
            if ($value->fechacompra == '  -   -') {
                $value->fechacompra = '0';
            } else {
                if (strpos($value->fechacompra, '/')) {

                    $fecha = explode("/", $value->fechacompra);
                    if (strlen($fecha[2]) == 4) {
                        $dia  = $fecha[0];
                        $mes  = $fecha[1];
                        $anio = $fecha[2];

                        $value->fechacompra = $anio . '-' . $mes . '-' . $dia;
                    }
                }

            }
        }

        return response()->json($infoArticulo);

    }

    /* **********************************************************************************

    Funcionalidad: Actualiza la información de un artículo en especial.
    Parámetros: estado, clvestado, medidas, material, colores, numserie, modelo, marca, fechacomp, importe, factura
    Retorna: Regresa un Alert con el mensaje de actualización exitosa y redirecciona a la vista de Bienes ECO

     ********************************************************************************** */

    public function EditarArticulosECO(Request $request)
    {

        $nombreEstado = '';

        switch ($request->editarEstadoECO) {
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

        if ($request->editarDateFechaCompraECO === '' || $request->editarDateFechaCompraECO == null) {
            $fechaOPLE = '- -';
        } else {
            $fecha = explode("-", $request->editarDateFechaCompraECO);

            $fechaOPLE = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
        }

        //echo $request;

        $articulo = articulosecos::where('numeroinventario', $request->numeroInventarioECO)
            ->update([
                'estado'      => $nombreEstado,
                'claveestado' => $request->editarEstadoECO,
                'medidas'     => $request->editarMedidasECO,
                'material'    => $request->editarMaterialECO,
                'colores'     => $request->editarColorECO,
                'numeroserie' => $request->EditarNumSerieECO,
                'modelo'      => $request->editarModeloECO,
                'marca'       => $request->editarMarcaECO,
                'fechacompra' => $fechaOPLE,
                'importe'     => $request->editarImporteECO,
                'factura'     => $request->editarFacturaECO]);

        Alert::success('Datos Actualizados', 'Actualización Exitoso')->autoclose(2500);
        return redirect()->route('catalogoeco');
    }

    // ************ vista de reportes ************

    /* **********************************************************************************
    Funcionalidad: Vista principal del módulo de reportes
    Parámetros: No recibe parámetros
    Retorna: Una vista con las opciones de los reportes que puede ejegir, reportesECO.blade.php

     ********************************************************************************** */
    public function reportesECO()
    {
        $usuario   = auth()->user();
        $partidas  = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $areas     = areas::distinct()->orderBy('idarea', 'ASC')->get(['idarea', 'nombrearea']);
        $empleados = empleados::orderBy('nombre', 'ASC')->get();

        return view('eco.reportesECO', compact('usuario', 'partidas', 'areas', 'empleados'));
    }

    // ************ vista previa de reportes ************

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte bienes por partida, de una partida en especial desplegara todos los bienes de esa partida.
    Parámetros: numPartida
    Retorna: Una vista previa del reporte, BienesPorPartidaECO.blade.php

     ********************************************************************************** */
    public function BienesXPartidaECO(Request $request)
    {

        $partida = $request->numPartida;
        $descripcionpartida = $request->nombrePartida;
        $linea = $request->linea;
        $numeroBotonGenerarPDF = 1;

        if ($partida == "51100001"){
            $bienesPartida = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->orderBy('concepto')->get();
            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get();            
        }else{
            $bienesPartida = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida]])->orderBy('concepto')->get();

            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida]])->get();
        }        

        $totalArticulos = count($bienesPartida);

        if ($linea == "24"){
            while ($totalArticulos > 5000) {
                $numeroBotonGenerarPDF++;
                $totalArticulos -= 5000;
            }
        }

        foreach ($totalImporte as $value) {
            $value->total = number_format($value->total, 2);
        }

        foreach ($bienesPartida as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        return view('eco.reportes.BienesPorPartidaECO', compact('partida', 'bienesPartida', 'totalImporte','numeroBotonGenerarPDF','linea','descripcionpartida'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte concentrado de bienes por área,
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, ImporteDeBienesPorAreaECO.blade.php

     ********************************************************************************** */
    public function importeBienesPorAreaECO()
    {

        $areaAndImporteTotal = areas::select('idarea','nombrearea')->orderBy('idarea','asc')->get();

        $totalImporte        = 0;

        foreach ($areaAndImporteTotal as $value) {
            $importe= articulosecos::select(DB::raw('SUM(importe) as importetotal'))->where('idarea', $value->idarea)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalArea', $importeFormat);
            }else {
                array_add($value, 'importeTotalArea', '0.00');
            } 
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('eco.reportes.ImporteDeBienesPorAreaECO', compact('areaAndImporteTotal', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte concentrado de bienes por partida
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, ImporteDeBienesPorPartidaECO.blade.php

     ********************************************************************************** */

    public function importeBienesPorPartidaECO()
    {

        $partidaAndImporteTotal = partidas::select('partida','descpartida')->orderBy('partida','asc')->get();

        $totalImporte           = 0;

        foreach ($partidaAndImporteTotal as $value) {
            $importe= articulosecos::select(DB::raw('SUM(importe) as importetotal'))->where('partida', $value->partida)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalPartida', $importeFormat);
            }else {
                array_add($value, 'importeTotalPartida', '0.00');
            }
        }
        $totalImporte = number_format($totalImporte, 2);

        return view('eco.reportes.ImporteDeBienesPorPartidaECO', compact('partidaAndImporteTotal', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte inventario por área
    Parámetros: numArea
    Retorna: Una vista previa del reporte, InventarioPorAreaECO.blade.php

     ********************************************************************************** */

    public function inventarioPorAreaECO(Request $request)
    {

        $area         = $request;
        $bienesArea   = articulosecos::where('idarea', $request->numArea)->orderBy('concepto')->get();
        $totalImporte = 0;
        foreach ($bienesArea as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('eco.reportes.InventarioPorAreaECO', compact('area', 'bienesArea', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte inventario por orden alfabetico, donde muestra todos lo artículos que existen en la tabla articulosecos por orden alfabetico
    Parámetros: No recibe parámetros
    Retorna: Una vista previa del reporte, InventarioPorOrdenAlfabeticoECO.blade.php

     ********************************************************************************** */
    public function inventarioPorOrdenAlfabeticoECO()
    {

        $bienesAlfabetico = articulosecos::orderBy('concepto', 'DESC')->get();
        $totalImporte     = 0;
        foreach ($bienesAlfabetico as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        return view('eco.reportes.InventarioPorOrdenAlfabeticoECO', compact('bienesAlfabetico', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte resguado por empleado, donde muestra todos lo artículos que un empleado a su resguardo
    Parámetros: numEmpleado
    Retorna: Una vista previa del reporte, ResguardoPorEmpleadoECO.blade.php

     ********************************************************************************** */
    public function ResguardoPorEmpleadoECO(Request $request)
    {

        $datosEmpleado  = empleados::select('numemple', 'nombre', 'nombrearea')->where('numemple', $request->numEmpleado)->get();
        $articulos      = articulosecos::where('numeroempleado', $request->numEmpleado)->get();
        $totalArticulos = DB::table('articulosecos')->select(DB::raw('COUNT(numeroinventario) as total'))->where('numeroempleado', $request->numEmpleado)->get();
        $totalImporte   = 0;
        foreach ($articulos as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }
        $totalImporte = number_format($totalImporte, 2);

        return view('eco.reportes.ResguardoPorEmpleadoECO', compact('datosEmpleado', 'articulos', 'totalArticulos', 'totalImporte'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte bienes por área y ordenado por empleado, donde muestra todos los bienes que cuenta un área en especifico ordenado por el empleado que lo tiene en su resguardo
    Parámetros: area
    Retorna: Una vista previa del reporte, BienesDeUnAreaOrdenadoPorEmpleadoECO.blade.php

     ********************************************************************************** */

    public function bienesAreaOrdenadoEmpleadoECO(Request $request)
    {
        $area = explode("*", $request->area);

        $idarea     = $area[0];
        $nombrearea = $area[1];

        $articulos = DB::table('articulosecos')->select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'nombreempleado', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreempleado', 'ASC')->get();

        foreach ($articulos as $articulo) {
            $articulo->importe = number_format($articulo->importe, 2);
        }

        return view('eco.reportes.BienesDeUnAreaOrdenadoPorEmpleadoECO', compact('nombrearea', 'articulos'));
    }

    /* **********************************************************************************

    Funcionalidad: Vista previa del reporte importe de bienes por año de adquisición, donde muestra todos las partidas y su importe total por el año que se seleccione.
    Parámetros: anioAdquisicón
    Retorna: Una vista previa del reporte, ImporteDeBienesPorAnioAdquisicion.blade.php

     ********************************************************************************** */

    public function importeBienesAnioAdquisicionECO(Request $request)
    {
        $partidas        = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $anioAdquisicion = $request;

        foreach ($partidas as $value) {
            $articulos = DB::table('articulosecos')->select('fechacompra', 'importe')->where([['partida', $value->partida], ['fechacompra', 'like', '%' . $request->anioAdquisicion . '%']])->whereNotIn('fechacompra', ['  -   -'])->get();

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
                if (strpos($art->fechacompra, '-')) {
                    $fecha = explode("-", $art->fechacompra);
                } else {
                    $fecha = explode("/", $art->fechacompra);
                }

                $meses[$fecha[1] - 1] = $meses[$fecha[1] - 1] + $art->importe;
                $total                = $total + $art->importe;

            }
            $total = number_format($total, 2);
            array_add($value, 'meses', $meses);
            array_add($value, 'total', $total);
        }

        return view('eco.reportes.ImporteDeBienesPorAnioAdquisicionECO', compact('partidas', 'anioAdquisicion'));
    }

    public function inventarioDeLaBodegaECO(Request $request)
    {

        $partida = $request->partida;
        $linea = $request->linea;
        $numeroBotonGenerarPDF = 1;

        if ($partida == "51100001"){
            $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get();
            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get();            
        }else{
            $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida]])->get();

            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida]])->get();
        }        

        $totalArticulos = count($articulos);

        if ($linea == "24"){
            while ($totalArticulos > 5000) {
                $numeroBotonGenerarPDF++;
                $totalArticulos -= 5000;
            }
        }

        $totalImporte = number_format($totalImporte[0]->total, 2);

        foreach ($articulos as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        return view('eco.reportes.InventarioDeLaBodegaECO', compact('articulos', 'totalImporte', 'numeroBotonGenerarPDF','partida','linea'));
    }

    public function inventarioAnioPartidaFacturaECO(Request $request)
    {
        $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'nombreempleado', 'factura', 'importe', 'estado')
            ->where([['fechacompra', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])
            ->orderBy('factura', 'ASC')
            ->get();

        $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))
            ->where([['fechacompra', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])->get();

        $totalImporte = number_format($totalImporte[0]->total, 2);

        $anio        = $request->anio;
        $partida     = $request->partida;
        $descpartida = $request->descpartida;

        return view('eco.reportes.InventarioOrdenadoPorAnioPartidaFacturaECO', compact('articulos', 'totalImporte', 'anio', 'partida', 'descpartida'));
    }

    // ************ generar reportes ************

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de bienes por partida, donde muentra todos los bienes que tiene una partida en especifico.
    Parámetros: numPartida
    Retorna: Retorna un pdf, BienesPorPartidaPDFECO.pdf

     ********************************************************************************** */
    public function BienesPorPartidaECO(Request $request)
    {
        set_time_limit(5000);
        $partida = $request->numPartida;
        $descripcionpartida = $request->nombrePartida;
        $linea = $request->linea;
        $bloque = $request->bloque;

        if ($bloque == 1) {
            if ($partida == "51100001"){
                $bienesPartida = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->take(4998)->get();
                $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get(); 

                $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida],['linea',$linea]])->count();      
            }else{
                $bienesPartida = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida]])->take(4998)->get();

                $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida]])->get();

                $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida]])->count(); 
            }  
        }else{
            $bienesPartida = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->skip(4998 * ($bloque - 1))->take(4998)->get();
            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get();   

            $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida],['linea',$linea]])->count();          
            
        }

        foreach ($totalImporte as $value) {
            $value->total = number_format($value->total, 2);
        }

        foreach ($bienesPartida as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        $topeArticulos = 4998;

        $bloqueFinal = 1;

        while ($totalArticulos > 4998) {
            $bloqueFinal++;
            $totalArticulos -= 4998;
        }

        $pdf = PDF::loadView('eco.reportes.pdf.BienesPorPartidaPDFECO', compact('partida', 'bienesPartida', 'totalImporte','descripcionpartida','bloqueFinal', 'bloque'))->setPaper('legal', 'landscape');

        return $pdf->inline('BienesPorPartidaECO-' . $request->nombrePartida . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de concentrado de bienes por área, donde muentra todas las áreas y su total de importe de todos los artículos de esa área
    Parámetros: no recibe parámetros
    Retorna: Retorna un pdf, ImporteDeBienesPorAreaECO.pdf

     ********************************************************************************** */

    public function importeBienesPorAreaPDFECO()
    {
        $areaAndImporteTotal = areas::select('idarea','nombrearea')->orderBy('idarea','asc')->get();

        $totalImporte        = 0;

        foreach ($areaAndImporteTotal as $value) {
            $importe= articulosecos::select(DB::raw('SUM(importe) as importetotal'))->where('idarea', $value->idarea)->get();

            if ($importe[0]->importetotal != null){
                $totalImporte += $importe[0]->importetotal;
                $importeFormat = number_format($importe[0]->importetotal, 2);
                array_add($value, 'importeTotalArea', $importeFormat);
            }else {
                array_add($value, 'importeTotalArea', '0.00');
            } 
        }

        $totalImporte = number_format($totalImporte, 2);
        $hoy          = getdate();

        $fecha = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'];

        $pdf = PDF::loadView('eco.reportes.pdf.ImporteDeBienesPorAreaPDFECO', compact('fecha', 'totalImporte', 'areaAndImporteTotal'))->setPaper('letter', 'portrait');
        return $pdf->inline('ImporteDeBienesPorAreaECO.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de concentrado de bienes por partida, donde muentra todas las partidas y su total de importe de todos los artículos de esas partidas
    Parámetros: no recibe parámetros
    Retorna: Retorna un pdf, ImporteBienesPorPartidaECO.pdf

     ********************************************************************************** */

    public function importeBienesPorPartidaPDFECO()
    {

        $partidaAndImporteTotal = partidas::select('partida','descpartida')->orderBy('partida','asc')->get();

        $totalImporte           = 0;

        foreach ($partidaAndImporteTotal as $value) {
            $importe= articulosecos::select(DB::raw('SUM(importe) as importetotal'))->where('partida', $value->partida)->get();

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

        $pdf = PDF::loadView('eco.reportes.pdf.ImporteDeBienesPorPartidaPDFECO', compact('fecha', 'partidaAndImporteTotal', 'totalImporte'))->setPaper('letter', 'portrait');
        return $pdf->inline('ImporteBienesPorPartidaECO.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de inventario por área, donde muestra todos los artículos de una área en especial.
    Parámetros: numArea.
    Retorna: Retorna un pdf, InventarioPorAreaECO.pdf

     ********************************************************************************** */
    public function inventarioPorAreaPDFECO(Request $request)
    {
        $area         = $request;
        $bienesArea   = articulosecos::where('idarea', $request->numArea)->orderBy('concepto')->get();
        $totalImporte = 0;
        foreach ($bienesArea as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        $pdf = PDF::loadView('eco.reportes.pdf.InventarioPorAreaPDFECO', compact('area', 'bienesArea', 'totalImporte'))->setPaper('legal', 'landscape');
        return $pdf->inline('InventarioPorAreaECO-' . $request->nombreArea . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de inventario por orden alfabético , donde muestra todos los artículos la base de datos, de la tabla articulosecos ordenados alfabeticamente.
    Parámetros: No recibe parámetros
    Retorna: Retorna un pdf, inventarioPorOrdenAlfabeticoECO.pdf

     ********************************************************************************** */
    public function inventarioPorOrdenAlfabeticoPDFECO()
    {

        $bienesAlfabetico = articulosecos::orderBy('concepto', 'ASC')->get();
        $totalImporte     = 0;
        set_time_limit(5000);
        foreach ($bienesAlfabetico as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }

        $totalImporte = number_format($totalImporte, 2);

        $pdf = PDF::loadView('eco.reportes.pdf.InventarioPorOrdenAlfabeticoPDFECO', compact('bienesAlfabetico', 'totalImporte'))->setPaper('legal', 'landscape');
        return $pdf->inline('inventarioPorOrdenAlfabeticoECO.pdf');

    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF del resguardo por empleado , donde muestra todos los artículos que tiene en su resguardo un empleado es especifico.
    Parámetros: numEmpleado
    Retorna: Retorna un pdf, ResguardoPorEmpleadoECO.pdf

     ********************************************************************************** */

    public function ResguardoPorEmpleadoPDFECO(Request $request)
    {

        $datosEmpleado  = empleados::select('numemple', 'nombre', 'nombrearea', 'cargo')->where('numemple', $request->numEmpleado)->get();
        $articulos      = articulosecos::where('numeroempleado', $request->numEmpleado)->get();
        $totalArticulos = DB::table('articulosecos')->select(DB::raw('COUNT(numeroinventario) as total'))->where('numeroempleado', $request->numEmpleado)->get();
        $totalImporte   = 0;
        foreach ($articulos as $value) {
            $totalImporte += $value->importe;
            $value->importe = number_format($value->importe, 2);
        }
        $totalImporte = number_format($totalImporte, 2);

        $hoy = getdate();

        $fecha = $hoy['mday'] . '/' . $hoy['mon'] . '/' . $hoy['year'];

        $pdf = PDF::loadView('eco.reportes.pdf.ResguardoPorEmpleadoPDFECO', compact('datosEmpleado', 'articulos', 'totalArticulos', 'totalImporte', 'fecha'))->setPaper('letter', 'landscape');
        return $pdf->inline('ResguardoPorEmpleadoECO-' . $request->nombreEmpleado . '.pdf');

    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF de bienes por área ordenados por empleados, donde muestra todos los artículos de un área ordenados por empleado
    Parámetros: area
    Retorna: Retorna un pdf, BienesDeUnAreaOrdenadoPorEmpleado.pdf

     ********************************************************************************** */

    public function bienesAreaOrdenadoEmpleadoPDFECO(Request $request)
    {
        $area = explode("*", $request->area);

        $idarea     = $area[0];
        $nombrearea = $area[1];

        $articulos = DB::table('articulosecos')->select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'nombreempleado', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreempleado', 'ASC')->get();

        set_time_limit(5000);

        $pdf = PDF::loadView('eco.reportes.pdf.BienesDeUnAreaOrdenadoPorEmpleadoPDFECO', compact('nombrearea', 'articulos'))->setPaper('letter', 'landscape');
        return $pdf->inline('BienesDeUnAreaOrdenadoPorEmpleadoECO-' . $nombrearea . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Genera la vista del reporte PDF del importe de bienes por año de adquisición, donde muestra todos las partidas y su importe total por el año que se seleccione.
    Parámetros: anioAdquisicón
    Retorna: Retorna un pdf, ImporteDeBienesPorAñoDeAdquisicion.pdf

     ********************************************************************************** */
    public function importeBienesAnioAdquisicionPDFECO(Request $request)
    {
        $partidas        = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
        $anioAdquisicion = $request;

        foreach ($partidas as $value) {
            $articulos = DB::table('articulosecos')->select('fechacompra', 'importe')->where([['partida', $value->partida], ['fechacompra', 'like', '%' . $request->anioAdquisicion . '%']])->whereNotIn('fechacompra', ['  -   -'])->get();

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
                if (strpos($art->fechacompra, '-')) {
                    $fecha = explode("-", $art->fechacompra);
                } else {
                    $fecha = explode("/", $art->fechacompra);
                }

                $meses[$fecha[1] - 1] = $meses[$fecha[1] - 1] + $art->importe;
                $total                = $total + $art->importe;
            }

            array_add($value, 'meses', $meses);
            array_add($value, 'total', $total);
        }

        $pdf = PDF::loadView('eco.reportes.pdf.ImporteDeBienesPorAnioAdquisicionPDFECO', compact('partidas', 'anioAdquisicion'))->setPaper('letter', 'landscape');
        return $pdf->inline('ImporteDeBienesPorAñoDeAdquisicionECO-' . $request->anioAdquisicion . '.pdf');
    }

    public function inventarioDeLaBodegaPDFECO(Request $request)
    {
        $partida = $request->partida;
        $linea = $request->linea;
        $bloque = $request->bloque;
        set_time_limit(5000);
        if ($bloque == 1) {
            if ($partida == "51100001"){
                $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->take(5000)->get();
                $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get(); 

                $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida],['linea',$linea]])->count();      
            }else{
                $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida]])->take(5000)->get();

                $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida]])->get();

                $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida]])->count(); 
            }  
        }else{
            $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'medidas', 'factura', 'importe', 'estado')->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->skip(5000 * ($bloque - 1))->take(5000)->get();
            $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))->where([['idarea', '15'],['partida', $partida],['linea',$linea]])->get();   

            $totalArticulos = articulosecos::where([['idarea', '15'],['partida', $partida],['linea',$linea]])->count();          
            
        }
        
        set_time_limit(5000);
        $totalBienes  = $totalArticulos;
        
        $totalImporte = number_format($totalImporte[0]->total, 2);

        $topeArticulos = 5000;

        $bloqueFinal = 1;

        while ($totalArticulos > 5000) {
            $bloqueFinal++;
            $totalArticulos -= 5000;
        }

        $totalBienes  = number_format($totalBienes);

        foreach ($articulos as $value) {
            $value->importe = number_format($value->importe, 2);
        }

        $pdf = PDF::loadView('eco.reportes.pdf.InventarioDeLaBodegaDPFECO', compact('articulos', 'totalImporte', 'totalBienes', 'bloque', 'bloqueFinal'))->setPaper('letter', 'landscape');
        return $pdf->inline('InventarioDeLaBodegaDPFECO' . $bloque . '.pdf');
    }

    public function inventarioAnioPartidaFacturaPDFECO(Request $request)
    {
        $articulos = articulosecos::select('numeroinventario', 'concepto', 'numeroserie', 'marca', 'modelo', 'nombreempleado', 'factura', 'importe', 'estado')
            ->where([['fechacompra', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])
            ->orderBy('factura', 'ASC')
            ->get();

        $totalImporte = articulosecos::select(DB::raw('SUM(importe) as total'))
            ->where([['fechacompra', 'like', '%' . $request->anio . '%'], ['partida', $request->partida]])->get();

        $totalImporte = number_format($totalImporte[0]->total, 2);

        $anio        = $request->anio;
        $partida     = $request->partida;
        $descpartida = $request->descpartida;

        $pdf = PDF::loadView('eco.reportes.pdf.InventarioOrdenadoPorAnioPartidaFacturaPDFECO', compact('articulos', 'totalImporte', 'anio', 'partida', 'descpartida'))->setPaper('letter', 'landscape');

        return $pdf->inline('InventarioOrdenadoPorAñoPartidaFacturaPDFECO-' . $anio . '-' . $partida . '-' . $descpartida . '.pdf');
    }

    /* **********************************************************************************

    Funcionalidad: Obtiene la vista de los artículos de una partida en especial
    Parámetros: partida
    Retorna: Una vista , TablaBienesECO.pdf

     ********************************************************************************** */
    public function llenarTablePartidasCat(Request $request)
    {
        set_time_limit(5000);
        $articulos     = articulosecos::select('numeroinventario', 'concepto', 'factura', 'fechacompra', 'importe')->where('partida', $request->partida)->get();
        $numPartida    = 'Número de partida: ' . $request->partida;
        $nombrePartida = 'Nombre de la partida: ' . $request->nombrePartida;

        $numLinea    = '';
        $nombreLinea = '';

        return view('catalogos.Tablas.TablaBienesECO', compact('articulos', 'numPartida', 'nombrePartida', 'numLinea', 'nombreLinea'));
    }

    /* **********************************************************************************

    Funcionalidad: Obtiene la vista de los artículos de una partida y una linea en especial
    Parámetros: partida, linea
    Retorna: Una vista , TablaBienesECO.pdf

     ********************************************************************************** */

    public function llenarTablePartidasLineasCatECO(Request $request)
    {
        //set_time_limit(5000);
        $articulos     = articulosecos::select('numeroinventario', 'concepto', 'factura', 'fechacompra', 'importe')->where([['partida', $request->partida], ['linea', $request->linea]])->get();
        $numPartida    = 'Número de partida: ' . $request->partida;
        $nombrePartida = 'Nombre de la partida: ' . $request->nombrePartida;

        $numLinea    = 'Número de línea: ' . $request->linea;
        $nombreLinea = 'Nombre de la línea: ' . $request->nombreLinea;

        return view('catalogos.Tablas.TablaBienesECO', compact('articulos', 'numPartida', 'nombrePartida', 'numLinea', 'nombreLinea'));
    }

}
