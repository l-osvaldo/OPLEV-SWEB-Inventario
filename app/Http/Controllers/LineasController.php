<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\lineas;
use App\sublineas;
//use Illuminate\Database\Eloquent\Model\partidas;
use App\partidas;

class LineasController extends Controller
{
    /*
    funcion para mostrar los datos de la tabla lineas
    en la vista TablaPartida
    */
    public function index()
    {
      //  $linea = lineas::orderBy('linea','DESC')->paginate();
      //  $lineas = lineas::orderBy('linea','DESC')->paginate();
       // return view('catalogos.Tablalineas', compact('lineas'));
      //  $linea = lineas::join('partidas','partida', '=', 'partida')
       // ->select('partida','descpartida','linea','desclinea')->get();
         
        //return $this->hasMany(lineas::class);
        
        $linea = partidas::join('lineas', 'partidas.partida','=','lineas.partida')
          //  ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('partidas.partida','descpartida','linea','desclinea')
            ->get();
            return view('catalogos.Tablalineas', compact('linea'));
            
/*
            $linea = lineas::orderBy('lineas')
            ->select(
              'partida',
              'descpartida',
              'linea',
              'descline'
            )
            ->join('lineas', 'partidas.partida','=','lineas.partida');
         
              return view('catalogos.Tablalineas', compact('linea'));
              */

    }

    /*
    funcion para llamar a la venta de agregar lineas 
     */
    public function create()
    {
      
      $linea = lineas::distinct()->get(['partida', 'descpartida']);
      return view('catalogos.Agregar.AgregaLineas', compact('linea'));
       // return view('catalogos.Partidas');
    }

    
    /*
    funcion para agregar una partida a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    
    public function store(Request $request)
    {
      $array = explode (',', $request->input('partida'));
      //print_r ($array);exit();
    //  $linea = new partidas();
      $linea = new lineas();
      $sublinea = new sublineas();

      $linea->partida = $array[0];
      $linea->descpartida = $array[1];
      $linea->linea = $request->input('linea');
      $linea->desclinea = $request->input('desclinea');
      $sublinea->sublinea = $request->input('sublinea');
      $sublinea->descsub = $request->input('descsub');
      $sublinea->total = $request->input('total');

     // $partida->save();
      $linea->save();
      $sublinea->save();
      return redirect()->route('lista');

    }
    
    public function show(Request $request)
    {
          //echo $request->get('Partidas');exit();
        $linea = lineas::where('partida', $request->get('Partidas'), lineas::raw('count(*) >= 1'))
          ->get();
          // echo $linea;exit();
        return view('catalogos.Tablas.TablaLineasShow',compact('linea'));
    }

    public function MostrarLineas()
    {
        $linea = partidas::distinct()->get(['partida', 'descpartida']);
        return view('catalogos.Lineas', compact('linea'));
    }

}
