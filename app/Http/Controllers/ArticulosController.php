<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\partidas;
use App\areas;
use App\empleados;
use Alert;
use PDF;
use DB;
use App;

class ArticulosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function numeroInventarioMax(Request $request){

    	$numeroInventarioMax = articulos::where([['partida',$request->partida],['linea', $request->linea],['sublinea',$request->sublinea]])->max('consecutivo');


    	if ($numeroInventarioMax == null){
    		$numeroInventarioMax = 0;
    	}

    	return response()->json($numeroInventarioMax);
    }

    public function store(Request $request)
	{
		//print_r($request);

		$arrayPartida 		= explode("*", $request->input('partidaAltaArticulo'));
		$arrayLinea 		= explode("*", $request->input('lineaAltaArticulo'));
		$arraySubLinea 		= explode("*", $request->input('sublineaAltaArticulo'));
		$arrayConsecutivo 	= explode(",",$request->txtConsecutivo);
		$arrayNumeroInv 	=  explode(",",$request->txtArregloNumInv);

		for ($i=0; $i < sizeof($arrayConsecutivo); $i++) { 

			$fecha = explode("-", $request->dateFechaCompra);

			$fechaOPLE = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];

			$articulo = new articulos();

			$articulo->iev 			= 'OPLE';
			$articulo->partida 		= $arrayPartida[0];
			$articulo->descpartida 	= $arrayPartida[1];
			$articulo->linea 		= $arrayLinea[0];
			$articulo->desclinea 	= $arrayLinea[1];
			$articulo->sublinea 	= $arraySubLinea[0];
			$articulo->descsublinea = $arraySubLinea[1];
			$articulo->consecutivo 	= $arrayConsecutivo[$i];
			$articulo->numeroinv 	= $arrayNumeroInv[$i];
			$articulo->concepto 	= $request->txtConceptoEnv;
			$articulo->marca 		= $request->txtMarca;
			$articulo->importe 		= $request->txtImporte;
			$articulo->colores 		= $request->txtColor;
			$articulo->fechacomp	= $fechaOPLE;
			$articulo->idarea		= $request->txtAreaClave;
			$articulo->nombrearea	= $request->txtAreaNombre;
			$articulo->numemple		= $request->txtResponsableNumEmpleado;
			$articulo->nombreemple	= $request->txtResponsableNombre;
			$articulo->numserie 	= $request->txtNumSerie;
			$articulo->medidas 		= $request->txtMedidas;
			$articulo->modelo 		= $request->txtModelo;
			$articulo->material 	= $request->txtMaterial;
			$articulo->clvestado 	= $request->txtEstadoClave;
			$articulo->estado 		= $request->txtEstadoNombre;
			$articulo->factura		= $request->txtFactura;
			$articulo->idclasi		= '0';

			$articulo->save();

		}

       	Alert::success('Artículo guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('catalogos');
	}

	// ************ vista de reportes ************
	public function reportes(){
		$usuario = auth()->user();
		$partidas = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
		$areas = areas::distinct()->orderBy('idarea', 'ASC')->get(['idarea', 'nombrearea']);
		$empleados = empleados::orderBy('nombre', 'ASC')->get();

		return view('ople.reportes', compact('usuario','partidas','areas','empleados'));
	}

	// ************ vista previa de reportes ************
	public function BienesXPartida(Request $request){

		$partida = $request;
		$bienesPartida = articulos::where('partida', $request->numPartida)->orderBy('concepto')->get();
		$totalImporte = DB::table('articulos')->select( DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();

		foreach ($totalImporte as  $value) {
			$value->total = number_format($value->total,2);
		}

		foreach ($bienesPartida as $value) {
			$value->importe = number_format($value->importe,2);
		}

		return view('ople.reportes.BienesPorPartida', compact('partida','bienesPartida','totalImporte'));
	}

	public function importeBienesPorArea(){

		$areaAndImporteTotal = DB::table('articulos')->select('idarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('idarea')->groupBy('idarea')->get();
		$nombreArea = areas::all();
		$totalImporte = 0;
		foreach ($areaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);

		return view('ople.reportes.ImporteDeBienesPorArea', compact('areaAndImporteTotal','totalImporte','nombreArea'));
	}

	public function importeBienesPorPartida(){

		$partidaAndImporteTotal = DB::table('articulos')->select('partida','descpartida', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->groupBy('partida','descpartida')->get();
		$totalImporte = 0;
		foreach ($partidaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);

		return view('ople.reportes.ImporteDeBienesPorPartida', compact('partidaAndImporteTotal','totalImporte'));
	}

	public function inventarioPorArea(Request $request){

		$area = $request;
		$bienesArea = articulos::where('idarea', $request->numArea)->orderBy('concepto')->get();
		$totalImporte = 0;
		foreach ($bienesArea as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		return view('ople.reportes.InventarioPorArea',compact('area','bienesArea','totalImporte'));
	}

	public function inventarioPorOrdenAlfabetico(){

		$bienesAlfabetico = articulos::orderBy('concepto', 'DESC')->get();
		$totalImporte = 0;
		foreach ($bienesAlfabetico as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		return view('ople.reportes.InventarioPorOrdenAlfabetico',compact('bienesAlfabetico','totalImporte'));
	}

	public function ResguardoPorEmpleado(Request $request){		

		$datosEmpleado = empleados::select('numemple','nombre','nombrearea')->where('numemple', $request->numEmpleado)->get();
		$articulos = articulos::where('numemple', $request->numEmpleado)->get();
		$totalArticulos = DB::table('articulos')->select( DB::raw('COUNT(numeroinv) as total'))->where('numemple', $request->numEmpleado)->get();
		$totalImporte = 0;
		foreach ($articulos as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}
		$totalImporte = number_format($totalImporte,2);

		return view('ople.reportes.ResguardoPorEmpleado', compact('datosEmpleado','articulos','totalArticulos','totalImporte'));
	}

	

	// ************ generar reportes ************
	public function BienesPorPartida(Request $request){

		$partida = $request;
		$bienesPartida = articulos::where('partida', $request->numPartida)->orderBy('concepto')->get();
		$totalImporte = DB::table('articulos')->select( DB::raw('SUM(importe) as total'))->where('partida', $request->numPartida)->get();


		foreach ($totalImporte as  $value) {
			$value->total = number_format($value->total,2);
		}

		foreach ($bienesPartida as $value) {
			$value->importe = number_format($value->importe,2);
		}
		
		$pdf = PDF::loadView('ople.reportes.pdf.BienesPorPartidaPDF', compact('partida','bienesPartida','totalImporte'))->setPaper('legal', 'landscape');



		return $pdf->inline('BienesPorPartida-'.$request->nombrePartida.'.pdf');
	}

	public function importeBienesPorAreaPDF(){
		$areaAndImporteTotal = DB::table('articulos')->select('idarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('idarea')->groupBy('idarea')->get();
		$nombreArea = areas::all();
		$totalImporte = 0;
		foreach ($areaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);
		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		
		$pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorAreaPDF', compact('fecha','totalImporte','areaAndImporteTotal','nombreArea'))->setPaper('letter', 'portrait');
		return $pdf->inline('ImporteDeBienesPorArea.pdf');
	}


	public function importeBienesPorPartidaPDF(){

		$partidaAndImporteTotal = DB::table('articulos')->select('partida','descpartida', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->groupBy('partida','descpartida')->get();
		$totalImporte = 0;
		foreach ($partidaAndImporteTotal as $value) {
			$totalImporte += $value->importetotal;
			$value->importetotal = number_format($value->importetotal,2);
		}
		$totalImporte = number_format($totalImporte,2);

		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		$pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorPartidaPDF',compact('fecha','partidaAndImporteTotal','totalImporte'))->setPaper('letter', 'portrait');
		return $pdf->inline('ImporteBienesPorPartida.pdf');
	}

	public function inventarioPorAreaPDF(Request $request){
		$area = $request;
		$bienesArea = articulos::where('idarea', $request->numArea)->orderBy('concepto')->get();
		$totalImporte = 0;
		foreach ($bienesArea as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);

		$pdf = PDF::loadView('ople.reportes.pdf.InventarioPorAreaPDF',compact('area','bienesArea','totalImporte'))->setPaper('legal', 'landscape');
		return $pdf->inline('InventarioPorArea-'.$request->nombreArea.'.pdf');
	}

	public function inventarioPorOrdenAlfabeticoPDF(){

		$bienesAlfabetico = articulos::orderBy('concepto', 'ASC')->get();
		$totalImporte = 0;
		foreach ($bienesAlfabetico as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}

		$totalImporte = number_format($totalImporte,2);


		$pdf = PDF::loadView('ople.reportes.pdf.InventarioPorOrdenAlfabeticoPDF',compact('bienesAlfabetico','totalImporte'))->setPaper('legal', 'landscape');
		return $pdf->inline('inventarioPorOrdenAlfabetico.pdf');

	}

	public function ResguardoPorEmpleadoPDF(Request $request){

		$datosEmpleado = empleados::select('numemple','nombre','nombrearea','cargo')->where('numemple', $request->numEmpleado)->get();
		$articulos = articulos::where('numemple', $request->numEmpleado)->get();
		$totalArticulos = DB::table('articulos')->select( DB::raw('COUNT(numeroinv) as total'))->where('numemple', $request->numEmpleado)->get();
		$totalImporte = 0;
		foreach ($articulos as $value) {
			$totalImporte += $value->importe;
			$value->importe = number_format($value->importe,2);
		}
		$totalImporte = number_format($totalImporte,2);

		$hoy = getdate();

		$fecha = $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];

		$pdf = PDF::loadView('ople.reportes.pdf.ResguardoPorEmpleadoPDF', compact('datosEmpleado','articulos','totalArticulos','totalImporte','fecha'))->setPaper('letter', 'landscape');
		return $pdf->inline('InventarioPorArea-'.$request->nombreEmpleado.'.pdf');

	}

	// ************ editar artículo ************
	public function InformacionArticulo(Request $request){

		$infoArticulo = articulos::where('numeroinv',$request->numInventario)->get();

		foreach ($infoArticulo as $value) {
			if ($value->fechacomp == '  -   -'){
				$value->fechacomp = '0';
			}else{
				if (strpos($value->fechacomp, '/')){

					$fecha = explode("/", $value->fechacomp);
					if (strlen($fecha[2]) == 4){
						$dia = $fecha[0];
						$mes = $fecha[1];
						$anio = $fecha[2];

						$value->fechacomp = $anio.'-'.$mes.'-'.$dia;
					}
				}

			}			
		}		

		return response()->json($infoArticulo);
	}

	public function EditarArticulos(Request $request){
		
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
		}else {
			$fecha = explode("-", $request->editarDateFechaCompra);

			$fechaOPLE = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];
		}
		

		$articulo = articulos::where('numeroinv',$request->numeroInventario)
		->update([
			'estado' 	=> $nombreEstado, 
			'clvestado' => $request->editarEstado,
			'medidas' 	=> $request->editarMedidas,
			'material' 	=> $request->editarMaterial,
			'colores' 	=> $request->editarColor,
			'numserie' 	=> $request->EditarNumSerie,
			'modelo' 	=> $request->editarModelo,
			'marca' 	=> $request->editarMarca,
			'fechacomp'	=> $fechaOPLE,
			'importe'	=> $request->editarImporte,
			'factura'	=> $request->editarFactura ]);

		Alert::success('Datos Actualizados', 'Actualización Exitoso')->autoclose(2500);
        return redirect()->route('catalogos');
	}

	// ************ Depreciación ************

	public function depreciacion(){
		$usuario = auth()->user();
		$partidas = partidas::select('partida','descpartida')->whereNotNull(['porcentajeDepreciacion','aniosvida'])->get();  

		
		return view('depreciacion.depreciacion',compact('usuario','partidas'));
	}

	public function calculoDepreciacion(Request $request){
		$partida = $request;
		$articulos = articulos::select('numeroinv','concepto','fechacomp','importe')->where('partida', $request->numPartida)->whereNotIn('fechacomp', ['  -   -'])->get();
		$noDepreciacion = articulos::select('numeroinv','concepto','importe')->where([['partida', $request->numPartida],['fechacomp','=','  -   -']])->get();
		$datosPartida= partidas::where('partida', $request->numPartida)->get();

		// Año anterior al año en curso
		$anioAnterior = date('Y', strtotime('-1 year')) ;
		$anioActual = date('Y') ;


		foreach ($articulos as $value) {

			// valor del bien por el porcentaje de depreciación
			$valorResidual = round( ($value->importe * ($datosPartida[0]['porcentajeDepreciacion']/100)),2);

			// VALOR DEL BIEN MENOS VALOR RESIDUAL
			$valorDelBienMenosValorResidual = round( ($value->importe - $valorResidual),2);

			//Depreciación anual ((VALOR DEL BIEN MENOS VALOR RESIDUAL) / (años de devaluación))
			$depreciacionAnual = round( ($valorDelBienMenosValorResidual / $datosPartida[0]['aniosvida']), 2);

			// Depreciación mensual (depreciación anual / 12)
			$depreciacionMensual =  round(($depreciacionAnual / 12), 2); 

			// clasificación por fecha
			$fecha = str_replace('/', '-', $value->fechacomp);

			$fecha = date("d-m-Y", strtotime($fecha."+ ".$datosPartida[0]['aniosvida']." year"));

			
			$anioArticulo = date('Y', strtotime($fecha)); // año del artículo mas los años de depreciación


			if ($anioArticulo < $anioActual){
				$eneroD 		= ' - ';
				$febreroD 		= ' - ';
				$marzoD 		= ' - ';
				$abrilD 		= ' - ';
				$mayoD 			= ' - ';
				$junioD 		= ' - ';
				$julioD 		= ' - ';
				$agostoD 		= ' - ';
				$septiembreD 	= ' - ';
				$octubreD 		= ' - ';
				$noviembreD 	= ' - ';
				$diciembreD 	= ' - ';
			}else{
				$eneroD 		= $depreciacionMensual;
				$febreroD 		= $depreciacionMensual;
				$marzoD 		= $depreciacionMensual;
				$abrilD 		= $depreciacionMensual;
				$mayoD 			= $depreciacionMensual;
				$junioD 		= $depreciacionMensual;
				$julioD 		= $depreciacionMensual;
				$agostoD 		= $depreciacionMensual;
				$septiembreD 	= $depreciacionMensual;
				$octubreD 		= $depreciacionMensual;
				$noviembreD 	= $depreciacionMensual;
				$diciembreD 	= $depreciacionMensual;
			}

			$fecha = str_replace('-', '/', $fecha);


			// agregar los nuevos campos de los cálculos realizados al arreglo de los artículos
			array_add($value,'valorresidual',$valorResidual);
			array_add($value,'bienmenosresidual',$valorDelBienMenosValorResidual);
			array_add($value,'depreciacionMensual',$depreciacionMensual);
			array_add($value,'depreciacionAnual',$depreciacionAnual);
			array_add($value,'fechap',$fecha);

			array_add($value,'eneroD',$eneroD);
			array_add($value,'febreroD',$febreroD);
			array_add($value,'marzoD',$marzoD);
			array_add($value,'abrilD',$abrilD);
			array_add($value,'mayoD',$mayoD);
			array_add($value,'junioD',$junioD);
			array_add($value,'julioD',$julioD);
			array_add($value,'agostoD',$agostoD);
			array_add($value,'septiembreD',$septiembreD);
			array_add($value,'octubreD',$octubreD);
			array_add($value,'noviembreD',$noviembreD);
			array_add($value,'diciembreD',$diciembreD);
		}

		return view('depreciacion.tablaDepreciacion',compact('partida','articulos','noDepreciacion','datosPartida','anioAnterior', 'anioActual'));
	}

}
