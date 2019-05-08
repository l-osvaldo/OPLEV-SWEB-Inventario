<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\{sublineas, lineas};


class SublineasController extends Controller
{
    /*
    funcion para mostrar los datos de la tabla partida
		en la vista TablaPartida
		El controlador ya esta en Partidas controller
		*/
		/*
    public function index()
    {
        $partida = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Tablas.TablaPartida', compact('partida'));
    }
*/
    /*
		funcion para llamar a la venta de agregar partida 
		la funcion ya esta en Partidascontroller
     */
		/*
    public function create()
    {
        return view('catalogos.Partidas');
    }
*/
    
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
        return view('catalogos.Agregar.AgregaLineas',compact('linea'));
    }

    /* vista de lineas */
    public function MostrarLineas()
    {
        $linea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Lineas', compact('linea'));
    }
    // mostrar lineas
		/* funcion para mostrar la tabla de lineas
			la funcion fue reubicada al controlador Lineascontroller
		*/
		/*
    public function showlineas(Request $request)
    {
        //echo $request->get('Partidas');exit();
        $linea = sublineas::where('partida', $request->get('Partidas'), sublineas::raw('count(*) >= 1'))
            ->get();
           // echo $linea;exit();
        return view('catalogos.Tablas.TablaLineasShow',compact('linea'));
    }

			/*
     /*funcion para mostrar las partidas 
		 tanto en agregar linea como en catalogo de linea
		 La funcion se paso a Lineascontroller
     */ 
		/*
    public function LineaNueva()
    {

        $linea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Agregar.AgregaLineas', compact('linea'));
    }

    */
    /*
    funcion para agregar una linea a la base de datos
    la variable partida recibe los datos y los envia al modelo 
		para despues guardarlos en la base de datos.
		la funcion ya esta en el controlador LineasController
     */
    /*
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

    */

    public function showsublineas($partida)
    {
        //echo $request->get('Partidas');exit();
        $sublinea2 = sublineas::where('partida', $partida->get('Partidas'), sublineas::raw('count(*) >= 1'))
            ->get();
           // echo $linea;exit();
        return view('catalogos.Sublineas',compact('sublinea2'));
    } 
    //checar si esta en uso x_x
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
        return redirect()->route('NuevaLinea2');

    } 


		public function obtenLineas(Request $request)
		{
			$partida = $request->partida;
			$lineas = lineas::where('partida', $partida)->get();      
      return response()->json($lineas);


    }






    public function ajaxRequest(){
				$sublinea = sublineas::distinct()->get(['partida', 'descpartida']);				
        return view('catalogos.Sublineas', compact('sublinea'));
    }


		public function ajaxRequestPost(Request $request)

    {

        $input = $request->all();

        $sublinea = sublineas::where('partida',$request->partida)->distinct()
            ->orderBy('linea', 'ASC')
                ->get(['linea','desclinea']);
        return response()->json($sublinea);

    }
		
		






















    //ajax para crear lineas
    public function ajaxRequestLineas(){
        $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Agregar.AgregaLineas', compact('sublinea'));
    }

    public function ajaxRequestLineasPost(Request $request)

    {
        $input = $request->all();
        $sublinea = sublineas::where('partida',$request->partida)->distinct()
                ->max('linea')
                ->get(['linea']);
        return response()->json($sublinea);


    }



    //sublineas controller

    public function Agregasublineastore(Request $request)
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
        return redirect()->route('Tabla-Partida');;

    } 
    /*funcion para mostrar las partidas 
     tanto en agregar linea como en catalogo de linea
     */ 
    public function SublineaNueva()
    {
        $NuevaSublinea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Agregar.AgregaSublineas', compact('NuevaSublinea'));

/*
        $partida = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Tablas.TablaPartida', compact('partida'));
        */
    }
    //vista de sublineas
    public function MostrarSubLineas(Request $request)
    {
        $sublinea = sublineas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Sublineas', compact('sublinea'));
    }
}
