<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleados;
use App\areas;
use Alert;

/*************** Funciones para el módulo de empleados *****************************/
class EmpleadosController extends Controller
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
 
    Funcionalidad: Obtiene todos los empleados que están registrados en el sistema
    Parámetros: No recibe parámetros
    Retorna: Una vista, la principal de este módulo, TablaEmpleados.blade.php

    ********************************************************************************** */

    public function index()
	{
	    $usuario = auth()->user();
		$empleado = empleados::orderBy('numemple', 'DESC')->get(['numemple', 'nombre','nombrearea','cargo']);
		//var_dump($partida[0]);
		//dd();

		return view('catalogos.Tablas.TablaEmpleados', compact('empleado','usuario')); 
	}

	/* **********************************************************************************
 
    Funcionalidad: Crea un nuevo registro de un empleado en la base de datos
    Parámetros: numemple, nombre, idarea, nombrearea, cargo
    Retorna: Un Alert con el mensaje Registro exitoso y redirecciona ala vista principal.

    ********************************************************************************** */

	public function store(Request $request)
	{
		

		$area = $request->input('clvdepto');      
    	$queryempleado = areas::where('idarea', '=', $area)->get();      

    //var_dump($partida);
    //var_dump($queryempleado[0]['idarea']);
    //dd();
			$nombrearea = $queryempleado[0]['nombrearea'];
			

		$area = new areas();      
	
		$empleado = new empleados();
		$empleado->numemple = $request->input('numemple');
		$empleado->nombre = $request->input('nombre');
		$empleado->idarea = $request->input('clvdepto');
		$empleado->nombrearea = $nombrearea;
		$empleado->cargo = $request->input('cargo');

	//	$area->save();
		$empleado->save();
		Alert::success('Empleado guardado', 'Registro Exitoso')->autoclose(2500);
		return redirect()->route('show-Empleados'); 
	}

	/* **********************************************************************************
 
    Funcionalidad: 
    Parámetros: 
    Retorna: 

    ********************************************************************************** */

	public function show(Request $request)
	{
		
		$empleado = empleados::get(['numemple', 'nombre','nombrearea','cargo']);
		$area = areas::distinct()->get(['idarea', 'nombrearea']);
				$usuario = auth()->user();
				
			return view('catalogos.Tablas.TablaEmpleados',compact('empleado','area','usuario')); 

	}

	/* **********************************************************************************
 
    Funcionalidad: Valida que el número de empleado no exista en el sistema
    Parámetros: numeroEmpleado
    Retorna: Retorna un boleano, 1 o 0 si es que existe

    ********************************************************************************** */

	public function validarNumeroEmpleado(Request $request){
	$existe = empleados::select('numemple')->where('numemple',$request->numeroEmpleado)->get();
	return $existe;		
	}
}
