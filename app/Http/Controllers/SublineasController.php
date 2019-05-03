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
    // mostrar lineas

    public function showlineas(Request $request)
    {
        //echo $request->get('Partidas');exit();
        $linea = sublineas::where('partida', $request->get('Partidas'), sublineas::raw('count(*) >= 1'))
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
        $array = explode (',', $request->input('partida'));
        //print_r ($array);exit();
        $linea = new sublineas();
        $linea->partida = $array[0];
        $linea->descpartida = $array[1];
        $linea->linea = $request->input('linea');
        $linea->desclinea = $request->input('desclinea');
        $linea->sublinea = $request->input('sublinea');
        $linea->descsub = $request->input('descsub');
        $linea->total = $request->input('total');

        $linea->save();
        return redirect()->route('NuevaLinea');

    } 

    //vista de sublineas
    public function MostrarSubLineas(Request $request)
    {
        $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Sublineas', compact('sublinea'));
    }

    public function showsublineas($partida)
    {
        //echo $request->get('Partidas');exit();
        $sublinea2 = sublineas::where('partida', $partida->get('Partidas'), sublineas::raw('count(*) >= 1'))
            ->get();
           // echo $linea;exit();
        return view('catalogos.Sublineas',compact('sublinea2'));
    }

    public function sublineastore(Request $request)
    {
        $array = explode (',', $request->input('partida'));
        //print_r ($array);exit();
        $linea = new sublineas();
        $linea->partida = $array[0];
        $linea->descpartida = $array[1];
        $linea->linea = $request->input('linea');
        $linea->desclinea = $request->input('desclinea');
        $linea->sublinea = $request->input('sublinea');
        $linea->descsub = $request->input('descsub');
        $linea->total = $request->input('total');

        $linea->save();
        return redirect()->route('NuevaLinea');

    } 

    
}
