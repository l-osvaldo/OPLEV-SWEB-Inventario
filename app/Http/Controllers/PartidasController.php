<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\partidas;
use App\lineas;
use App\sublineas;
use View;
//use Illuminate\Database\Eloquent\Model\partidas;

class PartidasController extends Controller
{
    /*
    funcion para mostrar los datos de la tabla partida
    en la vista TablaPartida
    */
    public function index()
    {
        $partida = partidas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Tablas.TablaPartida', compact('partida'));
/*
        $partida = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Tablas.TablaPartida', compact('partida'));
        */
    }

    /*
    funcion para llamar a la venta de agregar partida

     */
    public function create()
    {
        return view('catalogos.Partidas');
    }

    
    /*
    funcion para agregar una partida a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    public function store(Request $request)
    {
        $partida = new partidas();
        $linea = new lineas();
        $sublinea = new sublineas();

        $partida->partida = $request->input('partida');
        $partida->descpartida = $request->input('descpartida');

        $linea->partida = $request->input('partida');
        $linea->descpartida = $request->input('descpartida');
        $linea->linea = $request->input('linea');
        $linea->desclinea = $request->input('desclinea');

        $sublinea->partida = $request->input('partida');
        $sublinea->descpartida = $request->input('descpartida');
        $sublinea->linea = $request->input('linea');
        $sublinea->desclinea = $request->input('desclinea');
        $sublinea->sublinea = $request->input('sublinea');
        $sublinea->descsub = $request->input('descsub');
        $sublinea->total = $request->input('total');
       // $partida->lineas($linea)->sublineas($sublinea);
        $partida->save();
        $linea->save();
        $sublinea->save();
        return redirect()->route('Tabla-Partida');

    }
    
    
    public function show( $partida)
    {
        $partidas2 = partidas::where('partida',$partida)->get();
        //echo $partidas2;exit();
        return view('catalogos.TablaPartidaShow',compact('partidas2'));
    }

}
