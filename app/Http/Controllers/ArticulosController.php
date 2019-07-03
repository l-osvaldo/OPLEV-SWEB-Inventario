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
			$articulo->fechacomp	= $request->dateFechaCompra;
			$articulo->clvarea		= $request->txtAreaClave;
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
		$partidas = partidas::distinct()->orderBy('partida', 'DESC')->get(['partida', 'descpartida']);
		$areas = areas::distinct()->orderBy('clvdepto', 'DESC')->get(['clvdepto', 'depto']);
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

		$areaAndImporteTotal = DB::table('articulos')->select('clvarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('clvarea')->groupBy('clvarea')->get();
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
		$bienesArea = articulos::where('clvarea', $request->numArea)->orderBy('concepto')->get();
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

		$datosEmpleado = empleados::select('numemple','nombre','nombredepto')->where('numemple', $request->numEmpleado)->get();
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
		$areaAndImporteTotal = DB::table('articulos')->select('clvarea', DB::raw('TRUNCATE(SUM(importe),2) as importetotal'))->orderBy('clvarea')->groupBy('clvarea')->get();
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
		$bienesArea = articulos::where('clvarea', $request->numArea)->orderBy('concepto')->get();
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

		$datosEmpleado = empleados::select('numemple','nombre','nombredepto','cargo')->where('numemple', $request->numEmpleado)->get();
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

}
