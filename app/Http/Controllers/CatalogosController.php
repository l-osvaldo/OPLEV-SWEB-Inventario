<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;

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
        $usuario = auth()->user();
        return view('catalogos.Bienes', compact('articulos','usuario'));
    }

    public function bieneseco ()
    {
        $articulos = articulos::orderBy('iev', 'DESC')->paginate();
        $usuario = auth()->user();
        return view('catalogos.Bieneseco', compact('articulos','usuario'));
    }
    public function lista ()
    {
        $usuario = auth()->user();
        return view('catalogos.lista',compact('usuario'));
    }
    
}
