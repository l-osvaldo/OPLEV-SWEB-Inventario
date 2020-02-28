<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
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

    public function usuarios()
    {

    	$usuario = auth()->user();
    	return view('usuarios.gestionUsuarios', compact('usuario'));
    }
}
