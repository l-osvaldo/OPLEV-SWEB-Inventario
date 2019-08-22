<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleados;
use App\areas;
use Alert;

class EmpleadosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
	{
	    $usuario = auth()->user();
		$empleado = empleados::orderBy('numemple', 'DESC')->get(['numemple', 'nombre','nombrearea','cargo']);
		//var_dump($partida[0]);
		//dd();

		return view('catalogos.Tablas.TablaEmpleados', compact('empleado','usuario')); 
	}


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

	public function show(Request $request)
	{
		
		$empleado = empleados::get(['numemple', 'nombre','nombrearea','cargo']);
		$area = areas::distinct()->get(['idarea', 'nombrearea']);
				$usuario = auth()->user();
				
			return view('catalogos.Tablas.TablaEmpleados',compact('empleado','area','usuario')); 

	}

	public function validarNumeroEmpleado(Request $request){
	$existe = empleados::select('numemple')->where('numemple',$request->numeroEmpleado)->get();
	return $existe;		
	}
}
