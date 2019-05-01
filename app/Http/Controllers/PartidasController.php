<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\partidas;
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
        $partida = partidas::orderBy('partida','ASC')->paginate();
        return view('catalogos.TablaPartida', compact('partida'));
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
        $partida->partida = $request->input('partida');
        $partida->descpartida = $request->input('descpartida');

        $partida->save();
        return redirect()->route('Tabla-Partida');

    }
    
    
    public function show( $partida)
    {
        $partidas2 = partidas::where('partida',$partida)->get();
        //echo $partidas2;exit();
        return view('catalogos.TablaPartidaShow',compact('partidas2'));
    }

}
