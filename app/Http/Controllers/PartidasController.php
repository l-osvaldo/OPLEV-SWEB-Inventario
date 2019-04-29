<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partidas;
//use Illuminate\Database\Eloquent\Model\partidas;

class PartidasController extends Controller
{
    //
    public function index()
    {
        $partida = partida::orderBy('partida','DESC')->paginate();
        return view('catalogos.Partidas', compact('partida'));
    }
    public function create()
    {
        return view('catalogos.Partidas');
    }
    /*
    public function store(Request $request)
    {
        $partida = new partidas();
        $partida->partida = $request->input('partida');
        $partida->descpartida = $request->input('descpartida');
       
        $partida->savePartida($data);
        return redirect()->route('catalogos.Partidas');
    }
    */
    
    public function show($id)
    {
        //
    }

}
