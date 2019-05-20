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
			$area = new areas();      
		//	$area->clvdepto = $request->input('clvdepto');
		//	$area->depto = $request->input('depto'); 
		
			$empleado = new empleados();
			$empleado->numemple = $request->input('numemple');
			$empleado->nombre = $request->input('nombre');
			$empleado->nombredepto = $request->input('depto');
			$empleado->cargo = $request->input('cargo');


		//	$area->save();
			$empleado->save();
			Alert::success('Línea guardada', 'Registro Exitoso')->autoclose(2500);
			return redirect()->route('show-Empleados'); 
		}

		public function show(Request $request)
		{
			
			$empleado = empleados::get(['numemple', 'nombre','nombredepto','cargo']);
		//	$lineas = partidas::distinct()->get(['partida', 'descpartida']);
			$area = areas::distinct()->get(['clvdepto', 'depto']);
		//		$linea3 = lineas::where('partida', $request->get('Partidas'), lineas::raw('count(*) >= 1'))
		//			->get();
					$usuario = auth()->user();
					// echo $lineas;exit();
					
				return view('catalogos.Tablas.TablaEmpleados',compact('empleado','area','usuario')); 

		}
}
