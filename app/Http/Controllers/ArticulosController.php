<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\partidas;
use App\areas;
use Alert;

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

	public function reportes(){
		$usuario = auth()->user();
		$partidas = partidas::distinct()->orderBy('partida', 'DESC')->get(['partida', 'descpartida']);
		$areas = areas::distinct()->orderBy('clvdepto', 'DESC')->get(['clvdepto', 'depto']);

		return view('ople.reportes', compact('usuario','partidas','areas'));
	}

}
