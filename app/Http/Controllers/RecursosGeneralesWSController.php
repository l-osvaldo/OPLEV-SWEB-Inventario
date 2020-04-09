<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partidas;
use App\lineas;
use App\sublineas;

header('Access-Control-Allow-Origin: *');

class RecursosGeneralesWSController extends Controller
{
    //
    public function getPartidas(){
    	$partidas = partidas::select('partida','descpartida')->orderBy('partida','asc')->get();
    	return response()->json($partidas);
    }

    public function getLineas(Request $request){
    	$lineas = lineas::select('linea','desclinea')->where('partida', $request->partida)->orderBy('linea','asc')->get();
    	return response()->json($lineas);
    }

    public function getSublinea(Request $request){
    	$sublineas = sublineas::select('sublinea','descsub')->where([['partida', $request->partida],['linea',$request->linea]])->orderBy('sublinea','asc')->get();
    	return response()->json($sublineas);
    }
}
