<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\sublineas;

class SublineasController extends Controller
{
    /*
    funcion para mostrar los datos de la tabla partida
    en la vista TablaPartida
    */
    public function index()
    {
        $partida = sublineas::distinct()->get(['partida', 'descpartida']);
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
        $partida = new sublineas();
        $partida->partida = $request->input('partida');
        $partida->descpartida = $request->input('descpartida');
        $partida->linea = $request->input('linea');
        $partida->desclinea = $request->input('desclinea');
        $partida->sublinea = $request->input('sublinea');
        $partida->descsub = $request->input('descsub');
        $partida->total = $request->input('total');
        

        $partida->save();
        return redirect()->route('Tabla-Partida');

    }
    
    
    public function show( $partida)
    {
        $linea = sublineas::where('sublinea',$partida)->get();
        //
        return view('catalogos.AgregaLineas',compact('linea'));
    }

    /* vista de lineas */
    public function MostrarLineas()
    {
        $linea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Lineas', compact('linea'));
    }
    /////
    public function showlineas( $partida)
    {
        $linea = sublineas::where('partida', $partida, sublineas::raw('count(*) >= 1'))
            ->get();
           // echo $linea;exit();
        return view('catalogos.TablaLineasShow',compact('linea'));


    }


     /*funcion para mostrar las partidas 
     tanto en agregar linea como en catalogo de linea
     */ 
    public function LineaNueva()
    {
        $linea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.AgregaLineas', compact('linea'));
    }
    
    /*
    funcion para agregar una linea a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    
    public function lineastore(Request $request)
    {
        $linea = new partidas();
        $linea->partida = $request->input('partida');
        $linea->descpartida = $request->input('descpartida');
        $linea->linea = $request->input('linea');
        $linea->desclinea = $request->input('desclinea');
        $linea->sublinea = $request->input('sublinea');
        $linea->descsub = $request->input('descsub');
        $linea->total = $request->input('total');

        $linea->save();
        return redirect()->route('catalogos.AgregaLineas');

    } 
    
}
