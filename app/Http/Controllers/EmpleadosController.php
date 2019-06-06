<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleados;
use App\areas;
use Alert;

class EmpleadosController extends Controller
{
    //
    public function index()
			{
				$usuario = auth()->user();
				$empleado = empleados::orderBy('numemple', 'DESC')->get(['numemple', 'nombre','nombredepto','cargo']);
				//var_dump($partida[0]);
				//dd();

				return view('catalogos.Tablas.TablaEmpleados', compact('empleado','usuario'));
			}


		public function store(Request $request)
		{
			

			$area = $request->input('clvdepto');      
        $queryempleado = areas::where('clvdepto', '=', $area)->get();      

        //var_dump($partida);
        //var_dump($queryempleado[0]['clvdepto']);
        //dd();
				$nombredepto = $queryempleado[0]['depto'];
				

			$area = new areas();      
		
			$empleado = new empleados();
			$empleado->numemple = $request->input('numemple');
			$empleado->nombre = $request->input('nombre');
			$empleado->clvdepto = $request->input('clvdepto');
			$empleado->nombredepto = $nombredepto;
			$empleado->cargo = $request->input('cargo');

		//	$area->save();
			$empleado->save();
			Alert::success('Empleado guardado', 'Registro Exitoso')->autoclose(2500);
			return redirect()->route('show-Empleados'); 
		}

		public function show(Request $request)
		{
			
			$empleado = empleados::get(['numemple', 'nombre','nombredepto','cargo']);
			$area = areas::distinct()->get(['clvdepto', 'depto']);
					$usuario = auth()->user();
					
				return view('catalogos.Tablas.TablaEmpleados',compact('empleado','area','usuario')); 

		}

		public function validarNumeroEmpleado(Request $request){
		$existe = empleados::select('numemple')->where('numemple',$request->numeroEmpleado)->get();
		return $existe;		
	}
}
