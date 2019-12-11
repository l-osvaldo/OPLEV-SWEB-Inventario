<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulosecos;
use App\articulos;
use App\partidas;
use App\areas;
use App\empleados;
use Alert;
use PDF;
use DB;
use App;

class ArticulosECOsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function numeroInventarioMaxECO(Request $request){
    	$numeroInventarioMaxOPLE = articulos::where([['partida',$request->partida],['linea', $request->linea],['sublinea',$request->sublinea]])->max('consecutivo');

    	$numeroInventarioMaxECO = articulosecos::where([['partida',$request->partida],['linea', $request->linea],['sublinea',$request->sublinea]])->max('consecutivo');


    	if ($numeroInventarioMaxOPLE == null && $numeroInventarioMaxECO == null){
    		$numeroInventarioMax = 0;
    	}else{
    		if ($numeroInventarioMaxOPLE == null){
    			$numeroInventarioMax = $numeroInventarioMaxECO;
    		}else{
    			if ($numeroInventarioMaxECO == null){
    				$numeroInventarioMax = $numeroInventarioMaxOPLE;
    			}else{
    				if ($numeroInventarioMaxOPLE < $numeroInventarioMaxECO){
    					$numeroInventarioMax = $numeroInventarioMaxECO;  
    				}else{
    					$numeroInventarioMax = $numeroInventarioMaxOPLE;
    				}
    			}
    		}
    	}

    	return response()->json($numeroInventarioMax);

    }

    public function store(Request $request)
	{

		$arrayPartida 		= explode("*", $request->input('partidaAltaArticuloECO'));
		$arrayLinea 		= explode("*", $request->input('lineaAltaArticuloECO'));
		$arraySubLinea 		= explode("*", $request->input('sublineaAltaArticuloECO'));
		$arrayConsecutivo 	= explode(",",$request->txtConsecutivoECO);
		$arrayNumeroInv 	=  explode(",",$request->txtArregloNumInvECO);

		for ($i=0; $i < sizeof($arrayConsecutivo); $i++) {

			

			$fecha = explode("-", $request->dateFechaCompraECO);

			$fechaOPLE = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

			$articulo = new articulosecos();

			$articulo->iev 					= 'ECO';
			$articulo->partida 				= $arrayPartida[0];
			$articulo->descripcionpartida 	= $arrayPartida[1];
			$articulo->linea 				= $arrayLinea[0];
			$articulo->descripcionlinea		= $arrayLinea[1];
			$articulo->sublinea 			= $arraySubLinea[0];
			$articulo->descripcionsublinea	= $arraySubLinea[1];
			$articulo->consecutivo 			= $arrayConsecutivo[$i];
			$articulo->numeroinventario		= $arrayNumeroInv[$i];
			$articulo->concepto 			= $request->txtConceptoEnvECO;
			$articulo->marca 				= $request->txtMarcaECO;
			$articulo->importe 				= $request->txtImporteECO;
			$articulo->colores 				= $request->txtColorECO;
			$articulo->fechacompra			= $fechaOPLE;
			$articulo->idarea				= $request->txtAreaClaveECO;
			$articulo->nombrearea			= $request->txtAreaNombreECO;
			$articulo->numeroempleado		= $request->txtResponsableNumEmpleadoECO;
			$articulo->nombreempleado		= $request->txtResponsableNombreECO;
			$articulo->numeroserie 			= $request->txtNumSerieECO;
			$articulo->medidas 				= $request->txtMedidasECO;
			$articulo->modelo 				= $request->txtModeloECO;
			$articulo->material 			= $request->txtMaterialECO;
			$articulo->claveestado 			= $request->txtEstadoClaveECO;
			$articulo->estado 				= $request->txtEstadoNombreECO;
			$articulo->factura				= $request->txtFacturaECO;

			$articulo->save();

		}

       	Alert::success('Artículo guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('catalogoeco');
	}

	// ************ editar artículo ************
	public function InformacionArticuloECO(Request $request){
		$infoArticulo = articulosecos::where('numeroinventario',$request->numInventario)->get();

		foreach ($infoArticulo as $value) {
			if ($value->fechacompra == '  -   -'){
				$value->fechacompra = '0';
			}else{
				if (strpos($value->fechacompra, '/')){

					$fecha = explode("/", $value->fechacompra);
					if (strlen($fecha[2]) == 4){
						$dia = $fecha[0];
						$mes = $fecha[1];
						$anio = $fecha[2];

						$value->fechacompra = $anio.'-'.$mes.'-'.$dia;
					}
				}

			}			
		}		

		return response()->json($infoArticulo);

	}


	public function EditarArticulosECO(Request $request){


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
		}else {
			$fecha = explode("-", $request->editarDateFechaCompraECO);

			$fechaOPLE = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];
		}

		

		//echo $request;

		$articulo = articulosecos::where('numeroinventario',$request->numeroInventarioECO)
		->update([
			'estado' 	=> $nombreEstado, 
			'claveestado' => $request->editarEstadoECO,
			'medidas' 	=> $request->editarMedidasECO,
			'material' 	=> $request->editarMaterialECO,
			'colores' 	=> $request->editarColorECO,
			'numeroserie' 	=> $request->EditarNumSerieECO,
			'modelo' 	=> $request->editarModeloECO,
			'marca' 	=> $request->editarMarcaECO,
			'fechacompra'	=> $fechaOPLE,
			'importe'	=> $request->editarImporteECO,
			'factura'	=> $request->editarFacturaECO ]);

		Alert::success('Datos Actualizados', 'Actualización Exitoso')->autoclose(2500);
        return redirect()->route('catalogoeco');
	}

	// ************ vista de reportes ************
	public function reportesECO(){
		$usuario = auth()->user();
		$partidas = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
		$areas = areas::distinct()->orderBy('idarea', 'ASC')->get(['idarea', 'nombrearea']);
		$empleados = empleados::orderBy('nombre', 'ASC')->get();

		return view('eco.reportesECO', compact('usuario','partidas','areas','empleados'));
	}

	// ************ vista previa de reportes ************
	public function BienesXPartidaECO(Request $request){

		$partida = $request;
		$bienesPartida = articulosecos::where('partida', $request->numPartida)->orderBy('concepto')->get();
		$totalImporte = DB::table('articulosecos')->select( DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();

		foreach ($totalImporte as  $value) {
			$value->total = number_format($value->total,2);
		}

		foreach ($bienesPartida as $value) {
			$value->importe = number_format($value->importe,2);
		}

		return view('eco.reportes.BienesPorPartidaECO', compact('partida','bienesPartida','totalImporte'));
	}

	public function importeBienesPorAreaECO(){

		$areaAndImporteTotal = DB::table('articulosecos')->select('idarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('idarea')->groupBy('idarea')->get();

		$nombreArea = areas::all();
		$totalImporte = 0;
		foreach ($areaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);


		// foreach ($nombrearea as $area) {
		// 	$bandera = true;
		// 	foreach ($areaAndImporteTotal as $areaImporte) {
		// 		if ($area->idarea == $areaImporte->idarea){
		// 			$bandera = false;
		// 		}
		// 	}
			
		// }


		return view('eco.reportes.ImporteDeBienesPorAreaECO', compact('areaAndImporteTotal','totalImporte','nombreArea'));
	}

	public function importeBienesPorPartidaECO(){

		$partidaAndImporteTotal = DB::table('articulosecos')->select('partida','descripcionpartida', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->groupBy('partida','descripcionpartida')->get();
		$totalImporte = 0;
		foreach ($partidaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);

		return view('eco.reportes.ImporteDeBienesPorPartidaECO', compact('partidaAndImporteTotal','totalImporte'));
	}

	public function inventarioPorAreaECO(Request $request){

		$area = $request;
		$bienesArea = articulosecos::where('idarea', $request->numArea)->orderBy('concepto')->get();
		$totalImporte = 0;
		foreach ($bienesArea as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		return view('eco.reportes.InventarioPorAreaECO',compact('area','bienesArea','totalImporte'));
	}

	public function inventarioPorOrdenAlfabeticoECO(){

		$bienesAlfabetico = articulosecos::orderBy('concepto', 'DESC')->get();
		$totalImporte = 0;
		foreach ($bienesAlfabetico as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		return view('eco.reportes.InventarioPorOrdenAlfabeticoECO',compact('bienesAlfabetico','totalImporte'));
	}

	public function ResguardoPorEmpleadoECO(Request $request){		

		$datosEmpleado = empleados::select('numemple','nombre','nombrearea')->where('numemple', $request->numEmpleado)->get();
		$articulos = articulosecos::where('numeroempleado', $request->numEmpleado)->get();
		$totalArticulos = DB::table('articulosecos')->select( DB::raw('COUNT(numeroinventario) as total'))->where('numeroempleado', $request->numEmpleado)->get();
		$totalImporte = 0;
		foreach ($articulos as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}
		$totalImporte = number_format($totalImporte,2);

		return view('eco.reportes.ResguardoPorEmpleadoECO', compact('datosEmpleado','articulos','totalArticulos','totalImporte'));
	}

	// ************ generar reportes ************
	public function BienesPorPartidaECO(Request $request){

		$partida = $request;
		$bienesPartida = articulosecos::where('partida', $request->numPartida)->orderBy('concepto')->get();
		$totalImporte = DB::table('articulosecos')->select( DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();


		foreach ($totalImporte as  $value) {
			$value->total = number_format($value->total,2);
		}

		foreach ($bienesPartida as $value) {
			$value->importe = number_format($value->importe,2);
		}
		
		$pdf = PDF::loadView('eco.reportes.pdf.BienesPorPartidaPDFECO', compact('partida','bienesPartida','totalImporte'))->setPaper('legal', 'landscape');



		return $pdf->inline('BienesPorPartidaECO-'.$request->nombrePartida.'.pdf');
	}

	public function importeBienesPorAreaPDFECO(){
		$areaAndImporteTotal = DB::table('articulosecos')->select('idarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('idarea')->groupBy('idarea')->get();
		$nombreArea = areas::all();
		$totalImporte = 0;
		foreach ($areaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);
		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		
		$pdf = PDF::loadView('eco.reportes.pdf.ImporteDeBienesPorAreaPDFECO', compact('fecha','totalImporte','areaAndImporteTotal','nombreArea'))->setPaper('letter', 'portrait');
		return $pdf->inline('ImporteDeBienesPorAreaECO.pdf');
	}

	public function importeBienesPorPartidaPDFECO(){

		$partidaAndImporteTotal = DB::table('articulosecos')->select('partida','descripcionpartida', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->groupBy('partida','descripcionpartida')->get();
		$totalImporte = 0;
		foreach ($partidaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);

		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		$pdf = PDF::loadView('eco.reportes.pdf.ImporteDeBienesPorPartidaPDFECO',compact('fecha','partidaAndImporteTotal','totalImporte'))->setPaper('letter', 'portrait');
		return $pdf->inline('ImporteBienesPorPartidaECO.pdf');
	}

	public function inventarioPorAreaPDFECO(Request $request){
		$area = $request;
		$bienesArea = articulosecos::where('idarea', $request->numArea)->orderBy('concepto')->get();
		$totalImporte = 0;
		foreach ($bienesArea as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		$pdf = PDF::loadView('eco.reportes.pdf.InventarioPorAreaPDFECO',compact('area','bienesArea','totalImporte'))->setPaper('legal', 'landscape');
		return $pdf->inline('InventarioPorAreaECO-'.$request->nombreArea.'.pdf');
	}

	public function inventarioPorOrdenAlfabeticoPDFECO(){

		$bienesAlfabetico = articulosecos::orderBy('concepto', 'ASC')->get();
		$totalImporte = 0;
		foreach ($bienesAlfabetico as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);


		$pdf = PDF::loadView('eco.reportes.pdf.InventarioPorOrdenAlfabeticoPDFECO',compact('bienesAlfabetico','totalImporte'))->setPaper('legal', 'landscape');
		return $pdf->inline('inventarioPorOrdenAlfabeticoECO.pdf');

	}

	public function ResguardoPorEmpleadoPDFECO(Request $request){

		$datosEmpleado = empleados::select('numemple','nombre','nombrearea','cargo')->where('numemple', $request->numEmpleado)->get();
		$articulos = articulosecos::where('numeroempleado', $request->numEmpleado)->get();
		$totalArticulos = DB::table('articulosecos')->select( DB::raw('COUNT(numeroinventario) as total'))->where('numeroempleado', $request->numEmpleado)->get();
		$totalImporte = 0;
		foreach ($articulos as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}
		$totalImporte = number_format($totalImporte,2);

		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		$pdf = PDF::loadView('eco.reportes.pdf.ResguardoPorEmpleadoPDFECO', compact('datosEmpleado','articulos','totalArticulos','totalImporte','fecha'))->setPaper('letter', 'landscape');
		return $pdf->inline('InventarioPorArea-'.$request->nombreEmpleado.'.pdf');

	}

	public function llenarTablePartidasCat(Request $request){
		set_time_limit(5000);
		$articulos = articulosecos::select('numeroinventario', 'concepto', 'factura', 'fechacompra','importe')->where('partida', $request->partida)->get();
		$numPartida = 'Número de partida: ' . $request->partida;
		$nombrePartida = 'Nombre de la partida: ' . $request->nombrePartida;

		$numLinea = '';
		$nombreLinea = '';

		return view('catalogos.Tablas.TablaBienesECO', compact('articulos','numPartida','nombrePartida','numLinea','nombreLinea'));
	}


	public function llenarTablePartidasLineasCatECO (Request $request){
		set_time_limit(5000);
		$articulos = articulosecos::select('numeroinventario', 'concepto', 'factura', 'fechacompra','importe')->where([['partida', $request->partida],['linea',  $request->linea]])->get();
		$numPartida = 'Número de partida: ' . $request->partida;
		$nombrePartida = 'Nombre de la partida: ' . $request->nombrePartida;

		$numLinea = 'Número de línea: ' . $request->linea;
		$nombreLinea = 'Nombre de la línea: ' . $request->nombreLinea;

		return view('catalogos.Tablas.TablaBienesECO', compact('articulos','numPartida','nombrePartida','numLinea','nombreLinea'));
	}


}
