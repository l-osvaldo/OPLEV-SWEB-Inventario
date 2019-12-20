<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulos;
use App\articulosecos;
use App\partidas;

/*************** Funciones para el módulo de Bienes ECO y Bienes OPL *****************************/
class CatalogosController extends Controller
{
    /* **********************************************************************************
 
    Funcionalidad: Constructor  de la clase, sirve para mantener este controlador con la autentificación del logueo del usuario
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

    ********************************************************************************** */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* **********************************************************************************
 
    Funcionalidad: Obtiene todos los artículos OPLE del sistema
    Parámetros: No recibe parámetros
    Retorna: Una vista, Bienes OPLE, Bienes.blade.php

    ********************************************************************************** */
    public function bienes ()
    {
        $articulos = articulos::orderBy('iev', 'DESC')->get();
        $partidas = partidas::all();
        $usuario = auth()->user();
        return view('catalogos.Bienes', compact('articulos','usuario','partidas'));
    }

    /* **********************************************************************************
 
    Funcionalidad: Obtiene todas las partidas para el filtro de los artículos ECO
    Parámetros: No recibe parámetros
    Retorna: Una vista, Bienes ECO, BienesEco.blade.php

    ********************************************************************************** */

    public function bieneseco ()
    {
        // $articulosecos = articulosecos::orderBy('iev', 'DESC')->get();
        $partidas = partidas::all();
        $usuario = auth()->user();
        return view('catalogos.BienesEco', compact('usuario','partidas'));
    }
    
}
