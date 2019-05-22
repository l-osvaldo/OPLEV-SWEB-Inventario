<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areas;
use App\empleados;
//use Alert;

class AreasController extends Controller
{
		//
		
		public function formValidationPost(Request $request)
			{
					$this->validate($request,[

							'clvdepto'    =>  'required|numeric',
							'depto'       =>  'required|min:1|max:250',
							

							],[
									
					'clvdepto.required'     => 'La :attribute es obligatoria.',
					'clvdepto.integer'      => 'La :attribute debe ser un entero.',

					'depto.required'   => 'La :attribute es obligatoria.',
					'depto.min'        => 'La :attribute debe contener mas de una letra.',
					'depto.max'        => 'La :attribute debe contener max 30 letras.',
							]);

					Alert::error('Revise sus campos', '¡Error!')->autoclose(2000);
			} 

    public function index()
			{
				$usuario = auth()->user();
				$area = areas::distinct()->orderBy('clvdepto', 'DESC')->get(['clvdepto', 'depto']);
				//var_dump($partida[0]);
				//dd();

				return view('catalogos.Tablas.TablaArea', compact('area','usuario'));
			}
	public function updaArea(Request $request)
		{
			$clave = $request->input('id');
					$area = $request->input('no');
					$update = areas::where('clvdepto',$clave)->update(array('depto' => $area));			
					$update = empleados::where('clvdepto',$clave)->update(array('nombredepto' => $area));	
			return response()->json(['success']);
		}
}
