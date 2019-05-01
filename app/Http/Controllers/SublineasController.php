<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SublineasController extends Controller
{
    //
    public function store(Request $request)
    {
        $partida = new partidas();
        $partida->partida = $request->input('partida');
        $partida->descpartida = $request->input('descpartida');
        $partida->linea = $request->input('linea');
        $partida->desclinea = $request->input('desclinea');
        $partida->sublinea = $request->input('sublinea');
        $partida->descsub = $request->input('descsub');

        $partida->save();
        return redirect()->route('Tabla-Partida');

    }
}
