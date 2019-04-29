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
        return view('catalogos.Bienes', compact('products'));
    }

    public function bieneseco ()
    {
        $products = articulos::orderBy('id', 'DESC')->paginate();
        return view('catalogos.Bieneseco', compact('products'));
    }
    public function lista ()
    {
        return view('catalogos.lista');
    }
   
}
