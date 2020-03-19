<?php

namespace App\Http\Controllers;

use App\articulos;
use App\partidas;
use Auth;
use Illuminate\Http\Request;

/*************** Funciones para el módulo de inicio *****************************/
class HomeController extends Controller
{

    /* **********************************************************************************

    Funcionalidad: Constructor  de la clase, sirve para mantener este controlador con la autentificación del logueo del usuario
    Parámetros: No recibe parámetros
    Retorna: No regresa nada

     ********************************************************************************** */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* **********************************************************************************

    Funcionalidad: Verifica que el usuario este autentificado y envia a la vista principal Bienes OPLE, si no esta autentificado regresa a la vista de Login
    Parámetros: Datos del usuario autentificado
    Retorna: Vista Bienes OPLE o vista Login

     ********************************************************************************** */

    public function index(Request $request)
    {

        if ($request->user()->authorizeRoles(['user', 'admin']) && Auth::check()) {
            $usuario   = auth()->user();
            $partidas  = partidas::orderBy('partida', 'asc')->get();
            $articulos = articulos::orderBy('iev', 'DESC')->get();
            //print_r ($usuario);exit();
            return view('catalogos/bienes')->with(compact('articulos', 'usuario', 'partidas'));
        }

        return view('login');
    }

}
