<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\articulosecos;
use App\partidas;

class CatalogosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //listado de la tabla
    public function bienes ()
    {
        $articulos = articulos::orderBy('iev', 'DESC')->get();
        $partidas = partidas::all();
        $usuario = auth()->user();
        return view('catalogos.Bienes', compact('articulos','usuario','partidas'));
    }

    public function bieneseco ()
    {
        $articulosecos = articulosecos::orderBy('iev', 'DESC')->get();
        $partidas = partidas::all();
        $usuario = auth()->user();
        return view('catalogos.BienesEco', compact('articulosecos','usuario','partidas'));
    }
    public function lista ()
    {
        $usuario = auth()->user();
        return view('catalogos.lista',compact('usuario'));
    }
    
}
