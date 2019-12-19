<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areas;
use App\empleados;
use App\articulos;
use App\articulosecos;
//use Alert;

/*************** Funciones para el módulo de áreas *****************************/
class AreasController extends Controller
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
 
    Funcionalidad: Obtiene todas las áreas que se tienen registradas en la base de datos de la tabla areas
    Parámetros: No recibe parámetros
    Retorna: La vista principal del módulo de áreas, TablaArea.blade.php

    ********************************************************************************** */
    public function index()
	{
		$usuario = auth()->user();
		$area = areas::distinct()->orderBy('idarea', 'DESC')->get(['idarea', 'nombrearea']);
		//var_dump($partida[0]);
		//dd();

		return view('catalogos.Tablas.TablaArea', compact('area','usuario'));
	}

	// Funcion para el módulo de áreas
	// Actualiza el nombre del área en las tablas areas, articulos y articulosecos
	// Los parámetros que recibe son el id del área y el nuevo nombre del área
	// regresa un json

	/* **********************************************************************************
 
    Funcionalidad: Actualiza el nombre del área seleccionada en la tabla de areas
    Parámetros: Recibe el idarea y el nuevo nombre a actualizar
    Retorna: Retorna un JSON de confirmación

    ********************************************************************************** */
	public function updaArea(Request $request)
	{
		$clave = $request->input('id');
		$area = $request->input('no');
		$update = areas::where('idarea',$clave)->update(array('nombrearea' => $area));			
		$update = empleados::where('idarea',$clave)->update(array('nombrearea' => $area));

		$update = articulos::where('idarea',$clave)->update(array('nombrearea' => $area));
		$update = articulosecos::where('idarea',$clave)->update(array('nombrearea' => $area));

		return response()->json(['success']);
	}
}
