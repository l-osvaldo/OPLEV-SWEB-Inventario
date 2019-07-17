<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulosecos;
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
    	$numeroInventarioMax = articulosecos::where([['partida',$request->partida],['linea', $request->linea],['sublinea',$request->sublinea]])->max('consecutivo');


    	if ($numeroInventarioMax == null){
    		$numeroInventarioMax = 0;
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
			$articulo->fechacompra			= $request->dateFechaCompraECO;
			$articulo->clavearea			= $request->txtAreaClaveECO;
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

	public function InformacionArticuloECO(Request $request){
		$infoArticulo = articulosecos::where('numeroinventario',$request->numInventario)->get();

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

		$articulo = articulosecos::where('numeroinventario',$request->numeroInventario)
		->update([
			'estado' 	=> $nombreEstado, 
			'claveestado' => $request->editarEstadoECO,
			'medidas' 	=> $request->editarMedidasECO,
			'material' 	=> $request->editarMaterialECO,
			'colores' 	=> $request->editarColorECO,
			'numeroserie' 	=> $request->EditarNumSerieECO,
			'modelo' 	=> $request->editarModeloECO,
			'marca' 	=> $request->editarMarcaECO,
			'fechacompra'	=> $request->editarDateFechaCompraECO,
			'importe'	=> $request->editarImporteECO,
			'factura'	=> $request->editarFacturaECO ]);

		Alert::success('Datos Actualizados', 'Actualización Exitoso')->autoclose(2500);
        return redirect()->route('catalogoeco');
	}
}
