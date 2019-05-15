<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;

class CatalogosController extends Controller
{
    //listado de la tabla
    public function bienes ()
    {
        $products = articulos::orderBy('id', 'DESC')->paginate();
        $usuario = auth()->user();
        return view('catalogos.Bienes', compact('products','usuario'));
    }

    public function bieneseco ()
    {
        $products = articulos::orderBy('id', 'DESC')->paginate();
        $usuario = auth()->user();
        return view('catalogos.Bieneseco', compact('products','usuario'));
    }
    public function lista ()
    {
        $usuario = auth()->user();
        return view('catalogos.lista',compact('usuario'));
    }
}
