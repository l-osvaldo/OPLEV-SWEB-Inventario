<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\lineas;
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
        return view('catalogos.Partidas');
    }

    
    /*
    funcion para agregar una partida a la base de datos
    la variable partida recibe los datos y los envia al modelo 
    para despues guardarlos en la base de datos.
     */
    /*
    public function store(Request $request)
    {
        $linea = new lineas();
        $linea->partida = $request->input('partida');
        $linea->descpartida = $request->input('descpartida');

        $linea->save();
        return redirect()->route('Tabla-Partida');

    }
    */
    
    
    public function show($id)
    {
        //
    }
}
