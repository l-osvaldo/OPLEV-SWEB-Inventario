<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partidas;
//use Illuminate\Database\Eloquent\Model\partidas;

class PartidasController extends Controller
{
    /*
    funcion para mostrar los datos de la tabla partida
    en la vista TablaPartida
    */
    public function index()
    {
        $partida = partidas::orderBy('partida','DESC')->paginate();
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
       
        $partida->savePartida();
        return redirect()->route('catalogos.Partidas');
    }
    
    
    public function show($id)
    {
        //
    }

}
