<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\partidas;
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

		$arrayPartida = explode("*", $request->input('partidaAltaArticulo'));
		$arrayLinea = explode("*", $request->input('lineaAltaArticulo'));
		$arraySubLinea = explode("*", $request->input('sublineaAltaArticulo'));

		for ($i=0; $i < sizeof($request->txtConsecutivo); $i++) { 
			var $articulo = new articulos();

			$articulo->iev = 'OPLE';
			$articulo->partida = $arrayPartida[0];
			$articulo->descpartida = $arrayPartida[1];
			$articulo->liena = $arrayLinea[0];
			$articulo->descliena = $arrayLinea[1];
			$articulo->sublinea = $arraySubLinea[0];
			$articulo->sublinea = $arraySubLinea[1];
			$articulo->consecutivo = $request->input('consecutivo');
		}

       	Alert::success('Artículo guardado', 'Registro Exitoso')->autoclose(2500);
        return redirect()->route('catalogos');
	}

}
