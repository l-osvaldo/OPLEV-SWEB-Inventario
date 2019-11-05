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
use DateTime;

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

	public function importeBienesAnioAdquisicion(Request $request){
		$partidas = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
		$anioAdquisicion = $request;

		foreach ($partidas as $value) {
			$articulos = DB::table('articulos')->select('fechacomp','importe')->where([['partida',$value->partida],['fechacomp','like','%'.$request->anioAdquisicion.'%']])->whereNotIn('fechacomp', ['  -   -'])->get();

			$meses  = array("0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
							 	"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00"  );
			$total = "0.00";

			foreach ($articulos as $art) {
				if (strpos($art->fechacomp, '-')){
					$fecha = explode("-", $art->fechacomp);
				}else{
					$fecha = explode("/", $art->fechacomp);
				}

				$meses[$fecha[1]-1] = $meses[$fecha[1]-1] + $art->importe;
				$total = $total + $art->importe;
			}

			array_add($value,'meses',$meses);
			array_add($value,'total',$total);
		}

		return view('ople.reportes.ImporteDeBienesPorAnioAdquisicion', compact('partidas','anioAdquisicion'));
	}

	public function bienesAreaOrdenadoEmpleado(Request $request){
		$area = explode("*", $request->area);

		$idarea = $area[0];
		$nombrearea = $area[1];

		$articulos = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreemple', 'ASC')->get();

		return view('ople.reportes.BienesDeUnAreaOrdenadoPorEmpleado', compact('nombrearea','articulos'));
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

	public function importeBienesAnioAdquisicionPDF(Request $request){
		$partidas = partidas::distinct()->orderBy('partida', 'ASC')->get(['partida', 'descpartida']);
		$anioAdquisicion = $request;

		foreach ($partidas as $value) {
			$articulos = DB::table('articulos')->select('fechacomp','importe')->where([['partida',$value->partida],['fechacomp','like','%'.$request->anioAdquisicion.'%']])->whereNotIn('fechacomp', ['  -   -'])->get();

			$meses  = array("0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
							 	"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00" ,
								"0.00"  );
			$total = "0.00";

			foreach ($articulos as $art) {
				if (strpos($art->fechacomp, '-')){
					$fecha = explode("-", $art->fechacomp);
				}else{
					$fecha = explode("/", $art->fechacomp);
				}

				$meses[$fecha[1]-1] = $meses[$fecha[1]-1] + $art->importe;
				$total = $total + $art->importe;
			}

			array_add($value,'meses',$meses);
			array_add($value,'total',$total);
		}

		$pdf = PDF::loadView('ople.reportes.pdf.ImporteDeBienesPorAnioAdquisicionPDF', compact('partidas','anioAdquisicion'))->setPaper('letter', 'landscape');
		return $pdf->inline('ImporteDeBienesPorAñoDeAdquisicion-'.$request->anioAdquisicion.'.pdf');
	}

	public function bienesAreaOrdenadoEmpleadoPDF(Request $request){
		$area = explode("*", $request->area);

		$idarea = $area[0];
		$nombrearea = $area[1];

		$articulos = DB::table('articulos')->select('numeroinv', 'concepto', 'numserie', 'marca', 'modelo', 'nombreemple', 'factura', 'importe', 'estado')->where('idarea', $idarea)->orderBy('nombreemple', 'ASC')->get();


		$pdf = PDF::loadView('ople.reportes.pdf.BienesDeUnAreaOrdenadoPorEmpleadoPDF', compact('nombrearea','articulos'))->setPaper('letter', 'landscape');
		return $pdf->inline('BienesDeUnAreaOrdenadoPorEmpleado-'.$nombrearea.'.pdf');
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
		$mesActual = date('m') ;



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

			$anioCompra = date("Y", strtotime($fecha));

			$fecha = date("d-m-Y", strtotime($fecha."+ ".$datosPartida[0]['aniosvida']." year"));

			
			$anioArticuloDepreciacion = date('Y', strtotime($fecha)); // año del artículo mas los años de depreciación

			$mesArticuloDepreciacion = date('m', strtotime($fecha));

			$saldo = $value->importe;


			if ($anioArticuloDepreciacion < $anioActual){
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

				$eneroSaldo 		= $valorResidual;
				$febreroSaldo 		= $valorResidual;
				$marzoSaldo 		= $valorResidual;
				$abrilSaldo 		= $valorResidual;
				$mayoSaldo 			= $valorResidual;
				$junioSaldo 		= $valorResidual;
				$julioSaldo 		= $valorResidual;
				$agostoSaldo 		= $valorResidual;
				$septiembreSaldo 	= $valorResidual;
				$octubreSaldo 		= $valorResidual;
				$noviembreSaldo 	= $valorResidual;
				$diciembreSaldo 	= $valorResidual;

				$saldo = $valorResidual;

				
			}else{


				if ($mesActual <= $mesArticuloDepreciacion  ){
					$mes = $mesActual;
				}
				else{
					$mes = $mesArticuloDepreciacion;
				}
				for ($i = 0; $i < 12 ; $i++) {
					if ($mes >=  ($i + 1)){
						if ($i == 0){
							$eneroD = $depreciacionMensual;

							$aniosFaltaDepreciacion = $anioArticuloDepreciacion - $anioActual;
							$aniosDepreciando = $anioActual - $anioCompra;

							for ($j=0; $j < ($aniosDepreciando-1); $j++) {
								$saldo = $saldo - $depreciacionAnual;					
							}

							$eneroSaldo = $saldo - $depreciacionMensual;
							$saldo = $eneroSaldo;
						}
						if ($i == 1){
							$febreroD = $depreciacionMensual;
							$febreroSaldo = $eneroSaldo - $depreciacionMensual;
							$saldo = $febreroSaldo;
						}
						if ($i == 2){
							$marzoD = $depreciacionMensual;
							$marzoSaldo = $febreroSaldo - $depreciacionMensual;
							$saldo= $marzoSaldo ;
						}
						if ($i == 3){
							$abrilD = $depreciacionMensual;
							$abrilSaldo = $marzoSaldo - $depreciacionMensual;
							$saldo= $abrilSaldo ;
						}
						if ($i == 4){
							$mayoD 	= $depreciacionMensual;
							$mayoSaldo 	 = $abrilSaldo - $depreciacionMensual;
							$saldo= $mayoSaldo ;
						}
						if ($i == 5){
							$junioD = $depreciacionMensual;
							$junioSaldo  = $mayoSaldo - $depreciacionMensual;
							$saldo= $junioSaldo ;
						}
						if ($i == 6){
							$julioD = $depreciacionMensual;
							$julioSaldo  = $junioSaldo - $depreciacionMensual;
							$saldo= $julioSaldo ;
						}
						if ($i == 7){
							$agostoD = $depreciacionMensual;
							$agostoSaldo  = $julioSaldo - $depreciacionMensual;
							$saldo= $agostoSaldo ;
						}
						if ($i == 8){
							$septiembreD = $depreciacionMensual;
							$septiembreSaldo = $agostoSaldo - $depreciacionMensual;
							$saldo= $septiembreSaldo ;
						}
						if ($i == 9){
							$octubreD = $depreciacionMensual;
							$octubreSaldo  = $septiembreSaldo - $depreciacionMensual;
							$saldo= $octubreSaldo ;
						}
						if ($i == 10){
							$noviembreD = $depreciacionMensual;
							$noviembreSaldo = $octubreSaldo - $depreciacionMensual;
							$saldo= $noviembreSaldo ;
						}
						if ($i == 11){
							$diciembreD = $depreciacionMensual;
							$diciembreSaldo = $noviembreSaldo - $depreciacionMensual;
							$saldo= $diciembreSaldo ;
						}
					}else{
						if ($i == 0){
							$eneroD = ' - ';
							$eneroSaldo = $saldo;
						}
						if ($i == 1){
							$febreroD = ' - ';
							$febreroSaldo = $saldo;
						}
						if ($i == 2){
							$marzoD = ' - ';
							$marzoSaldo = $saldo;
						}
						if ($i == 3){
							$abrilD = ' - ';
							$abrilSaldo = $saldo;
						}
						if ($i == 4){
							$mayoD 	= ' - ';
							$mayoSaldo 	 = $saldo;
						}
						if ($i == 5){
							$junioD = ' - ';
							$junioSaldo  = $saldo;
						}
						if ($i == 6){
							$julioD = ' - ';
							$julioSaldo  = $saldo;
						}
						if ($i == 7){
							$agostoD = ' - ';
							$agostoSaldo  = $saldo;
						}
						if ($i == 8){
							$septiembreD = ' - ';
							$septiembreSaldo = $saldo;
						}
						if ($i == 9){
							$octubreD = ' - ';
							$octubreSaldo  = $saldo;
						}
						if ($i == 10){
							$noviembreD = ' - ';
							$noviembreSaldo = $saldo;
						}
						if ($i == 11){
							$diciembreD = ' - ';
							$diciembreSaldo = $saldo;
						}
					}
				}
		
			}

			$fecha = str_replace('-', '/', $fecha);
			set_time_limit(5000);

			// agregar los nuevos campos de los cálculos realizados al arreglo de los artículos
			array_add($value,'valorresidual',$valorResidual);
			array_add($value,'bienmenosresidual',$valorDelBienMenosValorResidual);
			array_add($value,'saldo',$saldo);
			array_add($value,'depreciacionMensual',$depreciacionMensual);
			array_add($value,'depreciacionAnual',$depreciacionAnual);
			
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

			array_add($value,'eneroSaldo',$eneroSaldo);
			array_add($value,'febreroSaldo',$febreroSaldo);
			array_add($value,'marzoSaldo',$marzoSaldo);
			array_add($value,'abrilSaldo',$abrilSaldo);
			array_add($value,'mayoSaldo',$mayoSaldo);
			array_add($value,'junioSaldo',$junioSaldo);
			array_add($value,'julioSaldo',$julioSaldo);
			array_add($value,'agostoSaldo',$agostoSaldo);
			array_add($value,'septiembreSaldo',$septiembreSaldo);
			array_add($value,'octubreSaldo',$octubreSaldo);
			array_add($value,'noviembreSaldo',$noviembreSaldo);
			array_add($value,'diciembreSaldo',$diciembreSaldo);

		}

		return view('depreciacion.tablaDepreciacion',compact('partida','articulos','noDepreciacion','datosPartida','anioAnterior', 'anioActual'));
	}


	public function HistorialDepreciacionArticulo(Request $request){
		$articulo = articulos::select('numeroinv','concepto','fechacomp','importe')->where('numeroinv', $request->numInventario)->get();
		$datosPartida= partidas::where('partida', $request->numPartida)->get();

		$valorResidual = round( ($articulo[0]['importe'] * ($datosPartida[0]['porcentajeDepreciacion']/100)),2);
		$valorDelBienMenosValorResidual = round( ($articulo[0]['importe'] - $valorResidual),2);

		$depreciacionAnual = round( ($valorDelBienMenosValorResidual / $datosPartida[0]['aniosvida']), 2);
		$depreciacionMensual =  round(($depreciacionAnual / 12), 2);

		$fecha = str_replace('/', '-', $articulo[0]['fechacomp']);

		$anioCompra = date("Y", strtotime($fecha));
		$mesCompra = date("m", strtotime($fecha));

		
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$mesActual = date('m') ;
		$mesActual = $meses[$mesActual-1];


		array_add($articulo[0],'valorResidual',$valorResidual);
		array_add($articulo[0],'valorDelBienMenosValorResidual',$valorDelBienMenosValorResidual);
		array_add($articulo[0],'anioCompra',$anioCompra);
		array_add($articulo[0],'mesCompra',$mesCompra);
		array_add($articulo[0],'aniosDepreciacion',$datosPartida[0]['aniosvida']);
		array_add($articulo[0],'depreciacionAnual',$depreciacionAnual);
		array_add($articulo[0],'depreciacionMensual',$depreciacionMensual);
		array_add($articulo[0],'mesActual',$mesActual);

		return response()->json($articulo);;
	}

}
